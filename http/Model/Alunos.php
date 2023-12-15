<?php

namespace Http\Model;

use Http\Drive\Conexao as ligar;
use PDOException;

class Alunos
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

    public static function validation($id_curso, $nome, $n_estudante, $telefone, $n_bi): String
    {
        $msgError = "";

        if ($id_curso == 0) {
            $msgError = 'Selecione o curso.';
        }

        if (!is_numeric($n_estudante)) {
            $msgError = 'Número de estudante invaĺido.';
        }

        $regexNomePt = '/^[\p{L}\s]+$/u';
        if (!preg_match($regexNomePt, $nome) && preg_match('/\d/', $nome)) {
            $msgError = 'Nome inválido';
        }

        $regexTelefoneAO = '/^\+244\d{9}$/';
        if (!preg_match($regexTelefoneAO, '+244' . $telefone)) { // valida o telefone
            $msgError = 'Número de telefone inválido';
        }

        # verifica se o telefone ja existe
        $chekPhoneAluno = self::connection()->query("SELECT *FROM alunos WHERE telefone = '$telefone'");
        if ($chekPhoneAluno->rowCount() > 0) {
            $msgError = 'Este telefone já está registrado';
        }
        # verifica se o número ja existe
        $chekEstudante = self::connection()->query("SELECT *FROM alunos WHERE n_estudante = '$n_estudante'");
        if ($chekEstudante->rowCount() > 0) {
            $msgError = 'Este estudante já está registrado';
        }
        # verifica se o BI ja existe
        $chekBI = self::connection()->query("SELECT *FROM alunos WHERE n_BI = '$n_bi'");
        if ($chekBI->rowCount() > 0) {
            $msgError = 'BI já está registrado';
        }



        return $msgError;
    }
    public static function store($id_curso, $nome, $n_estudante, $n_BI, $telefone, $password)
    {

        try {

            $query_data = "INSERT INTO alunos (id_curso, nome, n_estudante, n_BI, telefone, password)
               VALUES(?,?,?,?,?,?)";

            $store = static::connection()->prepare($query_data);

            $store->bindValue(1, $id_curso);
            $store->bindValue(2, $nome);
            $store->bindValue(3, $n_estudante);
            $store->bindValue(4, $n_BI);
            $store->bindValue(5, $telefone);
            $store->bindValue(6,  password_hash($password, PASSWORD_DEFAULT));

            $msg_error = static::validation($id_curso, $nome, $n_estudante,  $telefone, $n_BI);
            if (!$msg_error == "") {

                http_response_code(401);
                return ['status' => 401, 'msgResponse' => $msg_error];
            } else {

                if (!$store->execute()) {
                    http_response_code(401);
                    return ['status' => 401, 'msgResponse' => $store->errorInfo(), 'curso' => $id_curso];
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

    public static function show($id_estudante)
    {
        $query = "SELECT *FROM alunos WHERE idaluno = '$id_estudante'";
        $execute_query = self::connection()->query($query);
        $value_of_row = $execute_query->fetch();
        return $value_of_row;
    }

    /* Fazer login Utente no sistema */
    public static function login($n_estudante, $senha)
    {

        $selectEmail = self::connection()->query("SELECT n_estudante FROM alunos WHERE n_estudante = '" . $n_estudante . "'");

        if ($selectEmail->rowCount() > 0) {

            $selectPassordHash = self::connection()->query("SELECT password FROM alunos WHERE n_estudante = '" . $n_estudante . "'")->fetch()->password;

            // VERICA A SENHA SEGURA

            if (password_verify($senha, $selectPassordHash)) {
                $data = self::connection()->query("SELECT * FROM alunos WHERE n_estudante = '$n_estudante' AND password = '$selectPassordHash'");

                if ($data->rowCount() > 0) {
                    session_start();
                    $_SESSION['id_estudante'] = $data->fetch()->idaluno;

                    return ['status' => 200, 'msgResponse' => 'Sucesso. Aguarde...'];
                } else {
                    return ['status' => 401, 'msgResponse' => 'Verifique se os seus dados estão corretos', 'data' => $_POST];
                }
            } else {

                return ['status' => 401, 'msgResponse' => 'palavra-passe incorreta'];
            }
        } else {
            return ['status' => 401, 'msgResponse' => 'Número de estudante inexistente'];
        }
    }
}
