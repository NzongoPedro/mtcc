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
      <h1>Painel de Controlo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Painel de Indicadores</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Administradores <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-vcard-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?= $counter['usuarios'] ?>
                      </h6>
                      <span class="text-dark small pt-1 fw-bold">
                        <?= ($counter['usuarios'] / 100) ?>%
                      </span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Alunos <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?= ($counter['alunos']) ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">
                        <?= ($counter['alunos'] / 100) ?>%
                      </span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Docentes <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-plus"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?= ($counter['tutores']) ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">
                        <?= ($counter['tutores'] / 100) ?>%
                      </span>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Monografias <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journals"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?= ($counter['monografias']) ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">
                        <?= ($counter['monografias'] / 100) ?>%
                      </span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Biblioteca <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-layers-half"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?= ($counter['biblioteca']) ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">
                        <?= ($counter['biblioteca'] / 100) ?>%
                      </span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <di-4v class="col">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Defesas <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?= ($counter['defesas']) ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">
                        <?= ($counter['defesas'] / 100) ?>%
                      </span>
                    </div>
                  </div>
                </div>

              </div>
            </di-4v>

          </div>
        </div><!-- End Left side columns -->
      </div>
      <!-- Right side columns -->
      <div class="row">
        <!-- Reports -->
        <div class="col-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Representação Gráfica</h5>

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['Alunos', 'Admins', 'Defesas', 'Biblioteca', 'Monografias', 'Docentes'],
                      datasets: [{
                        label: 'Contador',
                        data: [<?= ($counter['alunos']) ?>, <?= ($counter['usuarios']) ?>, <?= ($counter['defesas']) ?>, <?= ($counter['biblioteca']) ?>, <?= ($counter['monografias']) ?>, <?= ($counter['tutores']) ?>],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(55, 109, 202, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgba(55, 109, 202, 0.2)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->



              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->

        <div class="col-lg-6">

          <!-- Website Traffic -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Reletório <span>| Geral</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    title: {
                      text: 'Representação Gráfica',
                      subtext: 'Outros Dados',
                      left: 'center'
                    },
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                        value: <?= ($counter['conversas']) ?>,
                        name: 'Mensagens'
                      },
                      {
                        value: <?= ($counter['tarefas']) ?>,
                        name: 'Tarefas'
                      },
                      {
                        value: <?= ($counter['tarefas_pendentes']) ?>,
                        name: 'Tarefas Pendentes'
                      },
                      {
                        value: <?= ($counter['tarefas_concluidas']) ?>,
                        name: 'Tarefas Concluídas'
                      },
                      {
                        value: <?= ($counter['tcc_revisao']) ?>,
                        name: 'Monograffias Revisadas'
                      },

                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= URL ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= URL ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= URL ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= URL ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?= URL ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= URL ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= URL ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= URL ?>assets/js/main.js"></script>

</body>

</html>