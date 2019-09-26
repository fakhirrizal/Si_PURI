<?php
if($this->session->userdata('role')!='perpus'){
	echo "<script>window.location='".base_url('Perpustakaan/admin')."'</script>";
}
else{echo'';}
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
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.css');?>" type="text/css" />
		<!-- page specific plugin styles -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/datatables/dataTables.bootstrap.css');?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/datatables/jquery.dataTables.css');?>">
		<link href="<?=base_url()?>assets2/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets2/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets2/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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

	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.css">

	  	<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>

	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.js"></script>
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
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
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
									}
								} ?>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('username'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="<?php echo site_url('Admin/profil'); ?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url('Admin/logout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
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
						<img class="nav-user-photo" src="<?=base_url('assets/images/download.png');?>"/>
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
								Author
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('Author/tambah'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Tambah Author
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url('Author'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Author
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
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Sub Menu 1
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Sub Menu 2
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Sub Menu 3
								</a>

								<b class="arrow"></b>
							</li>							
						</ul>
					</li>

					<li class="">
						<a href="<?php echo site_url('Buku/recycle_bin'); ?>">
							<i class="menu-icon fa fa-trash"></i>
							<span class="menu-text"> Recycle Bin </span>
						</a>

						<b class="arrow"></b>
					</li>

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
					<div>				
					<h1>
						Buku
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Tambah Data Buku
						</small>											
					</h1>
				</div><!-- /.page-header -->

				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<div class="col-sm-12">
							<!-- #section:elements.tab -->
							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#baru">
											<i class="green ace-icon fa fa-plus"></i>
												Buku Baru
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#lama">
											Buku Lama
											<i class="green ace-icon fa fa-refresh"></i>
										</a>
									</li>
								</ul>

								<div class="tab-content">
									<div id="baru" class="tab-pane fade in active">
										<div class="alert alert-block alert-success">
											Catatan
											<br/>
											<strong class="red">* </strong>Ukuran maksimal file buku/dokumen adalah 10MB
											<br/>
											<strong class="blue">* </strong>Ekstensi dokumen yang diizinkan adalah .pdf
											<br/>
											<strong class="black">* </strong>Format gambar yang diizinkan adalah gif, jpg, png, jpeg, dan bmp
											<br/>
											<strong class="green">
											*
											</strong>
											Jika dokumen/buku yang diterbitkan di beberapa edisi maka penulisannya sebagai berikut "Judul Buku (Edisi Kesekian)"
										</div>
											<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/simpan_buku'); ?>" method="post" enctype='multipart/form-data'>
												<!-- #section:elements.form -->
												<h4>Kategori</h4>
												<div class="input-xlarge">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-book"></i></span>
														<select class='form-control' name="kategori" id="kategori">
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
													</div>
												</div>

												<h4>Penulis</h4>
												<div class="input-xlarge">
													<div class="input-group">
														<select multiple="multiple" class="multi-select" id="my_multi_select1" name="penulis[]">
															<?php
															foreach ($author as $key => $data) {
																echo '<option value="'.$data->id.'">'.$data->nama.'</option>';
															}
															?>
														</select>
													</div>
												</div>

												<!-- <h4>Penulis</h4>
												
												<div class="input-group col-xs-5">
												
													<select id="tokens" class="selectpicker form-control" multiple data-live-search="true" name="penulis[]">
														<?php
														foreach ($author as $key => $data) {
															echo '<option value="'.$data->id.'">'.$data->nama.'</option>';
														}
														?>
													</select>
												</div> -->
												<br>
																																						
												<h4>Judul Buku</h4>

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
													<input name="nama_buku" type="text" class="col-xs-10 col-sm-5" required>
												</div>

												<h4>Call Number<strong class="green"> *</strong></h4>

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
													<input name="call_number" type="text" class="col-xs-10 col-sm-5" required>
												</div>

												<h4>Jumlah Halaman</h4>

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
													<input name="halaman" type="text" onkeyup="validAngka(this)" maxlength="50" class="col-xs-10 col-sm-5" required>
												</div>
												
												<h4>Penerbit</h4>

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
													<input name="penerbit" type="text" maxlength="50" class="col-xs-10 col-sm-5" required>
												</div>

												<h4>Tahun Terbit</h4>
												<div class="input-xlarge">
													<div class="input-group">
														<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
														<select class='form-control' name="tahun_terbit" id="tahun_terbit">
															<option value=''>--Pilih--</option>
															<?php
																$Y = date('Y');
																$awal = 1980;
																for ($i=$awal; $i <= $Y; $i++) { 
																	echo "<option value='".$i."'>".$i."</option>";
																}
															?>
														</select>
													</div>
												</div>

												<h4>Sinopsis</h4>

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
													<textarea name="sinopsis" type="text" class="col-xs-10 col-sm-5" required></textarea>
												</div>
												
												<h4>File Buku/Dokumen <strong class="red">*</strong><strong class="blue"> *</strong></h4> 

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
													<input name="file_dokumen" type="file" class="form-control">
												</div>

												<h4>Gambar Cover Depan <strong class="red">*</strong><strong class="black"> *</strong></h4> 

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
													<input name="file_cover" type="file" class="form-control">
												</div>
												<br>
												<div class="input-group">
													<label>
														<input name="switch-field-1" class="ace ace-switch ace-switch-6" onclick="enable_text(this.checked)" type="checkbox" checked>
														<span class="lbl">&nbsp;Jika tidak ada bentuk fisiknya silahkan hilangkan centang bagian ini</span>
													</label>
												</div>
											
												<h4>Stok</h4>

												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
													<input name="stok" id="stok" type="text" onkeyup="validAngka(this)" maxlength="5" class="col-xs-10 col-sm-5">
												</div>

												<div class="clearfix form-actions">
													<div class="col-md-offset-4 col-md-10">
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
												</div>
											</form>
									</div>
									<div id="lama" class="tab-pane fade">
										<div class="alert alert-block alert-success">
											Catatan
											<br/>
											<strong class="red">* </strong>Buku yang bisa ditambahkan hanya yang mempunyai bentuk fisik
										</div>
										<form class="form-horizontal form-label-left" method="post" action="<?php echo site_url('Buku/tambah_stok'); ?>">
											<div class="form-group">
												<label class="control-label col-xs-2">Kategori Buku</label>
												<div class="col-md-9 col-sm-9 col-xs-12">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-book"></i></span>
														<select class="form-control" id="kategori_buku" name="kategori_buku">
														<option value="">Pilih Kategori</option>
														<?php
														foreach ($data_kategori as $key => $value) {
														?>
														<option value="<?php echo $value->kode_kategori ?>"><?php echo $value->nama_kategori ?></option>
														<?php                              
														}
														?>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group" >
												<label class="control-label col-xs-2">Nama Buku</label>
												<div class="col-md-9 col-sm-9 col-xs-12">
													<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-book"></i></span>
													<select class="form-control" id="buku" name="buku">
														<option>--Pilih Buku--</option>
													</select>
													</div>
												</div>
											</div> 
											<div id="detail">
												<div class="form-group">
													<label class="control-label col-xs-2"></label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<div class="input-group">
														<ul class="list-unstyled">
																<li>
																	<i class="ace-icon fa fa-caret-right blue"></i>
																	Stok :
																</li>
														</ul> 
														</div>
													</div>
												</div>  
											</div>
																	
											<div class="ln_solid"></div>
													
											<div class="form-group" >
														<label class="control-label col-xs-2"></label>
														<div class="col-md-9 col-sm-9 col-xs-12">
														<button class="btn btn-white btn-default btn-round">
																<i class="ace-icon fa fa-plus"></i>
																<a type="submit" id="submit">Tambah</a>
														</button>
														&nbsp; &nbsp; &nbsp;
																									<button class="btn btn-white btn-default btn-round" type="reset">
																										<i class="ace-icon fa fa-undo"></i>
																										Reset
																									</button>
														</div>
											</div> 
										</form>
									</div>
								</div>
							</div>
							<!-- /section:elements.tab -->
						</div><!-- /.col -->
					</div>
				</div><!-- /.main-content -->
			</div><!-- /.page-content -->
		</div>
	</div>
		<div class="footer">
			<div class="footer-inner">
				<!-- #section:basics/footer -->
				<div class="footer-content">
					<span class="bigger-120">
						Perpustakaan
						<span class="blue bolder">Online</span>
						&copy; 2019
					</span>

					&nbsp; &nbsp;
					<span class="action-buttons">
						<a href="#">
							<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
						</a>
					</span>
				</div>

				<!-- /section:basics/footer -->
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		</div>
		<script src="<?=base_url()?>assets2/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets2/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
		<script src="<?=base_url()?>assets2/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.scroller.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.colorpicker.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.fileinput.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.typeahead.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.wysiwyg.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.spinner.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.treeview.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.wizard.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.aside.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.ajax-content.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.touch-drag.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.sidebar.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.sidebar-scroll-1.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.submenu-hover.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.widget-box.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.settings.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.settings-rtl.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.settings-skin.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.widget-on-reload.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.searchbox-autocomplete.js');?>" type="text/javascript"></script>
		<script src="<?=base_url()?>assets2/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
		<!-- inline scripts related to this page -->	
	
		<script type="text/javascript">
			$("input:checkbox").click(function() {
				$("#stok").attr("disabled", !this.checked); 
			});
		</script>

		<script language='javascript'>
							function validAngka(a)
							{
								if(!/^[0-9]+$/.test(a.value))
								{
								a.value = a.value.substring(0,a.value.length-1000);
								}
							}
		</script>    

		<script language='javascript'>
							function validHuruf(a)
							{
								if(!/^[a-z, A-Z.']+$/.test(a.value))
								{
								a.value = a.value.substring(0,a.value.length-1000);
								}
							}
		</script>

		<script type="text/javascript">
			$(function () {
				$("#submit").click(function () {
					var kategori = $("#kategori");
					if (kategori.val() == "") {
						//If the "Please Select" option is selected display error.
						alert("Harap pilih kategori!");
						return false;
					}
					return true;
				});
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#kategori_buku").change(function(){
					var kategori = $("#kategori_buku").val();
					var modul = 'kategori';
					$.ajax({
						type: "POST",
						url : "<?php echo base_url('Buku/ambil_data'); ?>",
						data: { id:kategori, modul:modul },
						cache:false,
						success: function(data){
							$('#buku').html(data);
							document.frm.add.disabled=false;
						}
					});
				});

				$("#buku").change(function(){
					var buku = $("#buku").val();
					var modul = 'buku';
					$.ajax({
						type: "POST",
						url : "<?php echo base_url('Buku/ambil_data'); ?>",
						data: { id:buku, modul:modul },
						cache:false,
						success: function(data){
							$('#detail').html(data);
						}
					});
				});

			})
			
		</script>
		<script>
		$(document).ready(function () {
			var mySelect = $('#first-disabled2');

			$('#special').on('click', function () {
			mySelect.find('option:selected').prop('disabled', true);
			mySelect.selectpicker('refresh');
			});

			$('#special2').on('click', function () {
			mySelect.find('option:disabled').prop('disabled', false);
			mySelect.selectpicker('refresh');
			});

			$('#basic2').selectpicker({
			liveSearch: true,
			maxOptions: 1
			});
		});
		</script>		
	</body>
</html>