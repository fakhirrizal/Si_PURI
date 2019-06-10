            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Input <small>tambah data perundangan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <h5><?= $this->session->flashdata('gagal') ?></h5>
                    <form class="form-horizontal form-label-left" enctype='multipart/form-data' method="post" action="<?php echo site_url('Uu/simpan_data'); ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Peraturan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="judul" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Peraturan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required name="kategori" class="form-control col-md-7 col-xs-12">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($kategori as $key => $value) {
                              echo "<option value='".$value->id_kategori."'>".$value->kategori."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Terbit 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tahun" onkeyup="validAngka(this)" maxlength="4" minlength="4" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ringkasan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       
                          <textarea name="ringkasan" class="form-control col-md-7 col-xs-12" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="file" accept="application/pdf" required class="buttonFinish buttonDisabled btn btn-default">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
<script language='javascript'>
                    function validAngka(a)
                    {
                        if(!/^[0-9]+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script>