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
            <h1>Bilioteca</h1>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row mt-4">
                <?php foreach ($libs as $lib): ?>
                    <div class="col-2">
                        <div class="card border-primary">
                            <img class="card-img-top mt-5 m-auto img-fluid w-25 h-25"
                                src="../dashboard/assets/img/ficheiro-pdf.png" alt="Title" />
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <span class="text-center"><b>
                                            <?= $lib->tema ?>
                                        </b> </h4>
                                </div>
                            </div>
                            <div class="card-footer mb-0 bg-dark">
                                <div class="text-center">
                                    <a href="../front/<?= $lib->tcc_arquivo ?>"
                                        download="  <?= $lib->tema ?>_TCC-<?= $lib->nome ?>"
                                        class="text-light bi bi-download btn-sm me-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Baixar o Livro"></a>

                                    <a href="#!" class="text-primary bi bi-eye me-2" data-bs-toggle="modal"
                                        data-bs-target="#tccModal" data-bs-tcc="<?= '../front/' . $lib->tcc_arquivo ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Ver o documento de TCC"
                                        title="Abrir o Livro"></a>

                                    <a href=" #!" class="bi bi-trash text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Remover o Livro da Bilioteca"
                                        onclick="trashTccFromLib(<?= $lib->idbiblioteca ?>)"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
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

        const trashTccFromLib = (id_lib) => {

            const form_data = new FormData();

            const acao = "remover-tcc-da-biblioteca"

            form_data.append('acao', 'remover-tcc-da-biblioteca')

            form_data.append('id_lib', id_lib)

            ajax(acao, form_data, '');
        }
    </script>

</body>

</html>