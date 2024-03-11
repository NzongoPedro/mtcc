<!DOCTYPE html>
<html lang="pt-br">

<?php $title_page = "Perfil"; ?>
<!-- head-->
<?php require "./resources/components/header/metas.php"; ?>
<!-- /head -->
<style>
	.mensagem {
		padding: 10px;
		margin: 5px;
		border: 1px solid #ccc;
		border-radius: 14px;
		max-width: 80%;
	}

	.aluno {
		margin-left: 50%;
	}
</style>

<body>
	<div id="page" class="theia-exception">

		<!-- heaer-->
		<?php require "./resources/components/header/navbar.php"; ?>
		<!-- /header -->
		<br>
		<main>

			<!--/hero_in-->
			<div class="container margin_60_35" id="perfil">
				<div class="row">
					<aside class="col-lg-3" id="sidebar">
						<div class="profile">
							<figure><img src="img/teacher_2_small.jpg" alt="Teacher" class="rounded-circle"></figure>
							<?php if ($id_tutor): ?>
								<ul class="social_teacher">
									<li><a href="./?view=perfil&ver-mensagens#mensagens" title="Mensagens"><i
												class="icon-chat"></i></a></li>
									<li><a href="./?view=perfil&ver-tarefas#tarefas" title="tarefas"><i
												class="icon-tasks-1"></i></a></li>
									<li><a href="./?view=perfil&enviar-tcc#tarefas" title="TCC"><i
												class="icon-attach-1"></i></a></li>
								</ul>
							<?php endif ?>
							<ul>
								<li>Nome <span class="float-right">
										<?= $estudante->nome ?>
									</span> </li>
								<li>Nº <span class="float-right">
										<?= $estudante->n_estudante ?>
									</span></li>
								<li>Curso <span class="float-right">
										<?= $estudante->curso_nome ?>
									</span></li>
								<li>Courses <span class="float-right">15</span></li>
							</ul>
						</div>
					</aside>
					<!--/aside -->



					<div class="col-lg-9" id="perfil">
						<?php

						if (isset($_GET["ver-mensagens"])): ?>
							<!-- MESNAGENS -->
							<div class="box_teacher" id="mensagens">
								<div class="indent_title_in">
									<h3>Mensagens</h3>
									<p>Mensagens de e para o seu tutor</p>
								</div>
								<hr>
								<div class="wrapper_indent">

									<div class="row">
										<div class="col">

											<div class="card">
												<div class="card-footer bg-light">
													<div class="card-body">
														<?php

														foreach ($mensagens as $mensagem) { ?>
															<div
																class="mensagem d-block alert w-50 <?= ($mensagem->autor == 'aluno') ? 'aluno alert-light' : 'alert-info'; ?>">
																<?= $mensagem->conversa ?>
															</div>

														<?php }

														?>
													</div>
													<form class="form">

														<div class="mb-3">
															<textarea class="input" name="mensagem" cols="50" rows="3"
																required></textarea>
														</div>
														<div class="text-center-resposta"></div>
														<div class="float-end mt-2 mb-3">
															<?php
															if ($id_tutor > 0): ?>

																<button type="submit" class="btn_1">Enviar</button>
															<?php endif ?>
														</div>
														<input type="hidden" name="id_aluno"
															value="<?= $estudante->idaluno ?>">
														<input type="hidden" name="id_tutor" value="<?= $id_tutor ?>">
														<input type="hidden" name="autor_mensagem" value="aluno">
														<input type="hidden" name="acao" value="enviar-mensagem">
													</form>
												</div>
											</div>

										</div>

									</div>
									<!-- End row-->
								</div>

							</div>
						<?php elseif (isset($_GET["ver-tarefas"])): ?>
							<!-- TAREFAS -->
							<div class="box_teacher" id="tarefas">
								<div class="indent_title_in">
									<h3>Tarefas</h3>
									<p>Tarefas de e para o seu tutor</p>
								</div>
								<hr>
								<div class="wrapper_indent">

									<div class="row">
										<div class="col">

											<div class="card">
												<div class="card-body bg-light">
													<div class="alert alert-primary mb-3">
														<span>Tarefa</span>
													</div>
													<div class="alert alert-primary mb-3">
														<span>Descrição</span>
													</div>

												</div>
											</div>

										</div>

									</div>
									<!-- End row-->
								</div>

							</div>
						<?php elseif (isset($_GET["enviar-tcc"])): ?>
							<!-- TCC-->
							<div class="box_teacher" id="tarefas">
								<div class="indent_title_in">
									<h3>Enviar TCC</h3>
									<p>Enviar TCC EM PDF</p>
								</div>
								<hr>
								<div class="wrapper_indent">
									<div class="row">
										<div class="col">
											<div class="card">
												<div class="card-body bg-light">
													<div class="alert alert-primary mb-3">
														<span>Tarefa</span>
													</div>
													<div class="alert alert-primary mb-3">
														<span>Descrição</span>
													</div>
												</div>
												<div class="card-footer">
													<form action="#" class="form" enctype="multipart/form-data">
														<div class="row">
															<div class="col-8">
																<div class="mb-3">
																	<label for="" class="form-label">Carrega o arquivo tcc
																		(.pdf)</label>
																	<input type="file" class="form-control form-control-lg"
																		name="arquivo-tcc" id="" placeholder=""
																		aria-describedby="fileHelpId" required />
																</div>
															</div>
															<div class="col-4">
																<div class="mt-4">
																	<button class="btn btn-lg btn-primary rounded-5"
																		type="submit">Varregar</button>
																</div>
															</div>
														</div>
														<div class="resposta text-center"></div>
														<input type="hidden" name="id_tutor" value="<?= $id_tutor ?>">
														<input type="hidden" name="id_aluno" value="<?= $id_estudante ?> ">
														<input type="hidden" name="acao" value="enviar-tcc">
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- End row-->
								</div>

							</div>
						<?php endif ?>
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</main>
		<!--/main-->
	</div>


	<!-- Optional: Place to the bottom of scripts -->
	<script>
		const myModal = new bootstrap.Modal(
			document.getElementById("modalId"),
			options,
		);
	</script>



	<!-- page -->
	<?php require "./resources/components/footer/footer.php"; ?>
	<!--/footer-->
	</div>
	<!-- page -->
	<?php require "./resources/components/footer/scripts.php"; ?>
	<script src="./js/xhttpRequest.js"></script>
</body>

</html>