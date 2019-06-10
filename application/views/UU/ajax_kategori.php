                            <?php
                            foreach ($data_kategori as $key => $value) {
                            ?>
                            <form class="form-horizontal" role="form" action="<?php echo site_url('Uu/update_kategori'); ?>" method="post">
                                       
                                          <input name="id" type="hidden" value="<?= $value->id; ?>">
                                         
                                  <h4>Nama Kategori</h5>

                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                          <input name="kategori" type="text" class="form-control" required value="<?= $value->kategori; ?>">
                                      </div>
                                                                       
                                      <br>

                              <div class="modal-footer" style="text-align: center;">                
                                  <button class="btn btn-white btn-default btn-round" type="submit" id="submit">
                                    <i class="ace-icon fa fa-check-square-o"></i>
                                    Ubah
                                  </button>

                                  &nbsp; &nbsp; &nbsp;
                                  <button class="btn btn-white btn-default btn-round" type="reset">
                                    <i class="ace-icon fa fa-undo"></i>
                                    Batal
                                  </button>
                              </div>
                            </form>
                            <?php } ?>
