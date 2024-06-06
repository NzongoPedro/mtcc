<?php
require '../front/vendor/autoload.php';

use Http\Model\Tcc;
use Http\Model\admin;
use Http\Model\Alunos;
use Http\Model\Counter;
use Http\Model\Defesas;
use Http\Model\tutores;
use Http\Model\Biblioteca;

$id_adm = $_SESSION['id_admin'];
$dados_adm = admin::show($id_adm);
$usuarios = admin::showAllUsers($id_adm);
$alunos = Alunos::showAllStudents();
$docentes = tutores::show();
$niveis_acesso = admin::verNivelAcesso();
$niveis_acesso_docente = admin::verNivelDcentes();

$tccs = Tcc::showAsAdmin();
$libs = Biblioteca::show();
$defesas = Defesas::showAll();

$counter = Counter::counter();

//var_dump(admin::verNivelAcesso());
