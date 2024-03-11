<?php
namespace Http\Model;

use PDO;
use PDOException;
use Http\Drive\Conexao as ligar;

error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/caminho/para/seu/diretorio/error.log');


class Tcc
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

    public static function uploaTcc($id_aluno, $id_docente, $tcc)
    {

        try {
            $tcc_path = '';
            $erro = '';

            $arquivo = array(
                'arquivo' => $tcc['name'],
                'temporal' => $tcc['tmp_name'],
                'tipo' => strtolower($tcc['type']),
                'formato' => strtolower(pathinfo($tcc['name'], PATHINFO_EXTENSION)),
                'nome' => time() . '.' . strtolower(pathinfo($tcc['name'], PATHINFO_EXTENSION)),
                'diretorio' => 'storage/tcc/'
            );

            $formatos_permitidos = array('pdf', 'docx');

            # =========================== VERIFICA OS FORMATOS PERMITIDOS =====================
            if (in_array($arquivo['formato'], $formatos_permitidos)) {

                # ========================= VERIFICA O DIRECTORIO =====================
                if (!is_dir(dirname($arquivo['diretorio']))) {
                    mkdir(dirname($arquivo['diretorio']), 0777, true);
                }

                if (!is_dir($arquivo['diretorio'])) {
                    mkdir($arquivo['diretorio'], 0777, true);
                }

                if (is_dir($arquivo['diretorio'])) {
                    # ===================================== TENTA O UPLOAD ==================
                    if (move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome'])) {
                        $tcc_path = $arquivo['nome'];
                    } else {
                        $erro = 'Falha no upload.' . $arquivo['diretorio'] . $arquivo['nome'];
                    }
                }

            } else {
                $tcc_path = null;
                $erro = 'Formato .' . $arquivo['formato'] . ' não é permitido';
            }

            // save in BD

            $save = self::connection()->prepare("INSERT INTO tcc_revisao (tcc_arquivo, id_aluno, id_docente)
            VALUES(?,?,?)");

            $save->bindValue(1, $arquivo['diretorio'] . $tcc_path, PDO::PARAM_STR);
            $save->bindValue(2, $id_aluno, PDO::PARAM_INT);
            $save->bindValue(3, $id_docente, PDO::PARAM_INT);

            if ($erro == '') {

                if ($save->execute()) {

                    http_response_code(200);

                    return ['status' => 200, 'msgResponse' => 'Arquivo enviado com sucesso'];
                } else {

                    return ['status' => 401, 'msgResponse' => $save->errorInfo()];

                }
            }

            http_response_code(401);
            return ['status' => 401, 'msgResponse' => $erro];

        } catch (PDOException $e) {
            http_response_code(401);
            return ['status' => 401, 'msgResponse' => $e->getMessage()];
        }
    }

    public static function showTccASTutor($id_tutor)
    {
        $tcc = self::connection()->query("SELECT *FROM tcc_revisao AS TCCR
        INNER JOIN alunos AS AL ON TCCR.id_aluno = AL.idaluno
        INNER JOIN docentes AS DCT ON TCCR.id_docente = DCT.iddocente
        WHERE id_docente = '$id_tutor'");

        return $tcc->fetchAll();

    }


}