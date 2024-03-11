<?php check_login_off(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php $title_page = "Defesas "; ?>
<!-- head-->
<?php require "./resources/components/header/metas.php"; ?>
<!-- /head -->

<body>

    <div id="page">

        <!-- heaer-->
        <?php require "./resources/components/header/navbar.php"; ?>
        <!-- /header -->

        <main>
            <section id="hero_in" class="cart_section">
                <div class="wrapper">
                    <div class="container">
                        <div class="bs-wizard clearfix">
                            <h1>Defesas</h1>
                        </div>
                        <!-- End bs-wizard -->
                    </div>
                </div>
            </section>
            <!--/hero_in-->

            <div class="bg_color_1">
                <div class="container margin_60_35">
                    <div class="row">
                        <div class="col-12">
                            <div class="box_cart">
                                <table class="table cart-list">
                                    <thead>
                                        <tr>
                                            <th>
                                                Estudante
                                            </th>
                                            <th>
                                                Departamento
                                            </th>
                                            <th>
                                                Tema
                                            </th>
                                            <th>
                                                Data
                                            </th>
                                            <th>Hora</th>
                                            <td>Sala</td>
                                            <th>
                                                ------
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="thumb_cart">
                                                    <img src="img/thumb_cart_1.jpg" alt="Image">
                                                </div>
                                                <span class="item_cart">Persius delenit has cu</span>
                                            </td>
                                            <td>
                                                Engenharia
                                            </td>
                                            <td>14-05-2024</td>
                                            <td>20h00</td>
                                            <td>Auditório</td>
                                            <td>
                                                <strong>Viva a vida</strong>
                                            </td>
                                            <td class="options">
                                                <a href="#"><i class="icon-eye"></i> ver detalhes</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- /cart-options -->
                            </div>
                        </div>
                        <!-- /col -->

                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
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