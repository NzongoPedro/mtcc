<?php
use Http\Model\Tarefas;

require '../config.php';

if (!isset($_SESSION["id_docente"])) { ?>
    <script>window.location.href = '../pages-login-tutor.php'</script>
<?php }


require '../../front/vendor/autoload.php';

use Http\Model\mensagens;

$mensagens = mensagens::show_list(1);

$alunos_as_tutors = Tarefas::escolharAlunoParaTarefa($_SESSION["id_docente"]);

var_dump($alunos_as_tutors);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require "../components/headers/metas.php"; ?>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            overflow: hidden;
            overflow-y: scroll;
        }

        .menu-esquerdo {
            height: 100vh;
            position: fixed;
            width: 15%;
            background: #fff;
            border-left: 2px solid #a1a1a1;
        }

        .mensagem {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 14px;
            max-width: 80%;
        }

        .corpo-mensagem {
            height: 65vh;
            overflow: auto;
            overflow-x: hidden;
        }

        .aluno {
            margin-left: 50%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2 fixed-top">
        <a class="navbar-brand" href="#!">MSC-TCC | Tutores</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">

        </div>
    </nav>

    <section class="section-menu mt-5 bg-light">
        <div class="row mt-2">
            <div class="col-2">
                <!-- Some borders are removed -->
                <div class="shadow-sm menu-esquerdo">
                    <br><br>
                    <div class="card shadow-none text-center mb-0">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top img-fluid rounded-circle"
                                src="http://localhost/mtcc/dashboard/assets/img/profile-img.jpg" alt="Title"
                                style="width: 100px ;height:100px;" />
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Esmeraldo Fernandes</h4>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="./?page=mensagens" class="nav-link p-2">
                                <i class="bi bi-chat me-3"></i> Mensagens
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="./?page=tarefas" class="nav-link p-2">
                                <i class="bi bi-list me-3"></i> Tarefas
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="./?page=tarefas" class="nav-link p-2">
                                <i class="bi bi-file-pdf me-3"></i> TCC
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="./?page=tutorandos" class="nav-link p-2">
                                <i class="bi bi-people me-3"></i> Meus Tutorandos
                            </a>
                        </li>

                    </ul>

                    <div class="alert rounded-0 fixed-bottom w-25">
                        <a href="#!" class="nav-link text-danger alert alert-danger w-50 border-0">Terminar sessão</a>
                    </div>
                </div>
            </div>
            <div class="col-10">

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'mensagens'): ?>

                    <div class="row mt-4">
                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    <div class="mb-1 form-group mt-4 mb-4">
                                        <input type="search" class="form-control form-control-lg rounded-5"
                                            placeholder="Pesquisar mensagens" />
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 w-50">
                            <div class="card" style="height:80vh">
                                <div class="card-header bg-dark text-light">
                                    <h5>Nome Aluno</h5>
                                </div>
                                <div class="card-body">
                                    <div class="corpo-mensagem">
                                        <?php
                                        foreach ($mensagens as $mensagem): ?>
                                            <div
                                                class="mensagem d-block alert text-light <?= ($mensagem->autor != 'aluno') ? 'aluno bg-primary' : 'bg-dark'; ?>">
                                                <?= $mensagem->conversa ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="card-header bg-secondary">
                                    <form action="#!" class="form">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <textarea class="form-control form-control-lg rounded-5"
                                                            name="mensagem"
                                                            placeholder="Escreva aqui a mensagem..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <input type="submit"
                                                        class="btn btn-lg btn-primary rounded-2 p-3 w-100 mt-2"
                                                        value="Enviar">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_aluno" value="1">
                                        <input type="hidden" name="id_tutor" value="1">
                                        <input type="hidden" name="autor_mensagem" value="tutor">
                                        <input type="hidden" name="acao" value="enviar-mensagem">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-header bg-dark ">
                                    <h5 class="text-white"> Arquivos TCC</h5>
                                </div>
                                <div class="card-body">


                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'tarefas'): ?>

                    <div class="row mt-4">
                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-header bg-dark">
                                    <div class="card-title text-white">
                                        <h5>Nova tarefa</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" class="form-post">
                                        <div class="mb-1 form-group mt-4 mb-4">
                                            <input type="text" name="titulo_tarefa"
                                                class="form-control form-control-lg rounded-5"
                                                placeholder="Titulo da Tarefa" />
                                        </div>

                                        <div class="mb-1 form-group mt-4 mb-4">

                                            <select class="form-select form-select-lg rounded-5" name="id_aluno">
                                                <option value="0">Selecione o aluno</option>
                                                <?php


                                                foreach ($alunos_as_tutors as $aluno) {
                                                    echo '<option value="' . $aluno->id_aluno . '">' . $aluno->nome . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <textarea name="descricao_tarefa" class="form-control" cols="30" rows="4"
                                            placeholder="Descrição da tarefa. Diga tudo que o tutorando deve fazer de acordo a TCC enviado"></textarea>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary w-100">ENVIAR A TAREFA</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="height:80vh">
                                <div class="card-header bg-dark text-light">
                                    <h5>Nome Aluno</h5>
                                </div>
                                <div class="card-body">
                                    <div class="corpo-mensagem">
                                        <?php
                                        foreach ($mensagens as $mensagem): ?>
                                            <div
                                                class="mensagem d-block alert text-light <?= ($mensagem->autor != 'aluno') ? 'aluno bg-primary' : 'bg-dark'; ?>">
                                                <?= $mensagem->conversa ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="card-header bg-secondary">
                                    <form action="#!" class="form">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="mb-3">
                                                        <textarea class="form-control form-control-lg rounded-5"
                                                            name="mensagem"
                                                            placeholder="Escreva aqui a mensagem..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <input type="submit"
                                                        class="btn btn-lg btn-primary rounded-2 p-3 w-100 mt-2"
                                                        value="Enviar">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_aluno" value="1">
                                        <input type="hidden" name="id_tutor" value="1">
                                        <input type="hidden" name="autor_mensagem" value="tutor">
                                        <input type="hidden" name="acao" value="enviar-mensagem">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-header bg-dark ">
                                    <h5 class="text-white"> Tarefas Envidas</h5>
                                </div>
                                <div class="card-body">


                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif ?>
            </div>
        </div>

    </section>



    <!-- Vendor JS Files -->
    <script src="<?= URL ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= URL ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= URL ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?= URL ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= URL ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= URL ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= URL ?>assets/js/sweet.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= URL ?>assets/js/main.js"></script>

    <script src="../assets/js/requests.js"></script>

</body>

</html>