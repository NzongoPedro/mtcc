<?php

use Http\Model\Alunos;
use Http\Model\Tarefas;

require '../config.php';

if (!isset($_SESSION["id_docente"])) { ?>
    <script>window.location.href = '../pages-login-tutor.php'</script>
<?php }


require '../../front/vendor/autoload.php';

use Http\Model\mensagens;
use Http\Model\Tcc;
use Http\Model\tutores;

//$mensagens = mensagens::show_list(1);

$alunos_as_tutors = Tarefas::escolharAlunoParaTarefa($_SESSION["id_docente"]);
$tarefas = Tarefas::showTarefasASTutor($_SESSION["id_docente"]);
$tccs = Tcc::showTccASTutor($_SESSION["id_docente"]);
$docente = tutores::showMe($_SESSION["id_docente"]);
$tutorandos = Alunos::showWithTutor($_SESSION["id_docente"]);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require "../components/headers/metas.php"; ?>
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
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
                <!-- MENU-->
                <div class="shadow-sm menu-esquerdo">
                    <br><br>
                    <div class="card shadow-none text-center mb-0">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top img-fluid rounded-circle img-thumbnail img-fluid shadow-sm"
                                src="http://localhost/mtcc/dashboard/assets/img/profile.png" alt="Title"
                                style="width: 100px ;height:100px;" />
                        </div>
                        <div class="card-body">
                            <div class="card-title mt-2">
                                <h5>
                                    <?= $docente->docente_nome ?>
                                </h5>
                            </div>
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
                            <a href="./?page=tcc" class="nav-link p-2">
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
                        <a href="./sair.php" class="nav-link text-danger alert alert-danger w-50 border-0">Terminar
                            sessão</a>
                    </div>
                </div>
                <!--/dMENU-->
            </div>
            <div class="col-10">

                <!-- Mensagens-->

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'mensagens'): ?>

                    <div class="row mt-4">
                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    <div class="mb-1 form-group mt-4 mb-4">
                                        <input type="search" class="form-control form-control-lg rounded-5"
                                            placeholder="Pesquisar Aluno" />
                                    </div>
                                    <hr>
                                    <!-- Hover added -->
                                    <?php
                                    foreach ($tutorandos as $tutorando): ?>

                                        <div class="alert alert-light mb-2 border border-primary-subtle" role="alert">

                                            <a href="./?page=mensagens&aluno=<?= $tutorando->id_aluno ?>&nome=   <?= $tutorando->nome ?>"
                                                class="nav-link">
                                                <b>
                                                    <?= $tutorando->nome ?>
                                                </b>
                                            </a>

                                        </div>

                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-6 w-50">
                            <?php
                            if (isset($_GET['page']) && $_GET['page'] == 'mensagens' && isset($_GET['aluno'])):
                                $nome_aluno = htmlspecialchars(filter_input(INPUT_GET, 'nome'));
                                $id_aluno = htmlspecialchars(filter_input(INPUT_GET, 'aluno'));
                                ?>

                                <div class="card" style="height:80vh">
                                    <div class="card-header bg-dark text-light">
                                        <h5>
                                            <?= $nome_aluno ?>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="corpo-mensagem">
                                            <?php
                                            foreach (mensagens::show_list($id_aluno) as $mensagem): ?>
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
                                            <input type="hidden" name="id_aluno" value="<?= $id_aluno ?>">
                                            <input type="hidden" name="id_tutor" value="<?= $_SESSION["id_docente"] ?>">
                                            <input type="hidden" name="autor_mensagem" value="tutor">
                                            <input type="hidden" name="acao" value="enviar-mensagem">
                                        </form>
                                    </div>
                                </div>

                            <?php endif ?>
                        </div>

                    </div>
                <?php endif ?>

                <!-- END Mensagens-->

                <!-- TAREFEAS-->

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
                                    <form action="" class="form-post form">
                                        <div class="mb-1 form-group mt-4 mb-4">
                                            <input type="text" name="titulo_tarefa"
                                                class="form-control form-control-lg rounded-5"
                                                placeholder="Titulo da Tarefa" required />
                                        </div>

                                        <div class="mb-1 form-group mt-4 mb-4">

                                            <select class="form-select form-select-lg rounded-5" name="id_aluno" required>
                                                <option value="0">Selecione o aluno</option>
                                                <?php
                                                foreach ($alunos_as_tutors as $aluno) {
                                                    echo '<option value="' . $aluno->id_aluno . '">' . $aluno->nome . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id_tutor" value="<?= $_SESSION["id_docente"] ?>">
                                        <textarea name="descricao_tarefa" class="form-control" cols="30" rows="4"
                                            placeholder="Descrição da tarefa. Diga tudo que o tutorando deve fazer de acordo a TCC enviado"
                                            required></textarea>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary w-100">ENVIAR A TAREFA</button>
                                        </div><input type="hidden" name="acao" value="enviar-tarefa">
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="height:80vh">
                                <div class="card-header bg-dark text-light">
                                    <h5 class="titulo-tarefa">Visualizador de Tarefas</h5>
                                </div>
                                <div class="card-body">
                                    <small class="float-end mt-3"><b class="status"></b> </small>
                                    <h5 class="card-title tarefa-para"></h5>
                                    <hr>
                                    <div class="corpo-mensagem">
                                        <div class="alert alert-dark mt-5 h5">
                                            Clique no título de uma tarefa enviada para visualizar de forma detalahada!
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow-sm">
                                <div class="card-header bg-dark ">
                                    <h5 class="text-white"> Tarefas Envidas</h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    foreach ($tarefas as $tarefa): ?>
                                        <div class="alert alert-light mt-2 border-1 border-primary-subtle" role="alert">
                                            <a href="#!" class="nav-link"
                                                onclick="mostrarTarefas(<?= $tarefa->idtarefa ?>, '<?= $tarefa->titulo ?>', '<?= $tarefa->nome ?>', '<?= $tarefa->tarefa ?>', <?= $tarefa->tarefa_estado ?>, '<?= $tarefa->created_at ?>')">
                                                <strong>
                                                    <?= $tarefa->titulo ?>
                                                </strong>
                                            </a>
                                            <hr>
                                            <small>
                                                para:
                                                <?= $tarefa->nome ?>
                                            </small>
                                            <div class="text-end">
                                                aos:
                                                <small>
                                                    <?= $tarefa->created_at ?>
                                                </small>

                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif ?>

                <!-- END TAREFAS -->

                <!-- TCC-->

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'tcc'): ?>

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
                                                    <th scope="col">Tutor</th>
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
                                                            <?= $tcc->idtcc_revisao ?>
                                                        </td>
                                                        <td>
                                                            <?= $tcc->nome ?>
                                                        </td>
                                                        <td>
                                                            <?= $tcc->docente_nome ?>
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
                                                                data-bs-tcc="<?= '../../front/' . $tcc->tcc_arquivo ?>"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Ver o documento de TCC"
                                                                title="ver o documento TCC"></a>

                                                            <a href="../../front/<?= $tcc->tcc_arquivo ?>"
                                                                download="TCC- <?= $tcc->nome ?>"
                                                                class="btn btn-success bi bi-cloud-download-fill btn-sm rounded-circle"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Baixar o arquivo"></a>

                                                            <a href="./?page=send-tcc&id-resivao=<?= $tcc->idtcc_revisao ?>&curso=<?= $tcc->id_curso ?>&id-aluno=<?= $tcc->idaluno ?>"
                                                                class="btn btn-dark bi bi-arrow-left-circle-fill btn-sm rounded-circle"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Enviar para a Administração"></a>



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

                <?php endif ?>

                <!-- END TCC -->

                <!-- Send TCC to admin --->

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'send-tcc'):
                    $curso = $_GET['curso'];
                    $id_tcc_revisao = $_GET['id-resivao'];
                    $id_aluno = $_GET['id-aluno'];
                    ?>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card w-75">
                            <div class="card-body">
                                <div class="card-title mt-2">
                                    <h5>Enviar TCC para a Admnistração</h5>
                                </div>
                                <hr>
                                <form action="" class="form-post form">
                                    <div class="card-text">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="titulo_tarefa" id="formId1"
                                                placeholder="Escreva aqui o tema..." required />
                                            <label for="formId1">Tema do Projeto</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control h-75" name="descricao_tarefa" id="formId2"
                                                row="50" col="50" placeholder="Uma breve descrição do projeto."
                                                required></textarea>
                                            <label for="formId2">Descrição do projeto</label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_curso" value="<?= $curso ?>">
                                    <input type="hidden" name="id_aluno" value="<?= $id_aluno ?>">
                                    <input type="hidden" name="id_tcc" value="<?= $id_tcc_revisao ?>">
                                    <input type="hidden" name="acao" value="enviar-tcc-para-adm">

                                    <div class="mt-4">
                                        <input type="submit" class="btn  btn-lg btn-primary w-100 rounded-5"
                                            value="ENVIAR">
                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>

                <?php endif ?>

                <?php
                if (isset($_GET['page']) && $_GET['page'] == 'tutorandos'): ?>
                <div class="card mt-5">
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($tutorandos as $aluno):
                                        $status = '<span class="badge rounded-pill text-bg-danger">Inativa</span>';
                                        if ($aluno->estado_conta != 0) {
                                            $status = '<span class="badge rounded-pill text-bg-success">Activado</span>';
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $aluno->idaluno ?>
                                            </td>

                                            <td>
                                                <?= $aluno->nome ?>
                                            </td>
                                            <td>
                                                <?= $aluno->n_estudante ?>
                                            </td>
                                            <td>
                                                <?= $aluno->n_BI ?>
                                            </td>
                                            <td>
                                                <?= $aluno->telefone ?>
                                            </td>
                                            <td>
                                                <?= $aluno->curso_nome ?>
                                            </td>
                                            <td>
                                                <?= $aluno->estado_conta ?>
                                            </td>
                                            <td>
                                                <?= $status ?>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                <?php endif ?>

                <!--End send-->
            </div>
        </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="tccModal" tabindex="-1" aria-labelledby="tccModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tccModalLabel">tcc de Pagamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="tccFrame" src="" style="width: 100%; height: 80vh;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        function mostrarTarefas(id, titulo, aluno, tarefa, status, data_criacao) {

            document.querySelector('.titulo-tarefa').innerHTML = "Nº " + id + " | " + titulo
            document.querySelector('.tarefa-para').innerHTML = aluno
            document.querySelector('.corpo-mensagem').innerHTML = `<div class="alert alert-light shadow-sm mt-2 mb-2 border-1 border-dark">${tarefa}</div>`
            document.querySelector('.status').innerHTML = `status: <span class="badge badge-pill bg-danger">A RETIFICAR</span>`
            if (status == 1) {
                document.querySelector('.status').innerHTML = `status: a <span class="badge badge-pill bg-primary">RETIFICADO</span>`
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var tccModal = document.getElementById('tccModal');
            tccModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Botão que acionou o modal
                var tccUrl = button.getAttribute('data-bs-tcc'); // Extrai informação dos atributos data-bs-tcc
                var modalBody = tccModal.querySelector('.modal-body');
                modalBody.innerHTML = '<iframe id="tccFrame" src="' + tccUrl + '" style="width: 100%; height: 80vh;" frameborder="0"></iframe>';
            });
        });
    </script>

</body>

</html>