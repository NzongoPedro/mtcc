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
            <h1>Docentes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item active">Docentes</li>
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
                            <p>Localize usuários (Docentes ou Tutores)</p>

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
                                        <th>Telefone</th>
                                        <th>Grau</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($docentes as $tutor): ?>
                                        <tr>
                                            <td>
                                                <?= $tutor->iddocente ?>
                                            </td>
                                            <td>
                                                <img src="<?= $tutor->docente_foto ?>" alt="<?= $tutor->docente_nome ?>"
                                                    class="rounded rounded-circle"
                                                    style="object-fit:cover; object-position:center; height:30px; width:30px;">
                                            </td>
                                            <td>
                                                <?= $tutor->docente_nome ?>
                                            </td>
                                            <td>
                                                <?= $tutor->docente_email ?>
                                            </td>
                                            <td>
                                                <?= $tutor->docente_telefone ?>
                                            </td>
                                            <td>
                                                <span class="badge rounded-pill text-bg-primary">
                                                    <?= $tutor->nivel ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="!#" class="btn bi bi-share-fill text-dark" title="Atribuir aluno"
                                                    data-bs-toggle="modal" data-bs-target="#modalAssociacaoTutorAluno"
                                                    onclick="getIdTutor(<?= $tutor->iddocente ?>)"></a>

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
    <?php require './components/UI/modal/modalNewTutor.php'; ?>
    <?php require './components/UI/modal/modalTutor_as_Aluno.php'; ?>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/sweet.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/requests.js"></script>

    <script>
        // função para pesquisar estudantes para a associação ao tutor

        function getIdTutor(id_tutor) {
            document.querySelector('#idTutor').value = id_tutor
        }

        const input_search = document.querySelector('.input-search')
        document.querySelector('.btn-submit').classList.add('d-none')

        input_search.addEventListener('keyup', () => {

            const campo_nome = document.querySelector('.campo_nome')
            let value_input = input_search.value

            if (!value_input) {
                input_search.classList.add('border-danger')
                input_search.classList.add('border-2')
            } else {

                input_search.classList.remove('border-danger')
                fetch("../front/requests.php?numero_estudante=" + value_input + "&acao=pesquisar-aluno-para-associacao")
                    .then((res) => res.json())
                    .then(response => {

                        if (response.status == 401) {

                            campo_nome.value = response.msgResponse
                            campo_nome.classList.add('bg-danger')
                            campo_nome.classList.add('text-light')
                            campo_nome.classList.remove('bg-success')
                            document.querySelector('.btn-submit').classList.add('d-none')

                        } else {
                            campo_nome.classList.remove('bg-danger')
                            campo_nome.classList.add('bg-success')
                            campo_nome.value = response.dados.nome
                            document.querySelector('#idEstudante').value = response.dados.idaluno
                            document.querySelector('.btn-submit').classList.remove('d-none')
                        }
                        // console.log(response)
                    })
            }

        })
    </script>

</body>

</html>