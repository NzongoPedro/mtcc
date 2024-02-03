<?php

namespace Http\Model;

use Http\Drive\Conexao as ligar;
use PDOException;

class associacao
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

    public static function show_id_tutor($id_aluno)
    {

        $id_tutor = self::connection()->query("SELECT id_docente FROM tutor_as_aluno WHERE id_aluno = '$id_aluno'");

        $id = 0;
        
        if ($id_tutor->rowCount() > 0) {
            $id = $id_tutor->fetch()->id_docente;
        }

        return $id;
    }
}
