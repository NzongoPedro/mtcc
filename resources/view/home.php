<?php check_login_off(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php $title_page = "Página incial "; ?>
<!-- head-->
<?php require "./resources/components/header/metas.php"; ?>
<!-- /head -->

<body>

    <div id="page">

        <!-- heaer-->
        <?php require "./resources/components/header/navbar.php"; ?>
        <!-- /header -->

        <main>
            <section class="header-video jarallax" data-jarallax-video="mp4:./video/intro.mp4,webm:./video/intro.webm,ogv:./video/intro.ogv">
                <div id="hero_video">
                    <div>
                        <h3><strong>M-TCC</strong><br>UGS</h3>
                        <p>Uma biblioteca virtual de <strong>de consultas de tcc</strong> de simples acesso</p>
                    </div>
                    <a href="#first_section" class="btn_explore hidden_tablet"><i class="ti-arrow-down"></i></a>
                </div>
            </section>
            <!-- /header-video Jarallax -->

            <ul id="grid_home" class="clearfix">
                <li>
                    <a href="#0" class="img_container">
                        <img src="img/grid_home_1.jpg" alt="">
                        <div class="short_info">
                            <h3><strong>Livros Digitais</strong>Biblioteca</h3>
                            <div><span class="btn_1 rounded">Ler mais</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0" class="img_container">
                        <img src="img/grid_home_1.jpg" alt="">
                        <div class="short_info">
                            <h3><strong>Comunidade</strong>Estudantíl</h3>
                            <div><span class="btn_1 rounded">Ler mais</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0" class="img_container">
                        <img src="img/grid_home_1.jpg" alt="">
                        <div class="short_info">
                            <h3><strong>Aprovações</strong>TCC</h3>
                            <div><span class="btn_1 rounded">Enviar TCC</span></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!--/grid_home -->

            <div class="container-fluid margin_120_0" id="first_section">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>TCC Mais consultados</h2>
                    <p>Veja a baixo as monografias mais vistos e baixados na biblioteca.</p>
                </div>
                <div id="reccomended" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="box_grid">
                            <figure>
                                <a href="#0" class="wish_bt"></a>
                                <a href="course-detail.html">
                                    <div class="preview"><span>ver detalhes</span></div><img src="img/course__list_1.jpg" class="img-fluid" alt="">
                                </a>
                                <div class="price">
                                    <i class="icon-download-1"></i> 39
                                </div>

                            </figure>
                            <div class="wrapper">
                                <small>Autor</small>
                                <h3>Saúde e sonho</h3>
                                <p>Descrição breve do sistema em vindo da descrição </p>
                                <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                            </div>
                            <ul>
                                <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                <li><i class="icon_like"></i> 890</li>
                                <li><a href="course-detail.html">baixar agora</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- /carousel -->
                <div class="container">
                    <p class="btn_home_align"><a href="courses-grid.html" class="btn_1 rounded">Ver mais na biblioteca</a></p>
                </div>
                <!-- /container -->
                <hr>
            </div>
            <!-- /container -->

            <div class="container margin_30_95">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>Melhores avaliação</h2>
                    <p>Veja os trabalhos com notas mais altas na UGS.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="#0" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="img/course_1.jpg" class="img-fluid" alt="">
                                <div class="info">
                                    <small><i class="ti-layers"></i>15 Programmes</small>
                                    <h3>Arts and Humanities</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="#0" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="img/course_2.jpg" class="img-fluid" alt="">
                                <div class="info">
                                    <small><i class="ti-layers"></i>23 Programmes</small>
                                    <h3>Engineering</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="#0" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="img/course_3.jpg" class="img-fluid" alt="">
                                <div class="info">
                                    <small><i class="ti-layers"></i>23 Programmes</small>
                                    <h3>Architecture</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="#0" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="img/course_4.jpg" class="img-fluid" alt="">
                                <div class="info">
                                    <small><i class="ti-layers"></i>23 Programmes</small>
                                    <h3>Science and Biology</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="#0" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="img/course_5.jpg" class="img-fluid" alt="">
                                <div class="info">
                                    <small><i class="ti-layers"></i>23 Programmes</small>
                                    <h3>Law and Criminology</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
                    <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                        <a href="#0" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img src="img/course_6.jpg" class="img-fluid" alt="">
                                <div class="info">
                                    <small><i class="ti-layers"></i>23 Programmes</small>
                                    <h3>Medical</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /grid_item -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

            <div class="bg_color_1">
                <div class="container margin_120_95">
                    <div class="main_title_2">
                        <span><em></em></span>
                        <h2>Eventos e Novidades</h2>
                        <p>Veja eventos futuros e passados (Defesas, outogras...)</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <a class="box_news" href="#0">
                                <figure><img src="img/news_home_1.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Mark Twain</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Pri oportere scribentur eu</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                        <div class="col-lg-6">
                            <a class="box_news" href="#0">
                                <figure><img src="img/news_home_2.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Jhon Doe</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Duo eius postea suscipit ad</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                        <div class="col-lg-6">
                            <a class="box_news" href="#0">
                                <figure><img src="img/news_home_3.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Luca Robinson</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Elitr mandamus cu has</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                        <div class="col-lg-6">
                            <a class="box_news" href="#0">
                                <figure><img src="img/news_home_4.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Paula Rodrigez</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Id est adhuc ignota delenit</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                    </div>
                    <!-- /row -->
                    <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">Ver tudo</a></p>
                </div>
                <!-- /container -->
            </div>
            <!-- /bg_color_1 -->

            <div class="call_section">
                <div class="container clearfix">
                    <div class="col-lg-5 col-md-6 float-right wow position-relative" data-wow-offset="250">
                        <div class="block-reveal">
                            <div class="block-vertical"></div>
                            <div class="box_1">
                                <h3>Faça a sua TCC ser mais lida</h3>
                                <p>Quer deixar a sua monografia como uma das mais lidas, baixadas e consultadas? não perca mais tempo clique no botão abaixo e saiba mais sobre como fazer isso. </p>
                                <a href="#0" class="btn_1 rounded">saiba mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/call_section-->
        </main>
        <!-- /main -->

        <?php require "./resources/components/footer/footer.php"; ?>
        <!--/footer-->
    </div>
    <!-- page -->
    <?php require "./resources/components/footer/scripts.php"; ?>
</body>

</html>