<?php

namespace Http\Model;

use Http\Drive\Conexao as ligar;
use PDOException;


class tutores
{
    /**
     * Summary of connection
     * @return \PDO
     */
    public static function connection()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    public static function validation($grau, $nome, $email, $telefone): String
    {
        $msgError = "";

        $regexNomePt = '/^[\p{L}\s]+$/u';
        if (!preg_match($regexNomePt, $nome) && preg_match('/\d/', $nome)) {
            $msgError = 'Nome inválido';
        }

        # verifica se o emailja existe
        $chekEmail = self::connection()->query("SELECT *FROM docentes WHERE docente_email = '$email'");
        if ($chekEmail->rowCount() > 0) {
            $msgError = 'Este email já está registrado';
        }

        $patternEmail = '/^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/';
        if (!preg_match($patternEmail, $email)) { // verifica email
            $msgError = 'E-mail inválido!';
        }

        $regexTelefoneAO = '/^\+244\d{9}$/';
        if (!preg_match($regexTelefoneAO, '+244' . $telefone)) { // valida o telefone
            $msgError = 'Número de telefone inválido';
        }

        if ($grau == '0') {
            $msgError = 'O grau é requirido';
        }

        return $msgError;
    }

    public static function save($grau, $nome, $email, $telefone)
    {
        try {

            $password = '00000000';

            $query_data = "INSERT INTO docentes (docente_nivel, docente_nome, docente_email, docente_telefone, docente_senha)
               VALUES(?,?,?,?,?)";

            $store = static::connection()->prepare($query_data);

            $store->bindValue(1, $grau);
            $store->bindValue(2, $nome);
            $store->bindValue(3, $email);
            $store->bindValue(4, $telefone);
            $store->bindValue(5,  password_hash($password, PASSWORD_DEFAULT));

            $msg_error = static::validation($grau, $nome, $email, $telefone);
            if (!$msg_error == "") {

                http_response_code(401);
                return ['status' => 401, 'msgResponse' => $msg_error];
            } else {

                if (!$store->execute()) {
                    http_response_code(401);
                    return ['status' => 401, 'msgResponse' => $store->errorInfo()];
                } else {

                    http_response_code(200);
                    return ['status' => 200, 'msgResponse' => 'sucesso ao cadastrar'];
                }
            }
        } catch (PDOException $th) {

            http_response_code(401);
            return ['status' => 401, 'msgResponse' => $th];
        }
    }

    public static function show()
    {
        $query = "SELECT *FROM docentes AS DT
        INNER JOIN docente_nivel AS DN ON DT.docente_nivel = DN.iddocente_nivel
        WHERE iddocente != 0";

        $execute_query = self::connection()->query($query);

        $value_of_row = $execute_query->fetchAll();

        return $value_of_row;
    }

    public static function associacao($id_aluno, $id_docente, $id_adm)
    {
        try {

            $msgError = "";

            $query = "INSERT INTO tutor_as_aluno (id_aluno,	id_docente,	id_admin) VALUES(?,?,?)";

            $save = static::connection()->prepare($query);

            #verfica se ja existe associação

            $checkAssociation = static::connection()->query("SELECT *FROM tutor_as_aluno WHERE id_aluno = '$id_aluno' AND id_docente = '$id_docente'");

            $checkAssociation_2 = static::connection()->query("SELECT *FROM tutor_as_aluno WHERE id_aluno = '$id_aluno'");

            if ($checkAssociation_2->rowCount() > 0) {

                $msgError = "Está estudante já associação foi associado a um tutor!";
            }

            if ($checkAssociation->rowCount() > 0) {

                $msgError = "Está associação já exist!e";
            }


            $save->bindValue(1, $id_aluno);
            $save->bindValue(2, $id_docente);
            $save->bindValue(3, $id_adm);

            if (!$msgError == "") {

                http_response_code(401);

                return ['status' => 401, 'msgResponse' => $msgError];
            }

            if ($save->execute()) {

                http_response_code(200);
                return ['status' => 200, 'msgResponse' => 'Sucesso ao associar'];
            } else {
                http_response_code(401);

                return ['status' => 401, 'msgResponse' => $save->errorInfo()];
            }
        } catch (PDOException $th) {
            http_response_code(401);

            return ['status' => 401, 'msgResponse' => $th];
        }
    }
}
