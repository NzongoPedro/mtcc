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
                        <div class="col-lg-9">
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
                                                -----
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
                                                0%
                                            </td>
                                            <td>
                                                <strong>24,71$</strong>
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

                        <aside class="col-lg-3" id="sidebar">
                            <div class="box_detail">
                                <div id="total_cart">
                                    Total <span class="float-right">69.00$</span>
                                </div>
                                <div class="add_bottom_30">Lorem ipsum dolor sit amet, sed vide <strong>moderatius</strong> ad. Ex eius soleat sanctus pro, enim conceptam in quo, <a href="#0">brute convenire</a> appellantur an mei.</div>
                                <a href="cart-2.html" class="btn_1 full-width">Checkout</a>
                                <a href="courses-grid-sidebar.html" class="btn_1 full-width outline"><i class="icon-right"></i> Continue Shopping</a>
                            </div>
                        </aside>
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