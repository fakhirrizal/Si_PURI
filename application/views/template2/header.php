<?php
if($this->session->userdata('role')!='risalah'){
            echo "<script>window.location='".base_url('Risalah/admin')."'</script>";
        }
else{echo'';}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Risalah | Dashboard</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/morris/morris.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/fullcalendar/fullcalendar.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/jqvmap/jqvmap/jqvmap.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/css/components.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
		<link href="<?=base_url('assets2/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/layouts/layout/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/layouts/layout/css/themes/darkblue.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
		<link href="<?=base_url('assets2/layouts/layout/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
	</head>

	<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<div class="page-logo">
					<a href="#">
						<!-- <img src="<?=base_url()?>assets2/layouts/layout/img/logo.png" alt="logo"  /> -->
						<!-- <img src="<?=base_url('assets3/images/logo_risalah_old.png');?>" width="86" class="logo-default" alt='Pustaka'/> -->
					</a>
					<div class="menu-toggler sidebar-toggler">
						<span></span>
					</div>
				</div>
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
					<span></span>
				</a>
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
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
						<!-- <li class="dropdown dropdown-quick-sidebar-toggler">
							<a href="javascript:;" class="dropdown-toggle">
								<i class="icon-logout"></i>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<div class="page-container">
			<div class="page-sidebar-wrapper">
				<div class="page-sidebar navbar-collapse collapse">
					<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
						<li class="sidebar-toggler-wrapper hide">
							<div class="sidebar-toggler">
								<span></span>
							</div>
						</li>
						<li class="sidebar-search-wrapper">
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
				</div>
			</div>
			<div class="page-content-wrapper">
				<div class="page-content">
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