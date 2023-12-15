<?php
require './vendor/autoload.php';

use Http\Controller\AlunosController;

if (isset($_POST['acao'])) {

    $acao = filter_input(INPUT_POST, 'acao');

    $id_curso = htmlspecialchars(filter_input(INPUT_POST, 'id_curso', FILTER_SANITIZE_NUMBER_INT));
    $nome = htmlspecialchars(filter_input(INPUT_POST, 'nome'));
    $n_bi = htmlspecialchars(filter_input(INPUT_POST, 'BI'));
    $n_estudante = htmlspecialchars(filter_input(INPUT_POST, 'estudante', FILTER_SANITIZE_NUMBER_INT));
    $telefone = htmlspecialchars(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));

    switch ($acao) {
        case 'cadastrar_aluno':

            print json_encode(AlunosController::store($id_curso, $nome, $n_estudante, $n_bi, $telefone, $password));

            break;

        case 'login_aluno':

            print  json_encode(AlunosController::login($n_estudante, $password));

            break;

        default:
            # code...
            break;
    }
} else {
    echo 'sem botão';
}
