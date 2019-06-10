           <script src="<?=base_url('assets4/vendors/jquery/dist/jquery.min.js');?>"></script>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data <small>kategori peraturan</small></h2>
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
                  
                </div>
              </div>
            </div>
            <div class="x_content">
              
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <h5><?= $this->session->flashdata('gagal') ?></h5>
                      <h5><?= $this->session->flashdata('sukses') ?></h5>
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Daftar Kategori</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Tambah Kategori</a>
                        </li>
                       
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div style="text-align: center;">
                          <table id="tabel1" class="table table-bordered table-striped" >
                          <thead>
                                  <tr>
                                    <th width="6%" style="text-align: center;">#</th>
                                    <th style="text-align: center;">Nama Kategori</th>
                                    <th width="12%" style="text-align: center;">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>

                                <?php

                                      $no=1;

                                      if(isset($kategori)){

                                      foreach($kategori as $row){

                                  ?>

                                  <tr>
                                    <td style="text-align: center;"><?= $no++."."; ?></td>
                                    <td><?php echo $row->kategori; ?></td>
                                    <td style="text-align: center;">
                                               
                                                <a data-toggle="modal" title="ubah data" class="view_data" data-target="#myModal" id="<?php echo $row->id_kategori; ?>" role="button"><i class="fa fa-pencil"></i></a>&nbsp; &nbsp;
                                                <a href="<?php echo site_url('Uu/hapus_kategori/'.$row->id_kategori)?>" title="hapus data" onclick="return confirm('Anda yakin?')" role="button"><i class="fa fa-trash"></i></a>
                                                
                                    </td>
                                  </tr>
                                         
                                      <?php }} ?>                                                                  
                              </tbody>
                          </table>
                          </div>
                          <script>
                            $(function () {
                              $("#tabel1").DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false
                              });
                            });
                          </script>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="x_content">
                            <br>
                            
                            <form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('Uu/simpan_kategori'); ?>">

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kategori 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="kategori" required="required" maxlength="100" class="form-control col-md-7 col-xs-12">
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

                  </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- memulai untuk konten dinamis -->
        <div class="modal-body" id="data_kategori" style="text-align: center;">
        </div>
        <!-- selesai konten dinamis -->
      </div>
    </div>
</div>
<script>
  // ini menyiapkan dokumen agar siap grak :)
  $(document).ready(function(){
    // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
    $('.view_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: '<?php echo base_url(); ?>Uu/tampil_ajax',
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_kategori').html(data); 
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
  });
  </script>