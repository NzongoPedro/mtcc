          <div class="modal fade" id="modalNovoUsuario" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-body">
                          <div class="card">
                              <div class="card-body">
                                  <h5 class="card-title">Cadastrar Professor/Tutor</h5>

                                  <!-- No Labels Form -->
                                  <form class="row g-3 form">
                                      <div class="col-md-12">
                                          <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required>
                                      </div>
                                      <div class="col-12">
                                          <input type="email" class="form-control" name="email" placeholder="Email" required>
                                      </div>
                                      <div class="col-12">
                                          <input type="tel" class="form-control" name="telefone" placeholder="Telefone" required>
                                      </div>

                                      <div class="col-12">
                                          <select id="inputState" class="form-select" name="grau" required>
                                              <option selected value="0">Grau do docente</option>
                                              <?php
                                                foreach ($niveis_acesso_docente as $nivel) {
                                                    print '<option value="' . $nivel->iddocente_nivel . '">' . $nivel->nivel . '</option>';
                                                }

                                                ?>
                                          </select>
                                      </div>
                                      <div class="text-center resposta"></div>
                                      <div class="text-center">
                                          <button type="submit" class="btn btn-primary">Cadastrar</button>
                                          <button type="reset" class="btn btn-secondary">Limpar campos</button>
                                      </div>
                                      <input type="hidden" name="acao" value="cadastrar-tutor">
                                  </form><!-- End No Labels Form -->

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>