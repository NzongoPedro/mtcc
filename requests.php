<?php

require './vendor/autoload.php';

use Http\Model\Tcc;
use Http\Model\admin;
use Http\Model\Alunos;
use Http\Model\Tarefas;
use Http\Model\tutores;
use Http\Model\mensagens;
use Http\Controller\AlunosController;

if (isset($_POST['acao'])) {

    $acao = filter_input(INPUT_POST, 'acao');

    $id_curso = htmlspecialchars(filter_input(INPUT_POST, 'id_curso', FILTER_SANITIZE_NUMBER_INT));
    $id_estudante = htmlspecialchars(filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_NUMBER_INT));
    $id_tutor = htmlspecialchars(filter_input(INPUT_POST, 'id_tutor', FILTER_SANITIZE_NUMBER_INT));
    $id_adm = htmlspecialchars(filter_input(INPUT_POST, 'id_adm', FILTER_SANITIZE_NUMBER_INT));
    $nome = htmlspecialchars(filter_input(INPUT_POST, 'nome'));
    $n_bi = htmlspecialchars(filter_input(INPUT_POST, 'BI'));
    $n_estudante = htmlspecialchars(filter_input(INPUT_POST, 'estudante', FILTER_SANITIZE_NUMBER_INT));
    $telefone = htmlspecialchars(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
    $email = htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $nivel = htmlspecialchars(filter_input(INPUT_POST, 'nivel_acesso', FILTER_SANITIZE_NUMBER_INT));
    $grau = htmlspecialchars(filter_input(INPUT_POST, 'grau', FILTER_SANITIZE_NUMBER_INT));
    $message = nl2br(htmlspecialchars(filter_input(INPUT_POST, 'mensagem')));
    $autor_mensagem = htmlspecialchars(filter_input(INPUT_POST, 'autor_mensagem'));
    $arquivo_tcc = $_FILES['arquivo-tcc'];
    $titulo_tarefa = htmlspecialchars(filter_input(INPUT_POST, 'titulo_tarefa'));
    $desc_tarefa = nl2br(htmlspecialchars(filter_input(INPUT_POST, 'descricao_tarefa')));

    switch ($acao) {
        case 'cadastrar_aluno':

            print json_encode(AlunosController::store($id_curso, $nome, $n_estudante, $n_bi, $telefone, $password));

            break;

        case 'login_aluno':

            print json_encode(AlunosController::login($n_estudante, $password));

            break;

        case 'criar-conta-adm':
            print json_encode(admin::save($nome, $email, $password));
            break;

        case 'login-admin':
            print json_encode(admin::login($email, $password));
            break;

        case 'login-docente':
            print json_encode(tutores::login($email, $password));
            break;

        case 'cadastrar-funcionario':
            print json_encode(admin::create($nome, $email, $nivel));
            break;

        case 'cadastrar-tutor':
            print json_encode(tutores::save($grau, $nome, $email, $telefone));
            break;

        case 'associar-tutor-aluno':
            print json_encode(tutores::associacao($id_estudante, $id_tutor, $id_adm));
            break;

        case 'enviar-mensagem':
            print json_encode(mensagens::send($id_estudante, $id_tutor, $autor_mensagem, $message));
            break;

        case 'enviar-tcc':

            print json_encode(Tcc::uploaTcc($id_estudante, $id_tutor, $arquivo_tcc));
            break;

        case 'enviar-tarefa':
          
            print json_encode(Tarefas::store($id_tutor, $id_estudante, $titulo_tarefa, $desc_tarefa));
            break;



        default:
            # code...
            break;
    }
} elseif (isset($_GET['acao'])) {

    $acao = filter_input(INPUT_GET, 'acao');
    $numero_estudante = htmlspecialchars(filter_input(INPUT_GET, 'numero_estudante', FILTER_SANITIZE_NUMBER_INT));

    switch ($acao) {
        case 'pesquisar-aluno-para-associacao':
            print json_encode(Alunos::search($numero_estudante));
            break;

        default:
            # code...
            break;
    }
} else {
    echo 'sem botão';
}
