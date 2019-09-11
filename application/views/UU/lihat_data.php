<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title> Aplkasi Perundangan </title>
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
		<!-- Bootstrap -->
		<link href="<?php echo base_url() ?>assets4/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="<?=base_url('assets4/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
		<!-- iCheck -->
		<link href="<?=base_url('assets4/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
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
					<div class="">
						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Rekap Perundangan</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<?= $this->session->flashdata('sukses') ?>
										<!--<p class="text-muted font-13 m-b-30">
										The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
										</p>-->
										<table id="datatable-buttons" class="table table-striped table-bordered" >
											<thead>
												<tr>
												<th style="text-align: center" width="5%">#</th>
												<th style="text-align: center" width="20%">Judul UU</th>
												<th style="text-align: center" width="10%">Tahun Terbit</th>
												<th style="text-align: center" width="50%">Deskripsi</th>
												<th style="text-align: center" width="15%">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no=1;
												foreach($data_uu as $db){
												?>
													<tr>
													<td style="text-align: center"><?php echo $no++."."; ?></td>
													<td><?php echo $db->judul_uu; ?></td>
													<td><?php echo $db->tahun_terbit; ?></td>
													<td><?php echo $db->ringkasan; ?></td>
													<td style="text-align: center">
													<a class="btn btn-mini" href="<?php echo site_url('Uu/detail/'.$db->id_uu)?>" title="detail data"><i class="fa fa-eye"></i></a>
													<a class="btn btn-mini" title="ubah data" href="<?php echo site_url('Uu/ubah/'.$db->id_uu)?>"><i class="fa fa-pencil"></i></a>
													<a class="btn btn-mini" href="<?php echo site_url('Uu/hapus/'.$db->id_uu)?>" title="hapus data" onclick="return confirm('Anda yakin?')"><i class="fa fa-trash"></i></a>
													</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="<?=base_url('assets4/vendors/jquery/dist/jquery.min.js');?>"></script>
		<!-- Bootstrap -->
		<script src="<?=base_url('assets4/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<!-- FastClick -->
		<script src="<?=base_url('assets4/vendors/fastclick/lib/fastclick.js');?>"></script>
		<!-- NProgress -->
		<script src="<?=base_url('assets4/vendors/nprogress/nprogress.js');?>"></script>
		<!-- iCheck -->
		<script src="<?=base_url('assets4/vendors/iCheck/icheck.min.js');?>"></script>
		<!-- Datatables -->
		<script src="<?=base_url('assets4/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/datatables.net-scroller/js/datatables.scroller.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/jszip/dist/jszip.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/pdfmake/build/pdfmake.min.js');?>"></script>
		<script src="<?=base_url('assets4/vendors/pdfmake/build/vfs_fonts.js');?>"></script>
		<!-- Custom Theme Scripts -->
		<script src="<?=base_url('assets4/build/js/custom.min.js');?>"></script>

		<!-- Datatables -->
		<script>
		$(document).ready(function() {
			var handleDataTableButtons = function() {
			if ($("#datatable-buttons").length) {
				$("#datatable-buttons").DataTable({
				dom: "Bfrtip",
				buttons: [
					{
					extend: "excel",
					className: "btn-sm"
					},
					{
					extend: "pdfHtml5",
					className: "btn-sm"
					},
					{
					extend: "print",
					className: "btn-sm"
					},
				],
				responsive: true
				});
			}
			};

			TableManageButtons = function() {
			"use strict";
			return {
				init: function() {
				handleDataTableButtons();
				}
			};
			}();

			$('#datatable').dataTable();

			$('#datatable-keytable').DataTable({
			keys: true
			});

			$('#datatable-responsive').DataTable();

			$('#datatable-scroller').DataTable({
			ajax: "js/datatables/json/scroller-demo.json",
			deferRender: true,
			scrollY: 380,
			scrollCollapse: true,
			scroller: true
			});

			$('#datatable-fixed-header').DataTable({
			fixedHeader: true
			});

			var $datatable = $('#datatable-checkbox');

			$datatable.dataTable({
			'order': [[ 1, 'asc' ]],
			'columnDefs': [
				{ orderable: false, targets: [0] }
			]
			});
			$datatable.on('draw.dt', function() {
			$('input').iCheck({
				checkboxClass: 'icheckbox_flat-green'
			});
			});

			TableManageButtons.init();
		});
		</script>
		<!-- /Datatables -->
	</body>
</html>