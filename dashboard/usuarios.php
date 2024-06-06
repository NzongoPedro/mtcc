<?php

require './config.php';
require './checkSession.php';
session_on();
require './allDatas.php';



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require "./components/headers/metas.php"; ?>
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <?php require "./components/headers/header-bar.php"; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require "./components/headers/sidebar.php"; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Todos os usuários</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item active">Usuários</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Dados tabelados</h5>
                            <div class="float-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalNovoUsuario"><i class="bi bi-plus-circle me-1"></i>
                                    Novo</button>
                            </div>
                            <p>Localize usuários (funcionário). Professores, secretários e outros.</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>
                                            <b>N</b>ome
                                        </th>
                                        <th>Email.</th>
                                        <th>Nível</th>
                                        <th>Nível Designação</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($usuarios as $usuario): ?>
                                        <tr>
                                            <td>
                                                <?= $usuario->idadmin ?>
                                            </td>
                                            <td>
                                                <img src="<?= $usuario->adm_foto ?>" alt="<?= $usuario->adm_name ?>"
                                                    class="rounded rounded-circle"
                                                    style="object-fit:cover; object-position:center; height:30px; width:30px;">
                                            </td>
                                            <td>
                                                <?= $usuario->adm_name ?>
                                            </td>
                                            <td>
                                                <?= $usuario->adm_email ?>
                                            </td>
                                            <td>
                                                <?= $usuario->nivel_acesso ?>
                                            </td>
                                            <td>
                                                <?= $usuario->nivel_nome ?>
                                            </td>

                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php require './components/UI/modal/modalNewUser.php'; ?>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/requests.js"></script>

</body>

</html>