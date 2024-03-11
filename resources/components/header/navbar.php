<?php

use Http\Model\Alunos as Aluno;
use Http\Model\associacao;
use Http\Model\mensagens;

$estudante = Aluno::show($id_estudante);
$id_tutor = associacao::show_id_tutor($estudante->idaluno);
$mensagens = mensagens::show($id_estudante);
?>
<header class="header menu_2">
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	<div id="logo">
		<h5 class="text-light">MSTCC</h5>
	</div>
	<ul id="top_menu">
		<?php
		if (check_login_off()) {
			echo '<li><a href="./?view=login" class="login">Login</a></li>';
		}
		?>

		<li><a href="#0" class="search-overlay-menu-btn">Pesquisar</a></li>
		<li class="hidden_tablet"><a href="admission.html" class="btn_1 rounded">
				<i class="icon-library"></i>
				Biblioteca
			</a></li>
	</ul>
	<!-- /top_menu -->
	<a href="#menu" class="btn_mobile">
		<div class="hamburger hamburger--spin" id="hamburger">
			<div class="hamburger-box">
				<div class="hamburger-inner"></div>
			</div>
		</div>
	</a>
	<nav id="menu" class="main-menu">
		<ul>
			<li>
				<span><a href="./">
						<i class="icon-home"></i>
						Home-
					</a></span>
			</li>
			<li>
				<span>
					<a href="./?view=perfil&ver-mensagens#mensagens"><i class="icon-chat"></i> Chat</a>
				</span>
			</li>
			<li>
				<span><a href="./?view=perfil&ver-tarefas#tarefas"><i class="icon-tasks-1"></i> Tarefas</a></span>
			</li>
			<li><span><a href="./?view=defesas">Defesas</a></span></li>
			<li><span><a href="./?view=sobre">Sobre</a></span></li>
			<li><span><a href="#0">
						<?= explode(" ", $estudante->nome)[0] ?>
					</a>
				</span>
				<ul>
					<li><a href="./?view=perfil#perfil">Perfil</a></li>
					<li><a href="./?view=sair">sair</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="pesquisar" />
			<button type="submit"><i class="icon_search"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->
</header>
<!-- /header -->