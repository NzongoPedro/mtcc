<?php

namespace Http\Model;

use PDO;
use PDOException;
use Http\Drive\Conexao as ligar;

class Tarefas
{

    /**
     * Summary of connection
     * @return \PDO
     */
    public static function connection()
    {
        $ligar = new ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    public static function escolharAlunoParaTarefa($id_tutor)
    {

        $alunos = self::connection()->query("SELECT *FROM tutor_as_aluno AS TAA
        INNER JOIN alunos AS AL ON TAA.id_aluno = AL.idaluno
         WHERE id_docente = '$id_tutor'");

        return $alunos->fetchAll();

    }

    public static function store($id_tutor, $id_estudante, $titulo_tarefa, $desc_tarefa)
    {
        $erro = "";

        try {

            if (!$id_estudante) {
                $erro = 'Selecione um estudante';
            }

            $store = self::connection()->prepare("INSERT INTO tarefas (docente, aluno, titulo, tarefa)
            VALUES(?,?,?,?)");

            $store->bindValue(1, $id_tutor, PDO::PARAM_INT);
            $store->bindValue(2, $id_estudante, PDO::PARAM_INT);
            $store->bindValue(3, $titulo_tarefa, PDO::PARAM_STR);
            $store->bindValue(4, $desc_tarefa, PDO::PARAM_STR);

            if ($erro == "") {
                if ($store->execute()) {

                    http_response_code(200);
                    return ['status' => 200, 'msgResponse' => 'Tarefa enviada com sucesso!'];

                }

                http_response_code(401);
                return ['status' => 401, 'msgResponse' => $store->errorInfo()];
            }

            http_response_code(401);
            return ['status' => 401, 'msgResponse' => $erro];

        } catch (PDOException $th) {
            http_response_code(401);
            return ['status' => 401, 'msgResponse' => 'ERRO: ' . $th->getMessage()];
        }

    }

    public static function showTarefasASTutor($id_tutor)
    {

        $tarefas = self::connection()->query("SELECT *FROM tarefas AS TF
        INNER JOIN alunos AS AL ON TF.aluno = AL.idaluno
         WHERE docente = '$id_tutor' ORDER BY idtarefa DESC");

        return $tarefas->fetchAll();

    }
}
