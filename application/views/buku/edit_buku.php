<link href="<?=base_url()?>assets2/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets2/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets2/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<div class="box box-info">
  <div class="box-header with-border">

     <h3 class="box-title">Ubah Data Buku</h3>

  </div><!-- /.box-header -->
  <div class="box-body row">
    <?= $this->session->flashdata('gagal') ?>
    <?php
      if(isset($variable)){
          foreach($variable as $row)
          {                
    ?>
          <div class="col-md-6">      
            <form action="<?php echo site_url('Buku/ubah_data'); ?>" method="post">                  
              <table class="table">
                <tbody>
                  <tr>
                    <td> ID Buku </td>
                    <td> : </td>
                    <td><?php echo $row->id_buku; ?></td> 
                    <input type="hidden" name="id_buku" value="<?php echo $row->id_buku; ?>">
                  </tr>  
                  <tr>
                    <td> Judul Buku </td>
                    <td> : </td>
                    <td><input type="text" name="nama_buku" value="<?php echo $row->nama_buku; ?>" class="col-md-12"></td> 
                  </tr>
                  <tr>
                    <td> Penulis </td>
                    <td> : </td>
                    <td>
                      <div class="input-xlarge">
                        <div class="input-group">
                          <select multiple="multiple" class="multi-select" id="my_multi_select1" name="penulis[]">
                            <?php
                            $list_indikator = explode(',',$row->penulis);
                            foreach ($author as $key => $data) {
                              $checked = '';
                              for ($l=0; $l < count($list_indikator); $l++) {
                                if($list_indikator[$l]==$data->id){
                                  $checked = 'selected';
                                }else{
                                  echo'';
                                }
                              }
                              echo '<option value="'.$data->id.'" '.$checked.'>'.$data->nama.'</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> Call Number </td>
                    <td> : </td>
                    <td><input type="text" name="call_number" value="<?php echo $row->call_number; ?>" class="col-md-12"></td> 
                  </tr> 
                  <?php 
                  if(is_null($row->stok)){
                  ?>
                  <tr>
                    <td> Keterangan </td>
                    <td> : </td>
                    <td>Buku ini hanya ada E-book, tidak memiliki bentuk fisik. <a class="ubah_status" data-toggle="modal" title="ubah status" data-target="#myModal">Klik disini jika sudah ada buku fisiknya</a></td> 
                  </tr>
                  <?php
                  }
                  else{
                  ?> 
                  <tr>
                    <td> Stok </td>
                    <td> : </td>
                    <td><?php echo $row->stok; ?> pcs</td> 
                  </tr>
                  <tr>
                    <td> </td>
                    <td> </td>
                    <td>untuk menambahkan stok masukkan angka dibawah ini</td> 
                  </tr>
                  <tr>
                    <td> </td>
                    <td> </td>
                    <input type="hidden" name="stok" value="<?php echo $row->stok; ?>">
                    <td><input type="text" name="stok_baru" onkeyup="validAngka(this)"></td> 
                  </tr>
                  <?php } ?>
                  <tr>
                    <td> Halaman </td>
                    <td> : </td>
                    <td><input type="number" onkeyup="validAngka(this)" name="halaman" value="<?php echo $row->halaman; ?>"> halaman</td> 
                  </tr> 
                  <tr>
                    <td> Penulis </td>
                    <td> : </td>
                    <td>
                      <?php
                      $author = explode(',',$row->penulis);
                      $jumlah = count($author);
                      for ($i=0; $i < $jumlah; $i++) { 
                        $where['id'] = $author[$i];
                        $variable = $this->User_model->getSelectedData('author',$where);
                        foreach ($variable as $key => $value) {
                          echo $value->nama;
                        }
                        echo "<br>";
                      }
                      ?>    
                    </td> 
                  </tr> 
                  <tr>
                    <td> Penerbit </td>
                    <td> : </td>
                    <td><input type="text" name="penerbit" value="<?php echo $row->penerbit; ?>" class="col-md-12"></td> 
                  </tr> 
                  <tr>
                    <td> Tahun Terbit </td>
                    <td> : </td>
                    <td>
                      <select class='form-control' name="tahun_terbit" id="tahun_terbit">
                        <option value='<?php echo $row->tahun_terbit; ?>'><?php echo $row->tahun_terbit; ?></option>
                        <option value=''>--Pilih--</option>
                        <?php
                          $Y = date('Y');
                          $awal = 1980;
                          for ($i=$awal; $i <= $Y; $i++) { 
                            echo "<option value='".$i."'>".$i."</option>";
                          }
                        ?>
                      </select>
                    </td> 
                  </tr> 
                  <tr>
                    <td> Kategori </td>
                    <td> : </td>
                    <td>
                      <select class='form-control' name="kategori" id="kategori">
                        <option value='<?php echo $row->kategori; ?>'><?php echo $row->nama_kategori; ?></option>
                        <option value=''>--Pilih--</option>
                        <?php
                          $no=1;
                          foreach($data_kategori as $content)
                          {
                              foreach ($content as $key => $value ) {
                              $$key=$value;
                          }
                      ?>                                      
                      <option value="<?php echo $kode_kategori; ?>"><?php echo $nama_kategori; ?></option>
                        <?php
                      }
                        ?>
                      </select>
                    </td> 
                  </tr> 
                  <tr>
                    <td> Sinopsis </td>
                    <td> : </td>
                    <td ><textarea rows="10" style="text-align: justify;" name="sinopsis" class="col-md-12"><?php echo $row->sinopsis; ?></textarea></td> 
                  </tr> 
                                
                </tbody>
              </table>
              <div class="clearfix form-actions">
                <div class="col-md-offset-4 col-md-10">
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
              </div>
              <a href="<?php echo base_url()."Buku"; ?>" class="btn btn-default" role="button"><< Kembali</a>  
            </form>
          </div>
          <div class="col-md-6" >
              <?php
              if(empty($row->pdf)){
              ?>
              <img height="246" width="190" src="<?=base_url()?>assets/images/thin-1499_file_document_error_unavailable-512.png"><br /><br />
              <div class=" row btn-toolbar" role="toolbar" aria-label="...">           
              
                  <button class="btn btn-white btn-default btn-round">
                                <i class="ace-icon fa fa-file"></i>
                                <a data-toggle="modal" data-target="#tambah-file" >Tambah File E-book</a>
                  </button>
              </div>

              <?php
              }
              else{
              ?>
              <iframe src="<?=base_url()?>assets/document/<?=$row->pdf;?>" height="600" width="520"></iframe><br />
              <div class=" row btn-toolbar" role="toolbar" aria-label="..." style="text-align: center;">           
                
                  <button class="btn btn-white btn-default btn-round">
                                <i class="ace-icon fa fa-file"></i>
                                <a data-toggle="modal" data-target="#editt-file">Ubah File E-book</a>
                  </button>
              </div>
              <?php } ?>
                
              
          </div>
      <?php }} ?>
  </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Ubah Status</h4>
        </div>
        <!-- memulai untuk konten dinamis -->
        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="<?php echo site_url('Buku/tambah_stok'); ?>" method="post">
                              <!-- #section:elements.form -->
                                  

                                      <div class="input-group">
                                          
                                          <input type="checkbox" required>   Centang bagian ini terlebih dahulu untuk ubah status
                                          
                                          <input name="id" type="hidden" value="<?= $row->id_buku; ?>">
                                          <input name="stok_lama" type="hidden" value="0">
                                         
                                      </div>

                                  <h4>Stok</h5>

                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
                                          <input name="stok" type="text" onkeyup="validAngka(this)" maxlength="5" class="col-xs-10 col-sm-5">
                                      </div>
                                                                       
                                      <br>

                              <div class="modal-footer" style="text-align: center;">                
                                  <button class="btn btn-white btn-default btn-round" type="submit" id="submit">
                                    <i class="ace-icon fa fa-check-square-o"></i>
                                    Submit
                                  </button>

                                  &nbsp; &nbsp; &nbsp;
                                  <button class="btn btn-white btn-default btn-round" type="reset">
                                    <i class="ace-icon fa fa-undo"></i>
                                    Reset
                                  </button>
                              </div>
                            </form>
        </div>
        <!-- selesai konten dinamis -->
      </div>
    </div>
</div>
<div class="modal fade" id="tambah-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Tambah File E-book</h4>
        </div>
        <!-- memulai untuk konten dinamis -->
        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="<?php echo site_url('Buku/ubah_file'); ?>" method="post" enctype='multipart/form-data'>
                                          <input name="id" type="hidden" value="<?= $row->id_buku; ?>">
                                          <input type="hidden" name="status" value="0">
                                         
                                  <h4>File</h5>

                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                          <input name="filepdf" type="file" class="form-control" required>
                                      </div>
                                                                
                                      <br>

                              <div class="modal-footer" style="text-align: center;">                
                                  <button class="btn btn-white btn-default btn-round" type="submit" id="submit">
                                    <i class="ace-icon fa fa-check-square-o"></i>
                                    Simpan
                                  </button>

                                  &nbsp; &nbsp; &nbsp;
                                  <button class="btn btn-white btn-default btn-round" type="reset">
                                    <i class="ace-icon fa fa-undo"></i>
                                    Batal
                                  </button>
                              </div>
                            </form>
        </div>
        <!-- selesai konten dinamis -->
      </div>
    </div>
</div>
<div class="modal fade" id="editt-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Ubah File E-book</h4>
        </div>
        <!-- memulai untuk konten dinamis -->
        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="<?php echo site_url('Buku/ubah_file'); ?>" method="post" enctype='multipart/form-data'>
                                          <input name="id_pdf" type="hidden" value="<?= $row->id_pdf; ?>">
                                          <input name="id" type="hidden" value="<?= $row->id_buku; ?>">
                                          <input type="hidden" name="status" value="1">
                                         
                                  <h4>File</h5>

                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                          <input name="filepdf" type="file" class="form-control" required>
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
        </div>
        <!-- selesai konten dinamis -->
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
<script src="<?=base_url()?>assets2/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets2/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets2/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets2/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>