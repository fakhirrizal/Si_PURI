<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Aplikasi Perundangan </title>
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets4/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets4/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url('assets4/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?=base_url('assets4/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url('assets4/vendors/jqvmap/dist/jqvmap.min.css');?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url('assets4/vendors/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('assets4/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- DataTables -->
    <link href="<?=base_url('assets4/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets4/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets4/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets4/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets4/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets4/build/css/custom.min.css');?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-home"></i><span> Dashboard Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                                <?php
                                $q = "SELECT * from users where id='".$this->session->userdata('iduser')."'";
                                $data = $this->User_model->manualQuery($q)->result();
                                    foreach ($data as $key => $value) {
                                        if(!empty($value->picture_url)){
                                            echo '<img src="'.base_url('assets4/file/foto/').$value->picture_url.'" class="img-circle profile_img" alt="">';
                                        }
                                        else{
                                            echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" class="img-circle profile_img" alt="">';
                                        }
                                    }
                                ?>
               
              </div>
              <div class="profile_info">
                <span>Selamat datang,</span>
                <h2>Administrator</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="<?=base_url('Uu/dashboard');?>"><i class="fa fa-home"></i> Beranda </a></li>
                  <li><a><i class="fa fa-archive"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('Uu/kategori'); ?>">Kategori</a></li>
                      <li><a href="<?php echo site_url('Uu/tambah_uu'); ?>">Tambah Peraturan</a></li>
                      <li><a href="<?php echo site_url('Uu/lihat_uu'); ?>">Lihat Daftar</a></li>
                      <li><a href="<?php echo site_url('Uu/form_import'); ?>">Import File</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gear"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('Uu/profil'); ?>">Akun</a></li>
                      <li><a href="<?php echo site_url('Uu/background'); ?>">Background</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url('Uu/bantuan'); ?>"><i class="fa fa-bell"></i> Bantuan </a></li>
                  <li><a href="<?php echo site_url('Uu/tentang'); ?>"><i class="fa fa-tag"></i> Tentang Aplikasi </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="text-align: center;">
              Copyright &copy; 2019 | Si-PURI
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php
                                $q = "SELECT * from users where id='".$this->session->userdata('iduser')."'";
                                $data = $this->User_model->manualQuery($q)->result();
                                    foreach ($data as $key => $value) {
                                        if(!empty($value->picture_url)){
                                            echo '<img src="'.base_url('assets4/file/foto/').$value->picture_url.'" alt="">'.$value->username;
                                        }
                                        else{
                                            echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" alt="">'.$value->username;
                                        }
                                    }
                                ?>
                  
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url('Uu/profil'); ?>"><i class="fa fa-user pull-right"></i> Pengaturan Akun</a></li>
                    <li><a href="<?php echo site_url('Uu/keluar'); ?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">  