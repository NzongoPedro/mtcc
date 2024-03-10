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
            <h1>Todos os alunos</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item active">Alunos</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">Dados tabelados</h5>
                            <p>Localize Alunos</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><b>N</b>ome</th>
                                        <th>Nº estudante.</th>
                                        <th>Nº B.I</th>
                                        <th>Telefone</th>
                                        <th>Curso</th>
                                        <th>Status</th>
                                        <th>Designação</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($alunos as $aluno) :
                                        $status = '<span class="badge rounded-pill text-bg-danger">Inativa</span>';
                                        if ($aluno->estado_conta != 0) {
                                            $status = '<span class="badge rounded-pill text-bg-success">Activado</span>';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $aluno->idaluno ?></td>

                                            <td><?= $aluno->nome ?></td>
                                            <td><?= $aluno->n_estudante ?></td>
                                            <td><?= $aluno->n_BI ?></td>
                                            <td><?= $aluno->telefone ?></td>
                                            <td><?= $aluno->curso_nome ?></td>
                                            <td><?= $aluno->estado_conta ?></td>
                                            <td><?= $status ?></td>
                                            <td>
                                                <a href="!#" class="btn bi bi-plus-circle-fill text-dark" title="Mais detalhes"></a>
                                                <a href="!#" class="btn bi bi-trash-fill text-danger" title="Remover"></a>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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