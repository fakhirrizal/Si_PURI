                    <link href="<?=base_url('assets2/pages/css/profile.min.css');?>" rel="stylesheet" type="text/css" />
                    <link href="<?=base_url('assets2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
                    <script src="<?=base_url('assets2/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
                    <?php foreach ($data_profil as $key => $value) {?>
                    
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Pengguna
                        <small>profil pengguna</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                    <?php
                                        if(empty($value->picture_url)){
                                            echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" class="img-responsive" alt="">';
                                        }
                                        else{
                                            echo '<img src="'.base_url('assets4/file/foto/').$value->picture_url.'" class="img-responsive" alt="">';
                                        }
                                    ?>
                                        
                                    </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php echo $value->nama_lengkap; ?> </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="#">
                                                    <i class="icon-user"></i> Pengaturan Profil </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('Uu/ganti_sandi'); ?>">
                                                    <i class="icon-lock"></i> Pengaturan Kata Sandi </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('Uu/ganti_email'); ?>">
                                                    <i class="icon-envelope"></i> Pengaturan Email </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                                <!-- END PORTLET MAIN -->
                                
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <h4><?= $this->session->flashdata('sukses') ?></h4>
                                                <h4><?= $this->session->flashdata('gagal') ?></h4>
                                               
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Ganti Foto Profil</a>
                                                    </li>
                                                  
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <br>
                                                        <form role="form" action="<?php echo site_url('Uu/ubah_profil'); ?>" method="post">
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label">Nama</label>
                                                                <div class="input-icon">
                                                                
                                                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $value->nama_lengkap; ?>" placeholder="Masukkan nama Anda sesuai KTP" required/> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Tempat Lahir</label>
                                                                <div class="input-icon">
                                                                
                                                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $value->tempat_lahir; ?>" placeholder="Masukkan nama daerah tempat lahir Anda" maxlength="50" required/> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Tanggal Lahir</label>
                                                                <div class="input-icon">
                                                            
                                                                <input type="date" class="form-control" value="<?php echo $value->tanggal_lahir; ?>" name="tanggal_lahir" required/> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Nomor Telpon</label>
                                                                <div class="input-icon">
                                                            
                                                                <input type="text" placeholder="+1 646 580" name="no_hp" class="form-control" value="<?php echo $value->no_hp; ?>" required/> </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label">Alamat Rumah</label>
                                                                <div class="input-icon">
                                                              
                                                                <input type="text" placeholder="Isi alamat sesuai KTP Anda" value="<?php echo $value->alamat; ?>" name="alamat" maxlength="100" class="form-control" required/> </div>
                                                            </div>
                                                           
                                                            
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn green"> Simpan </button>
                                                                <button type="reset" class="btn default"> Batal </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                                        
                                                        <form action="<?php echo site_url('Uu/ubah_foto'); ?>" role="form" enctype='multipart/form-data' method="post">
                                                            <div class="x_content">
                                                              <ul class="list-unstyled timeline">
                                                                <li>
                                                                  <div class="block">
                                                                    <div class="tags">
                                                                      <a href="" class="tag">
                                                                        <span>File Foto</span>
                                                                      </a>
                                                                    </div>
                                                                    <div class="block_content">
                                                                      <h2 class="title">
                                                                                      <a>Catatan</a>
                                                                                  </h2>
                                                                      <div class="byline">
                                                                        <span>Ekstensi yang diijinkan</span> <a>jpg, png, jpeg, dan bmp</a><br>
                                                                        <span>Ukuran maksimal file</span> <a>3MB</a>
                                                                      </div>
                                                                      <input type="file" name="foto" accept="image/*" required>
                                                                    </div>
                                                                  </div>
                                                                </li>
                                                               
                                                              </ul>

                                                            </div>
                                                             
                                                              <br>
                                                              <div class="form-group">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                  <button type="submit" class="btn green">Simpan</button>
                                                                  <button type="reset" class="btn default">Batal</button>
                                                                  
                                                                </div>
                                                              </div>
                                                         
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    <?php } ?>

<script language='javascript'>
                    function validAngka(a)
                    {
                        if(!/^[0-9]+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script> 
