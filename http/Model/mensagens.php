<?php

namespace Http\Model;

use Http\Drive\Conexao as ligar;
use PDOException;

class mensagens
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

    public static function send($id_aluno, $id_tutor, $autor, $mensagem)
    {

        $send = self::connection()->prepare("INSERT INTO conversas (
            id_aluno,
            id_docente,
            autor,
            conversa
            )
            VALUES(?,?,?,?)");
        $send->bindValue(1, $id_aluno);
        $send->bindValue(2, $id_tutor);
        $send->bindValue(3, $autor);
        $send->bindValue(4, $mensagem);

        if (ltrim(empty($mensagem))) {
            return ['status' => 401, 'msgResponse' => 'A mensagem não pode estar vazio!'];
        }

        if ($send->execute()) {

            return ['status' => 200];
        } else {

            return ['status' => 401, 'msgResponse' => $send->errorInfo()];
        }
    }

    public static function show($id_aluno)
    {
        $show = self::connection()->query("SELECT *FROM conversas WHERE id_aluno = '$id_aluno'");

        return $show->fetchAll();
    }
    public static function show_list($id_tutor)
    {
        $show = self::connection()->query("SELECT * FROM conversas AS C
        JOIN alunos AS A ON A.idaluno = C.id_aluno
        WHERE C.id_docente = '$id_tutor'");

        return $show->fetchAll();
    }
}
