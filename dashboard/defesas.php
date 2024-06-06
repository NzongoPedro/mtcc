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
            <h1>Defesas</h1>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item active">Defesas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mt-2">
                                <h5>Defesas Marcadas</h5>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable table-sm table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Estudante</th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Tema</th>
                                            <th scope="col">Primeiro Vogal</th>
                                            <th scope="col">Opositor</th>
                                            <th scope="col">Tutor</th>
                                            <th scope="col">Data/Defesa</th>
                                            <th scope="col">Hora/Defesa</th>
                                            <th scope="col">Local/Sala</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($defesas as $defesa): ?>
                                            <tr>
                                                <td>
                                                    <?= $defesa->iddefesa ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->nome ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->curso_nome ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->tema ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->defesa_volgal_1 ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->defesa_opositor ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->docente_nome ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->defesa_data ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->defesa_hora ?>
                                                </td>
                                                <td>
                                                    <?= $defesa->local ?>
                                                </td>
                                                <td>

                                                    <a href="#!" class="btn btn-danger bi bi-trash btn-sm rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Cancelar a Defesa"
                                                        onclick="trashDefesa( <?= $defesa->iddefesa ?>)"></a>


                                                    <a href="#!"
                                                        class="btn btn-success bi bi-calendar3 btn-sm rounded-circle"
                                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Remarcar a Defesa" data-bs-toggle="modal"
                                                        data-bs-target="#modalDefesa" title="Remarcar a  defesa"
                                                        onmouseover="getSomeData(<?= $defesa->iddefesa ?>)"></a>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="tccModal" tabindex="-1" aria-labelledby="tccModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tccModalLabel">DOCMENT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="tccFrame" src="" style="width: 100%; height: 80vh;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="modalDefesa" tabindex="-1" aria-labelledby="modalDefesaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDefesaLabel">Remarcar Defesa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="#!" class="form">


                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="data" id="formId3" required />
                                    <label for="formId3">Nova Data/Defesa</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" name="hora" id="formId4" required />
                                    <label for="formId4">Nova Hora/Defesa</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sala" id="formId5" required />
                            <label for="formId5">Local/Sala/Defesa</label>
                        </div>

                        <input type="hidden" name="id_defesa" id="idAdm" value="">

                        <input type="hidden" name="acao" value="remarcar-defesa">

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Limpar
                                campos</button>
                            <button type="submit" class="btn btn-primary">Remarcar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
    <script src="assets/js/sweet.js"></script>
    <script src="assets/js/requests.js"></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        document.addEventListener('DOMContentLoaded', function () {
            var tccModal = document.getElementById('tccModal');
            tccModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Botão que acionou o modal
                var tccUrl = button.getAttribute('data-bs-tcc'); // Extrai informação dos atributos data-bs-tcc
                var modalBody = tccModal.querySelector('.modal-body');
                modalBody.innerHTML = '<iframe id="tccFrame" src="' + tccUrl + '" style="width: 100%; height: 80vh;" frameborder="0"></iframe>';
            });
        });

        const trashDefesa = (id_defesa) => {

            const form_data = new FormData();

            const acao = "remover-defesa"

            form_data.append('acao', acao)

            form_data.append('id_defesa', id_defesa)

            ajax(acao, form_data, '');
        }


        const trashTccFromLib = (id_tcc) => {

            const form_data = new FormData();

            const acao = "remover-tcc-da-biblioteca"

            form_data.append('acao', 'remover-tcc-da-biblioteca')

            form_data.append('id_tcc', id_tcc)

            ajax(acao, form_data, '');
        }

        const getSomeData = (id_defesa) => {

            document.querySelector("#idAdm").value = id_defesa
        
        }
    </script>

</body>

</html>