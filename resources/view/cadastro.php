<!DOCTYPE html>
<html lang="en">
<?php $title_page = "Criar conta "; ?>
<!-- head-->
<?php require "./resources/components/header/metas.php"; ?>
<!-- /head -->

<body id="register_bg">

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
			<form autocomplete="off" class="form">
				<div class="form-group">

					<span class="input">
						<input class="input_field" type="text" name="BI">
						<label class="input_label">
							<span class="input__label-content">Número do BI</span>
						</label>
					</span>
					<span class="input">
						<input class="input_field" type="text" name="number">
						<label class="input_label">
							<span class="input__label-content">Número de estudante</span>
						</label>
					</span>

					<span class="input">
						<input class="input_field" type="text" disabled>
						<label class="input_label">
							<span class="input__label-content">Nome completo</span>
						</label>
					</span>

					<span class="input">
						<input class="input_field" type="email">
						<label class="input_label">
							<span class="input__label-content">E-mail</span>
						</label>
					</span>

					<span class="input">
						<input class="input_field" type="password" id="password1">
						<label class="input_label">
							<span class="input__label-content">Palavra-passe</span>
						</label>
					</span>

					<span class="input">
						<input class="input_field" type="password" id="password2">
						<label class="input_label">
							<span class="input__label-content">Confirme a Palavra-passe</span>
						</label>
					</span>

					<div id="pass-info" class="clearfix"></div>
					<div class="resposta text-center"></div>

				</div>
				<button type="submit" class="btn_1 rounded full-width add_top_30">Criar conta</button>
				<div class="text-center add_top_10">Já tem uma conta? <strong><a href="login.html">Inicie sessão</a></strong></div>
				<input type="hidden" name="acao" value="cadastrar-aluno">
			</form>
			<div class="copy">© <?= date('Y') ?> M-TCC</div>
		</aside>

	</div>

	<!-- /login -->

	<!-- page -->
	<?php require "./resources/components/footer/scripts.php"; ?>

	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>
	<script src="js/xhttpRequest.js"></script>

</body>

</html>