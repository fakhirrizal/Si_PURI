    <script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
    
                        <div class="page-header">
                            <h1>
                                Anggota
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    Detail Data Anggota
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
        <?= $this->session->flashdata('sukses') ?>
        <?= $this->session->flashdata('gagal') ?>
        <?php if(isset($detail_anggota)){
        foreach($detail_anggota as $row){                            
        ?>

        <div class="col-md-6">
                <table class="table">

                <tbody>

                <tr>

                <td> No Anggota </td>

                <td> : </td>

                <td><?php echo $row->no_anggota; ?></td> 

                </tr>  

                <tr>

                <td> Nama </td>

                <td> : </td>

                <td><?php echo $row->nama; ?></td> 

                </tr>  

                <tr>

                <td> TTL </td>

                <td> : </td>

                <td><?php echo $row->tempat_lahir.", ".date('d-m-Y', strtotime($row->tanggal_lahir)); ?></td> 

                </tr>  

                <tr>

                <td> Alamat </td>

                <td> : </td>

                <td><?php echo $row->alamat; ?></td> 

                </tr>  

                <tr>

                <td> Email </td>

                <td> : </td>

                <td><?php echo $row->email; ?></td> 

                </tr>  

                <tr>

                <td> Nomor HP </td>

                <td> : </td>

                <td><?php echo $row->no_hp; ?></td> 

                </tr>  

                <tr>

                <td> Password </td>

                <td> : </td>

                <td><?php echo $row->password; ?></td> 

                </tr>  
                </tbody>

                </table>

        <a href="<?php echo site_url('Admin/daftar_anggota')?>" class="btn btn-white btn-default btn-round" role="button"><< Kembali</a>   

        </div>

        <div class="col-md-6" >
            <img height="246" width="190" src="<?=base_url()?>assets/uploads/profil/<?=$row->file_foto;?>"><br /><br /><br />
            <div class=" row btn-toolbar" role="toolbar" aria-label="...">
                <a data-toggle="modal" data-target="#editt-poto" data-id_anggota="<?php echo $row->id;?>" class="btn btn-default" style="width:190px" role="button">Ubah Foto</a>
            </div>
        </div>
      <?php }

      }

      ?>  
<div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Edit Photo User</h4>

      </div>

      <div class="modal-body">

       

        <div class="box box-primary">

            <!-- form start -->

           <form class="form-horizontal" method="post" action="<?php echo site_url('Pengguna/ubah_foto'); ?>" enctype='multipart/form-data'>

                <div class="box-body">                 

                  <input name="id" type="hidden" value="<?php echo $row->id;?>">
                  <input name="nama" type="hidden" value="<?php echo $row->nama;?>">
                <h5>Foto</h5>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>

                    <input name="MAX_FILE_SIZE" type="hidden" value="4194304" class="form-control">

                    <input name="foto" type="file" class="form-control" required>

                  </div>        

                              

                </div>

           

            <div class="box-footer">
                    <br>
                    <button type="submit" class="btn btn-primary">Ubah</button>

                    <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>-->

                    

                </div>

                 </form>

        </div>







      </div>

      

    </div>

  </div>

</div>