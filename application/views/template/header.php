<?php
if(($this->session->userdata('id'))==NULL){
	echo "<script>alert('Harap login terlebih dahulu')</script>";
	echo "<script>window.location='".base_url()."Perpustakaan/admin'</script>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Aplikasi Perpustakaan Online</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.css');?>" type="text/css" />
		<!-- page specific plugin styles -->
		<link href="<?=base_url('assets2/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url('assets/css/ace-fonts.css');?>" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url('assets/css/ace.css');?>" type="text/css" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		<link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?=base_url('assets/js/ace-extra.js');?>" type="text/javascript"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-building-o"></i>
							Perpustakaan Online
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<?php
							$get_jumlah_notif = $this->Main_model->getSelectedData('request_peminjaman  a', 'a.*', array("a.status" => '0'),'a.created_date DESC','','','a.id_anggota,a.id_buku')->result();
							?>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<?php
								if($get_jumlah_notif==NULL){
									echo'';
								}else{
									echo'<span class="badge badge-important">'.count($get_jumlah_notif).'</span>';
								}
								?>
							</a>
							<?php
							if($get_jumlah_notif==NULL){
								echo'';
							}else{
							?>
							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php
									if($get_jumlah_notif==NULL){
										echo'0 Pemberitahuan';
									}else{
										echo count($get_jumlah_notif).' Pemberitahuan';
									}
									?>
								</li>

								<li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<?php
										$get_orang_request = $this->Main_model->getSelectedData('request_peminjaman  a', 'a.*,b.nama', array("a.status" => '0'),'a.created_date DESC','','','a.id_anggota',
										array(
											'table' => 'anggota b',
											'on' => 'a.id_anggota=b.id',
											'pos' => 'LEFT',
										))->result();
										foreach ($get_orang_request as $key => $g) {
											$get_jumlah = $this->Main_model->getSelectedData('request_peminjaman  a', 'a.*', array('a.id_anggota' => $g->id_anggota,"a.status" => '0'),'a.created_date DESC','','','a.id_buku')->result();
										?>
										<li>
											<a class="detaildata" data-toggle="modal" data-target="#detaildata" id="<?= md5($g->id_anggota); ?>">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs btn-primary fa fa-user"></i>
														<?= $g->nama; ?>
													</span>
													<?php
													if((count($get_jumlah))>1){
														echo '<span class="pull-right badge badge-info">+'.count($get_jumlah).'</span>';
													}else{
														echo'';
													}
													?>
												</div>
											</a>
										</li>
										<?php } ?>
									</ul>
								</div></li>

								<li class="dropdown-footer">
									<a href="#">
										Lihat semua pemberitahuan
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
							<?php } ?>
						</li>
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">

							<?php
							$where = array(
							'id' => $this->session->userdata('id')
							);
							$query = $this->User_model->getSelectedData('users',$where);
							foreach($query as $value){
								if(!empty($value->picture_url)){
									echo '<img  class="nav-user-photo" src="'.base_url('assets/uploads/profil/').$value->picture_url.'" >';
								}
								else{
									echo '<img  class="nav-user-photo" src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" >';
								} } ?>
								<span class="user-info">
									<small>Selamat Datang,</small>
									<?php echo $this->session->userdata('username'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li> -->

								<li>
									<a href="<?php echo site_url('Admin/profil'); ?>">
										<i class="ace-icon fa fa-user"></i>
										Profil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url('Admin/logout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Keluar
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<!--<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>-->
						<!-- <img class="nav-user-photo" src="<?=base_url('assets/images/download.png');?>"/> -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo site_url('Admin'); ?>">
							<i class="menu-icon fa fa-archive"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">
								Buku
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('Buku/kategori'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Kategori Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Buku/tambah_buku'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Data Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Buku'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Buku
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text">
								Pengarang
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('Author/tambah'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Pengarang
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Author'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Pengarang
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil"></i>
							<span class="menu-text">
								Peminjaman
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('Peminjaman'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Request Peminjaman
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Peminjaman'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pinjam Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Peminjaman/laporan'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Laporan Peminjaman Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Peminjaman/syarat'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Syarat dan Ketentuan
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Anggota
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('Admin/anggota_baru'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Data Anggota
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Admin/daftar_anggota'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Anggota
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Admin/cetak_kta'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Cetak KTA
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-gear"></i>
							<span class="menu-text">
								Pengaturan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('Perpustakaan/pengaturan1'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Peminjaman Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Perpustakaan/pengaturan2'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pengaturan Background
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="<?php echo site_url('Admin/sop'); ?>">
							<i class="menu-icon fa fa-file"></i>
							<span class="menu-text"> SOP Perpustakaan </span>
						</a>

						<b class="arrow"></b>
					</li>

					<!-- <li class="">
						<a href="<?php echo site_url('Admin/struktur_organisasi'); ?>">
							<i class="menu-icon fa fa-graph"></i>
							<span class="menu-text"> Struktur Organisasi </span>
						</a>

						<b class="arrow"></b>
					</li> -->

					<li class="">
						<a href="<?php echo site_url('Buku/recycle_bin'); ?>">
							<i class="menu-icon fa fa-trash"></i>
							<span class="menu-text"> Recycle Bin </span>
						</a>

						<b class="arrow"></b>
					</li>

					<!-- <li class="">
						<a href="<?php echo site_url('Admin/panduan'); ?>">
							<i class="menu-icon fa fa-exclamation-circle"></i>
							<span class="menu-text"> Panduan Aplikasi </span>
						</a>

						<b class="arrow"></b>
					</li> -->

					<li class="">
						<a href="<?php echo site_url('Admin/log_activity'); ?>">
							<i class="menu-icon fa fa-tags"></i>
							<span class="menu-text"> Log Activity </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo site_url('Admin/tentang'); ?>">
							<i class="menu-icon fa fa-bookmark-o"></i>
							<span class="menu-text"> Tentang Aplikasi </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Panel Admin</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<!-- #section:settings.skins -->
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<!-- /section:settings.skins -->

									<!-- #section:settings.navbar -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<!-- /section:settings.navbar -->

									<!-- #section:settings.sidebar -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<!-- /section:settings.sidebar -->

									<!-- #section:settings.breadcrumbs -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<!-- /section:settings.breadcrumbs -->

									<!-- #section:settings.rtl -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<!-- /section:settings.rtl -->

									<!-- #section:settings.container -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<!-- #section:basics/sidebar.options -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>

									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
<?php } ?>


<div class="modal fade" id="detaildata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Data Detil</h4>
			</div>
			<div class="modal-body">
				<div class="box box-primary" id='formdetaildata' >
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$.ajaxSetup({
			type:"POST",
			url: "<?php echo site_url(); ?>Perpustakaan/ajax_function",
			cache: false,
		});
		$('.detaildata').click(function(){
		var id = $(this).attr("id");
		var modul = 'modul_detail_data_request_peminjaman';
		$.ajax({
			data: {id:id,modul:modul},
			success:function(data){
			$('#formdetaildata').html(data);
			$('#detaildata').modal("show");
			}
		});
		});
	});
</script>