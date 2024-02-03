<?php
namespace Http\Model;


use Http\Drive\Conexao as ligar;
use PDO;

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

    public function uploaTcc($id_aluno, $id_docente, $tcc)
    {

        $tcc_path = '';
        $erro = '';

        $arquivo = array(
            'arquivo' => $tcc['name'],
            'temporal' => $tcc['tmp_name'],
            'tipo' => strtolower($tcc['type']),
            'formato' => strtolower(pathinfo($tcc['name'], PATHINFO_EXTENSION)),
            'nome' => time() . '.' . strtolower(pathinfo($tcc['name'], PATHINFO_EXTENSION)),
            'diretorio' => '../../img/funcionarios/'
        );

        $formatos_permitidos = array('pdf', 'docx');

        # =========================== VERIFICA OS FORMATOS PERMITIDOS =====================
        if (in_array($arquivo['formato'], $formatos_permitidos)) {

            # ========================= VERIFICA O DIRECTORIO =====================
            if (is_dir($arquivo['diretorio'])) {

                # ===================================== TENTA O UPLOAD ==================
                if (move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome'])) {
                    $tcc_path = $arquivo['nome'];
                } else {
                    $erro = 'Falha no upload.';
                }
            } else {
                mkdir($arquivo['diretorio']);
                move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome']);
                $tcc_path = $arquivo['nome'];
            }
        } else {
            $tcc_path = null;
            $erro = 'Formato .' . $arquivo['formato'] . ' não é válido';
        }

        // save in BD

        $save = self::connection()->prepare("INSERT INTO tcc_revisao (tcc_arquivo, id_aluno, id_docente)
        VALUES(?,?,?)");

        $save->bindValue(1, $tcc_path, PDO::PARAM_STR);
        $save->bindValue(2, $id_aluno, PDO::PARAM_INT);
        $save->bindValue(3, $id_docente, PDO::PARAM_INT);

        if ($erro == '') {

            if ($save->execute()) {

                http_response_code(200);

                return ['status' => 200, 'msgResponse' => 'Arquivo enviado com sucesso'];
            }
        }

        http_response_code(401);
        return ['status' => 401, 'msgResponse' => $erro];
    }
}