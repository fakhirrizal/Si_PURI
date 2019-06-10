

          <?php
                if(isset($variable)){
                    foreach($variable as $row)
                    {                

          ?>

  <div class="box-header with-border">

     <h3 class="box-title">Detail Informasi</h3>

  </div><!-- /.box-header -->

  <div class="box-body row">
  <?= $this->session->flashdata('gagal') ?>
  <?= $this->session->flashdata('sukses') ?>

          

          <div class="col-md-6">      
            <form action="#" method="post">                  
                <table class="table">
                <tbody>
                <tr>
                <td> Judul UU </td>
                <td> : </td>
                <td><?php echo $row->judul_uu; ?></td> 
                </tr> 
                <tr>
                <td> Kategori Peraturan </td>
                <td> : </td>
                <td><?php echo $row->kategori; ?></td> 
                </tr> 
                <tr>
                <td> Tahun Terbit </td>
                <td> : </td>
                <td><?php echo $row->tahun_terbit; ?></td> 
                </tr> 
                <tr>
                <td> Ringkasan </td>
                <td> : </td>
                <td><?php echo $row->ringkasan; ?></td> 
                </tr>  
                
                              
                </tbody>
                </table>
                              <!-- <div class="clearfix form-actions">
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
                              </div> -->
                <a href="<?php echo base_url()."Uu/lihat_uu"; ?>" class="btn btn-default" role="button"><< Kembali</a>  
            </form>
          </div>
        

        <div class="col-md-6" style="text-align: center;">
            
             <iframe src="<?=base_url()?>assets4/file/dokumen/<?=$row->nama_file;?>" height="600" width="520"></iframe><br />
             <div class=" row btn-toolbar" role="toolbar" aria-label="..." >           
               
                <button class="btn btn-white btn-default btn-round" >
                              <i class="ace-icon fa fa-file"></i>
                              <a data-toggle="modal" data-target="#editt-file">Ubah File PDF</a>
                </button>
             </div>
            
              
             
        </div>
      

    




  </div>

  <div class="modal fade" id="editt-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Ubah File PDF</h4>
        </div>
        <!-- memulai untuk konten dinamis -->
        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="<?php echo site_url('Uu/ubah_file'); ?>" method="post" enctype='multipart/form-data'>
                                       
                                          <input name="id" type="hidden" value="<?= $row->id_uu; ?>">
                                         
                                  <h4>File</h5>

                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                          <input name="filepdf" type="file" class="form-control" required accept="application/pdf">
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
<?php }} ?>