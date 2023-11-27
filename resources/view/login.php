<!DOCTYPE html>
<html lang="pt-br">
<?php $title_page = "Iniciar sessão"; ?>
<!-- head-->
<?php require "./resources/components/header/metas.php"; ?>
<!-- /head -->

<!-- /head -->

<body id="login_bg">

	<nav id="menu" class="fake_menu"></nav>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->

	<div id="login">
		<aside>
			<figure>
				<a href="./"><img src="img/logo.png" width="149" height="42" alt=""></a>
			</figure>
			<form autocomplete="off">
				<div class="access_social">
					<a href="#0" class="social_bt facebook">Entrar com Facebook</a>
					<a href="#0" class="social_bt google">Entrar com Google</a>
					<a href="#0" class="social_bt linkedin">Entrar com Linkedin</a>
				</div>
				<div class="divider"><span>Ou</span></div>
				<div class="form-group">
					<span class="input">
						<input class="input_field" type="email" autocomplete="off" name="email">
						<label class="input_label">
							<span class="input__label-content">Nº Estudante</span>
						</label>
					</span>

					<span class="input">
						<input class="input_field" type="password" autocomplete="new-password" name="password">
						<label class="input_label">
							<span class="input__label-content">Palavra-passe</span>
						</label>
					</span>
					<small><a href="#0">Esqueceu a senha?</a></small>
				</div>
				<a href="#0" class="btn_1 rounded full-width add_top_60">Entrar</a>
				<div class="text-center add_top_10">Novo aqui? <strong><a href="./?view=cadastro">Cadastra-se</a></strong></div>
			</form>
			<div class="copy">© <?= date('Y') ?> M-TCC</div>
		</aside>
	</div>
	<!-- /login -->

	<!-- COMMON SCRIPTS -->

	<?php require "./resources/components/footer/scripts.php"; ?>

</body>

</html>