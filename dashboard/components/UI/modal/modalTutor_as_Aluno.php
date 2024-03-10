          <div class="modal fade" id="modalAssociacaoTutorAluno" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-body">
                          <div class="card">
                              <div class="card-body">
                                  <h5 class="card-title">Asocciação tutor aluno</h5>

                                  <!-- No Labels Form -->
                                  <form class="row g-4 form_modal">
                                      <div class="col-12">
                                          <div class="form-group  mb-3">
                                              <input type="tel" min="1" minlength="6" maxlength="8" class="form-control form-control-lg text-center input-search" placeholder="NÚMERO DE ESTUDANTE">
                                          </div>
                                          <div class="form-group">
                                              <input type="text" class="form-control form-control-lg campo_nome text-center" value="NOME" disabled>
                                          </div>
                                          <input type="hidden" name="id_aluno" value="" id="idEstudante">
                                          <input type="hidden" name="id_tutor" value="" id="idTutor">
                                          <input type="hidden" name="id_adm" value="<?= $id_adm ?>">

                                      </div>
                                      <div class="text-center resposta_modal"></div>
                                      <div class="text-center btn-group">
                                          <button type="submit" class="btn btn-primary w-100 btn-lg btn-submit">Associar</button>
                                      </div>
                                      <input type="hidden" name="acao" value="associar-tutor-aluno">
                                  </form><!-- End No Labels Form -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>