<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Risalah</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets2/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets2/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets2/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets2/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets2/global/plugins/cubeportfolio/css/cubeportfolio.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url('assets2/global/css/components.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets2/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url('assets2/pages/css/blog.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets2/pages/css/portfolio.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=base_url('assets2/layouts/layout/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets2/layouts/layout/css/themes/darkblue.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url('assets2/layouts/layout/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico"> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="#">
                        <!-- <img src="<?=base_url()?>assets2/layouts/layout/img/logo.png" alt="logo"  /> -->
                        <!-- <img src="<?=base_url('assets3/images/logo_risalah.png');?>" height="17" width="86" class="logo-default" alt='Si-PURI | Risalah'/> -->
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php
                                $q = "SELECT * from users where id='".$this->session->userdata('id_user')."'";
                                $data = $this->User_model->manualQuery($q)->result();
                                    foreach ($data as $key => $value) {
                                        if(!empty($value->picture_url)){
                                            echo '<img src="'.base_url('assets2/uploads/foto_profil/').$value->picture_url.'" class="img-circle" alt="">';
                                        }
                                        else{
                                            echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" class="img-circle" alt="">';
                                        }
                                    }
                                ?>
                                <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('uname'); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo site_url('Risalah/profil'); ?>">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo site_url('Risalah/keluar'); ?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="javascript:;" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li> -->
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Menu Utama</h3>
                        </li>
                        <!-- <li class="nav-item <?php if($active=='beranda'){echo 'start active open';}else{echo '';} ?>">
                            <a href="<?php echo site_url('Risalah/dashboard'); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Beranda</span>
                                <?php if($active=='beranda'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li> -->
                        <li class="nav-item <?php if($active=='input'){echo 'start active open';}else{echo '';} ?>">
                            <a href="<?php echo site_url('Risalah/input_risalah'); ?>" class="nav-link nav-toggle">
                                <i class="icon-pencil"></i>
                                <span class="title">Input Risalah</span>
                                <?php if($active=='input'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if($active=='daftar'){echo 'start active open';}else{echo '';} ?>">
                            <a href="<?php echo site_url('Risalah/daftar_risalah'); ?>" class="nav-link nav-toggle">
                                <i class="fa fa-book"></i>
                                <span class="title">Daftar Risalah</span>
                                <?php if($active=='daftar'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Menu Tambahan</h3>
                        </li>
                        <li class="nav-item <?php if($active=='background'){echo 'start active open';}else{echo '';} ?>">
                            <a href="<?php echo site_url('Risalah/background'); ?>" class="nav-link nav-toggle">
                                <i class="fa fa-wrench"></i>
                                <span class="title">Pengaturan Gambar</span>
                                <?php if($active=='background'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if($active=='user_guide'){echo 'start active open';}else{echo '';} ?>">
                            <a href="<?php echo site_url('Risalah/user_guide'); ?>" class="nav-link nav-toggle">
                                <i class="fa fa-external-link"></i>
                                <span class="title">User Guide</span>
                                <?php if($active=='user_guide'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if($active=='tentang'){echo 'start active open';}else{echo '';} ?>">
                            <a href="<?php echo site_url('Risalah/tentang'); ?>" class="nav-link nav-toggle">
                                <i class="fa fa-gear"></i>
                                <span class="title">Tentang Aplikasi</span>
                                <?php if($active=='tentang'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-sm">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-sm">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-sm">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Menu Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-sm">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-sm">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style </span>
                                <select class="sidebar-style-option form-control input-sm">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-sm">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Si PURI - Risalah</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Detail
                        <small>data risalah</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <?php
                    $id_audio = '';
                    $id_pdf = '';
                    $id_risalah = '';
                    ?>
                    <?= $this->session->flashdata('sukses') ?>
                    <?= $this->session->flashdata('gagal') ?>
                    <div class="portfolio-content portfolio-2">
                        <div id="js-filters-mosaic" class="cbp-l-filters-button">
                            <div data-filter=".print" class="cbp-filter-item btn green btn-outline uppercase cbp-filter-item-active"> Foto Kegiatan
                                <div class="cbp-filter-counter"></div>
                            </div>
                        </div>
                        <div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">
                            <?php
                                foreach ($gambar as $key => $value) {
                                    $no = 1;
                            ?>
                            <div class="cbp-item print">

                                <a href="<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$value->nama_file;?>" class="cbp-caption cbp-lightbox" >
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$value->nama_file;?>" alt="" style="width: 331px; left: 0px; top: 0px;"> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <!-- <div class="cbp-l-caption-title"></div> -->
                                                <!-- <div class="cbp-l-caption-desc">by Tiberiu Neamu</div> -->
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php
                                foreach ($pdf as $key => $value) {
                                    $id_pdf = $value->id;
                            ?>
                            <div style="text-align: center;">
                                <br>
                                <iframe src="<?=base_url()?>assets2/uploads/document/<?=$value->nama_file;?>" height="600" width="1075"></iframe>
                            </div>
                            <?php } ?>
                    </div>
                    <div class="blog-page blog-content-2">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="blog-single-content bordered blog-container">
                                    <?php
                                    foreach ($risalah as $key => $value) {
                                        $string = $value->tanggal_buat;
                                        $waktu = explode(" ", $string);
                                        $id_risalah = $value->id_risalah;
                                    ?>
                                    <div class="blog-single-head">
                                        <h1 class="blog-single-head-title"><?= $value->nama_acara." (".$value->nomor_risalah.")"; ?></h1>
                                        <div class="blog-single-head-date">
                                            <i class="icon-calendar font-blue"></i>
                                            <a href="javascript:;"><?= date('d-m-Y', strtotime($value->tanggal_acara)); ?></a>
                                        </div>
                                    </div>
                                    <div class="blog-single-desc" style="text-align: justify;">
                                        <p><?= $value->isi_risalah; ?></p>
                                    </div>
                                            <?php
                                            foreach ($audio as $key => $row) {
                                                $id_audio = $row->id;
                                            ?>
                                                <!-- <audio controls>
                                                <source src="<?=base_url()?>assets2/uploads/audio/<?=$row->nama_file;?>" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                                </audio>

                                                <p><strong>Note:</strong> The audio tag is not supported in Internet Explorer 8 and earlier versions.</p> -->
                                                <?= $value->link; ?>
                                            <?php } ?>
                                    <div class="blog-single-foot">
                                        <ul class="blog-post-tags">
                                            <li class="uppercase">
                                                <a href="#">Tanggal input : <?= date('d-m-Y', strtotime($waktu[0]))." jam ".$waktu[1]; ?></a>
                                            </li>
                                            <!-- <li class="uppercase">
                                                <a href="javascript:;">Sass</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="blog-single-sidebar bordered blog-container">
                                    <div class="blog-single-sidebar-search">
                                        <form action="<?php echo site_url('Risalah/cari'); ?>" method="post">
                                        <div class="input-icon right">
                                            <i class="icon-magnifier"></i>
                                            <input name="keyword" type="text" class="form-control" placeholder="Cari Risalah"> </div>
                                        </form>
                                    </div>
                                    <div class="blog-single-sidebar-links">
                                        <h3 class="blog-sidebar-title uppercase">Ubah Data</h3>
                                        <ul>
                                            <!-- <li>
                                                <a href="javascript:;" data-toggle="modal" data-target="#edit-audio">Audio</a>
                                            </li> -->
                                            <li>
                                                <a href="javascript:;" data-toggle="modal" data-target="#edit-doc">PDF</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="blog-single-sidebar-recent">
                                        <ul>
                                            <?php
                                                $no = 1;
                                                foreach ($gambar as $key => $value) {
                                            ?>
                                            <li>
                                                <a data-toggle="modal" data-target="#edit-foto-<?= $value->id; ?>">Foto <?= $no++; ?></a>
                                            </li>
                                            <?php } ?>
                                            <li>
                                                <a data-toggle="modal" data-target="#tambah-foto">Tambah Foto</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="blog-single-sidebar-tags">
                                        <h3 class="blog-sidebar-title uppercase">Risalah Terkait</h3>
                                        <ul class="blog-post-tags">
                                            <?php
                                                foreach ($risalah_lain as $key => $value) {
                                            ?>
                                            <li class="uppercase">
                                                <a href="<?php echo site_url('Risalah/detail/'.$value->id_risalah)?>"><?= $value->nomor_risalah; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit-audio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <h4 class="modal-title" id="myModalLabel">Ubah File Audio</h4>

                            </div>

                            <div class="modal-body">
                            <div class="box box-primary">

                                <!-- form start -->

                                <form class="form-horizontal" method="post" action="<?php echo site_url('Risalah/ubah_audio'); ?>" enctype='multipart/form-data'>

                                    <div class="box-body">

                                        <input name="id" type="hidden" value="<?php echo $id_audio;?>">
                                        <input name="id_risalah" type="hidden" value="<?php echo $id_risalah;?>">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-bullhorn"></i></span>
                                        <input name="MAX_FILE_SIZE" type="hidden" value="10485760" class="form-control">
                                        <input name="audio" type="file" accept="audio/*" class="form-control">
                                        </div>
                                        <p><strong>Catatan:</strong></p>
                                        <p>File maksimum: 8Mb.</p>
                                        <p>Ekstensi file yang diijinkan: .mp3.</p>
                                    </div>

                                    <br/>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                        <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>-->
                                    </div>

                                </form>

                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit-doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                            <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title" id="myModalLabel">Ubah Dokumen Risalah</h4>

                            </div>

                            <div class="modal-body">
                            <div class="box box-primary">

                                <!-- form start -->

                                <form class="form-horizontal" method="post" action="<?php echo site_url('Risalah/ubah_dokumen'); ?>" enctype='multipart/form-data'>

                                    <div class="box-body">

                                        <input name="id" type="hidden" value="<?php echo $id_pdf;?>">
                                        <input name="id_risalah" type="hidden" value="<?php echo $id_risalah;?>">
                                        <div class="input-group">

                                        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>

                                        <input name="MAX_FILE_SIZE" type="hidden" value="10485760" class="form-control">

                                        <input name="dokumen" type="file" accept="application/pdf" class="form-control">
                                        </div>
                                        <p><strong>Catatan:</strong></p>
                                        <p>File maksimum: 8Mb.</p>
                                        <p>Ekstensi file yang diijinkan: .pdf.</p>
                                    </div>

                                    <br/>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                        <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>-->
                                    </div>

                                </form>

                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tambah-foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah File Foto</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box box-primary">
                                        <form class="form-horizontal" method="post" action="<?php echo site_url('Risalah/tambah_foto_kegiatan'); ?>" enctype='multipart/form-data'>
                                            <div class="box-body">
                                                <input name="id_risalah" type="hidden" value="<?php echo $id_risalah;?>">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                    <input name="MAX_FILE_SIZE" type="hidden" value="10485760" class="form-control">
                                                    <input name="foto" type="file" accept="image/*" class="form-control">
                                                </div>
                                                    <p><strong>Catatan:</strong></p>
                                                    <p>File maksimum: 8Mb.</p>
                                                    <p>Ekstensi file yang diijinkan: .png/ .jpg/ .jpeg/ .bmp.</p>
                                                </div>
                                                <br/>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <?php
                        foreach ($gambar as $key => $value) {
                    ?>
                    <div class="modal fade" id="edit-foto-<?= $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title" id="myModalLabel">Ubah Foto Produk</h4>

                                </div>

                                <div class="modal-body">
                                    <div class="box box-primary">

                                        <!-- form start -->

                                        <form class="form-horizontal" method="post" action="<?php echo site_url('Risalah/ubah_foto_kegiatan'); ?>" enctype='multipart/form-data'>
                                            <div style='text-align: center'>
                                            <img src="<?=base_url()?>assets2/uploads/foto_kegiatan/<?=$value->nama_file;?>" alt="" style="width: 331px;">
                                            </div>
                                            <div class="box-body">
                                            <input name="id" type="hidden" value="<?php echo $value->id;?>">
                                            <input name="id_risalah" type="hidden" value="<?php echo $id_risalah;?>">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                <input name="MAX_FILE_SIZE" type="hidden" value="10485760" class="form-control">
                                                <input name="foto" type="file" accept="image/*" class="form-control">
                                            </div>
                                                <p><strong>Catatan:</strong></p>
                                                <p>File maksimum: 8Mb.</p>
                                                <p>Ekstensi file yang diijinkan: .png/ .jpg/ .jpeg/ .bmp.</p>
                                            </div>

                                            <br/>

                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                                <a onclick="return confirm('Anda yakin?')" href='<?= site_url('Risalah/hapus_foto_kegiatan/'.$id_risalah.'/'.$value->id) ?>' class="btn btn-danger">Hapus Foto Kegiatan <i class="fa fa-trash"></i></a>
                                                <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>-->
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> &copy; Metronic by keenthemes - Si PURI.
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

        <script src="<?=base_url('assets2/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url('assets2/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js');?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url('assets2/global/scripts/app.min.js');?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url('assets2/pages/scripts/portfolio-2.min.js');?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=base_url('assets2/layouts/layout/scripts/layout.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/layouts/layout/scripts/demo.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>