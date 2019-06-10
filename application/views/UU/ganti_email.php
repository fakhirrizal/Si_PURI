                    <link href="<?=base_url('assets2/pages/css/profile.min.css');?>" rel="stylesheet" type="text/css" />
                    <link href="<?=base_url('assets2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
                    <script src="<?=base_url('assets2/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
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
                                            <li >
                                                <a href="<?php echo site_url('Uu/profil'); ?>">
                                                    <i class="icon-user"></i> Pengaturan Profil </a>
                                            </li>
                                            <li >
                                                <a href="<?php echo site_url('Uu/ganti_sandi'); ?>">
                                                    <i class="icon-lock"></i> Pengaturan Kata Sandi </a>
                                            </li>
                                            <li class="active">
                                                <a href="#">
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
                                                        <a href="#tab_1_1" data-toggle="tab">Ganti Email</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                   
                                                    <!-- CHANGE EMAIL TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <br>
                                                        <form class="login-form" action="<?php echo site_url('Uu/ubah_email'); ?>" method="post">
                                                            <div class="form-group">
                                                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                                <label class="control-label">Current Email</label>
                                                                <div class="input-icon">
                                                                    
                                                                    <input value="<?php echo $value->email; ?>" class="form-control placeholder-no-fix" name="email" readonly/> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label>
                                                                <div class="input-icon">
                                                                    
                                                                    <input class="form-control placeholder-no-fix" type="password" name="pass" placeholder="Password" maxlength="20" /> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                                <label class="control-label">New Email</label>
                                                                <div class="input-icon">
                                                                   
                                                                    <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email_new" maxlength="50" /> </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn green"> Change Email </button>
                                                                <button type="reset" class="btn default"> Reset </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE EMAIL TAB -->
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
