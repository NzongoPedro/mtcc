<?php
require '../front/vendor/autoload.php';

use Http\Model\admin;
use Http\Model\Alunos;
use Http\Model\tutores;

$id_adm = $_SESSION['id_admin'];
$dados_adm = admin::show($id_adm);
$usuarios = admin::showAllUsers($id_adm);
$alunos = Alunos::showAllStudents();
$docentes = tutores::show();
$niveis_acesso = admin::verNivelAcesso();
$niveis_acesso_docente = admin::verNivelDcentes();

//var_dump(admin::verNivelAcesso());
