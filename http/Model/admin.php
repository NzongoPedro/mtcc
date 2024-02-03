<?php

namespace Http\Model;

use Http\Drive\Conexao as ligar;
use PDOException;

class admin
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
    public static function validation($nome, $email): String
    {
        $msgError = "";

        $regexNomePt = '/^[\p{L}\s]+$/u';
        if (!preg_match($regexNomePt, $nome) && preg_match('/\d/', $nome)) {
            $msgError = 'Nome inválido';
        }

        # verifica se o emailja existe
        $chekEmail = self::connection()->query("SELECT *FROM admin WHERE adm_email = '$email'");
        if ($chekEmail->rowCount() > 0) {
            $msgError = 'Este email já está registrado';
        }

        $patternEmail = '/^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/';
        if (!preg_match($patternEmail, $email)) { // verifica email
            $msgError = 'E-mail inválido!';
        }

        return $msgError;
    }

    public static function save($nome, $email, $password)
    {
        try {

            $query_data = "INSERT INTO admin (adm_name, adm_email, adm_senha)
               VALUES(?,?,?)";

            $store = static::connection()->prepare($query_data);

            $store->bindValue(1, $nome);
            $store->bindValue(2, $email);
            $store->bindValue(3,  password_hash($password, PASSWORD_DEFAULT));

            $msg_error = static::validation($nome, $email);
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

    public static function create($nome, $email, $nivel)
    {
        try {

            $password = '00000000';

            $query_data = "INSERT INTO admin (adm_name, adm_email, adm_senha, nivel_acesso)
               VALUES(?,?,?,?)";

            $store = static::connection()->prepare($query_data);

            $store->bindValue(1, $nome);
            $store->bindValue(2, $email);
            $store->bindValue(3,  password_hash($password, PASSWORD_DEFAULT));
            $store->bindValue(4, $nivel);

            $msg_error = static::validation($nome, $email);

            if ($nivel == '0') {
                $msg_error = 'Nível de acesso é requirido!';
            }

            if (!$msg_error == "") {

                http_response_code(401);
                return ['status' => 401, 'msgResponse' => $msg_error];
            } else {

                if (!$store->execute()) {
                    http_response_code(401);
                    return ['status' => 401, 'msgResponse' => $store->errorInfo()];
                } else {

                    http_response_code(200);
                    return ['status' => 200, 'msgResponse' => 'sucesso ao cadastrar !'];
                }
            }
        } catch (PDOException $th) {

            http_response_code(401);
            return ['status' => 401, 'msgResponse' => $th];
        }
    }
    public static function login($email, $senha)
    {

        $selectEmail = self::connection()->query("SELECT adm_email FROM admin WHERE adm_email = '" . $email . "'");

        if ($selectEmail->rowCount() > 0) {

            $selectPassordHash = self::connection()->query("SELECT adm_senha FROM admin WHERE adm_email = '" . $email . "'")->fetch()->adm_senha;

            // VERICA A SENHA SEGURA

            if (password_verify($senha, $selectPassordHash)) {

                $data = self::connection()->query("SELECT *FROM admin WHERE adm_email = '$email' AND adm_senha = '$selectPassordHash'");

                if ($data->rowCount() > 0) {

                    session_start();

                    $_SESSION['id_admin'] = $data->fetch()->idadmin;

                    return ['status' => 200, 'msgResponse' => 'Sucesso. Aguarde...'];
                } else {

                    return ['status' => 401, 'msgResponse' => 'Verifique se os seus dados estão corretos!'];
                }
            } else {

                return ['status' => 401, 'msgResponse' => 'palavra-passe incorreta!'];
            }
        } else {

            return ['status' => 401, 'msgResponse' => 'Email incorreto!'];
        }
    }

    public static function show($id_adm)
    {
        $query = "SELECT *FROM admin AS ADM
        INNER JOIN nivel_acesso AS NA ON ADM.nivel_acesso = NA.idnivel_acesso
        WHERE idadmin = '$id_adm'";

        $execute_query = self::connection()->query($query);

        $value_of_row = $execute_query->fetch();

        return $value_of_row;
    }

    public static function showAllUsers($id_adm)
    {
        $query = "SELECT *FROM admin AS ADM
        INNER JOIN nivel_acesso AS NA ON ADM.nivel_acesso = NA.idnivel_acesso
        WHERE idadmin != '$id_adm'
        ORDER BY ADM.adm_name ASC";

        $execute_query = self::connection()->query($query);

        $value_of_row = $execute_query->fetchAll();

        return $value_of_row;
    }

    public static function verNivelAcesso()
    {

        return self::connection()->query("SELECT * FROM nivel_acesso ORDER BY nivel_nome ASC")->fetchAll();
    }

    public static function verNivelDcentes()
    {

        return self::connection()->query("SELECT * FROM docente_nivel ORDER BY nivel ASC")->fetchAll();
    }
}
