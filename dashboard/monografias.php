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
            <h1>Monografias</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                    <li class="breadcrumb-item active">Monografias</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mt-2">
                                <h5>Arquivos de TCC</h5>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Aluno</th>
                                            <th scope="col">Nº Estudante</th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Data/Envio</th>
                                            <th scope="col">Data/Atualização</th>
                                            <th>Tipo/ficheiro</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($tccs as $tcc): ?>
                                            <tr>
                                                <td>
                                                    <?= $tcc->idtcc ?>
                                                </td>
                                                <td>
                                                    <?= $tcc->nome ?>
                                                </td>
                                                <td>
                                                    <?= $tcc->n_estudante ?>
                                                </td>
                                                <td>
                                                    <?= $tcc->curso_nome ?>
                                                </td>
                                                <td>
                                                    <?= $tcc->created_at ?>
                                                </td>
                                                <td>
                                                    <?= $tcc->updated_at ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-pill bg-danger text-center">PDF</span>
                                                </td>
                                                <td>

                                                    <a href="#!" class="btn btn-primary bi bi-eye btn-sm rounded-circle"
                                                        data-bs-toggle="modal" data-bs-target="#tccModal"
                                                        data-bs-tcc="<?= '../front/' . $tcc->tcc_arquivo ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Ver o documento de TCC"
                                                        title="ver o documento TCC"></a>

                                                    <a href="../front/<?= $tcc->tcc_arquivo ?>"
                                                        download="TCC- <?= $tcc->nome ?>"
                                                        class="btn btn-success bi bi-cloud-download-fill btn-sm rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Baixar o arquivo"></a>

                                                    <a href="#!"
                                                        class="btn btn-dark bi bi-arrow-up-circle-fill btn-sm rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Enviar para a Biblioteca"
                                                        onclick="sendTccToLib( <?= $tcc->idtcc ?>)"></a>


                                                    <a href="#!"
                                                        class="btn btn-warning bi bi-calendar-check btn-sm rounded-circle"
                                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Marcar a Defesa" data-bs-toggle="modal"
                                                        data-bs-target="#modalDefesa" title="Marcar defesa"
                                                        onmouseover="getSomeData(<?= $tcc->idaluno ?>, <?= $id_adm ?>, <?= $tcc->id_docente ?>)"></a>

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
                    <h1 class="modal-title fs-5" id="modalDefesaLabel">Marcar Defesa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="#!" class="form">


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="primeiro_vogal" id="formId1" required />
                            <label for="formId1">Primeiro Vogal</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="opositor" id="formId2" required />
                            <label for="formId2">Opositor</label>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="data" id="formId3" required />
                                    <label for="formId3">Data/Defesa</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" name="hora" id="formId4" required />
                                    <label for="formId4">Hora/Defesa</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="sala" id="formId5" required />
                            <label for="formId5">Local/Sala/Defesa</label>
                        </div>

                        <input type="hidden" name="id_adm" id="idAdm" value="">
                        <input type="hidden" name="id_aluno" id="idAluno" value="">
                        <input type="hidden" name="acao" value="marcar-defesa">

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Limpar
                                campos</button>
                            <button type="submit" class="btn btn-primary">Marcar</button>
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

        const sendTccToLib = (id_tcc) => {

            const form_data = new FormData();

            const acao = "enviar-tcc-para-biblioteca"

            form_data.append('acao', 'enviar-tcc-para-biblioteca')

            form_data.append('id_tcc', id_tcc)

            ajax(acao, form_data, '');
        }


        const trashTccFromLib = (id_tcc) => {

            const form_data = new FormData();

            const acao = "remover-tcc-da-biblioteca"

            form_data.append('acao', 'remover-tcc-da-biblioteca')

            form_data.append('id_tcc', id_tcc)

            ajax(acao, form_data, '');
        }

        const getSomeData = (idaluno, id_adm, id_docente) => {
            document.querySelector("#idAluno").value = idaluno
            document.querySelector("#idAdm").value = id_adm
            document.querySelector("#idTutor").value = id_docente
        }
    </script>

</body>

</html>