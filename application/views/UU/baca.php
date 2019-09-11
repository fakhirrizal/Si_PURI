<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Perundangan</title>
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">

		<link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />

		<link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
	</head>
	<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

		<!--
			Content Start
			Wrapper ini digunakan untuk halaman single
		-->
		<div id='small-content' class='content-lain'>
			<!-- Header Top Start -->
			<header class='header-top' style='background-image:url("<?=base_url()?>assets3/images/gambar2.jpg")'>
				<div class='header-inner'>
					<div class='container'>
						<!-- Nav Top Start -->
						<nav class='nav-top'>
							<div class='row'>
								<div class='u-pull-left'>
									<div id='nav-title'>
										<img src="<?=base_url('assets3/images/logo_uu.png');?>" alt='Si-PURI | Perundangan'/>
										<!-- <img src="<?=base_url('assets3/images/logo_perundangan.png');?>" class='image-white' alt='Si-PURI | Perundangan'/> -->
									</div>
								</div>
								<div class='u-pull-right'>
									<!-- <div id='nav-account'>
										<div class='prof'>
											<img src='images/profile_picture_square.jpg'/>
											<label>mnovalbs</label>
											<i class='ion-ios-arrow-down'></i>
										</div>
										<ul class='nav-account-menus'>
											<li><a href='profile'><i class='ion-person'></i> Profil</a></li>
											<li><a href='profile/email.html'><i class='ion-email'></i> Email</a></li>
											<li><a href='profile/password.html'><i class='ion-locked'></i> Password</a></li>
											<li><a href='profile/about.html'><i class='ion-information'></i> Tentang</a></li>
											<li><a href='login.html'><i class='ion-log-out'></i> Logout</a></li>
										</ul>
									</div> -->
									<!-- <div id='nav-link'>
										<a href='login.html'><i class='ion-log-in'></i> Login</a>
									</div> -->
									<div id='nav-lang'>
										<a href='#!' title='Ubah ke Bahasa'>
											<img alt='Ubah ke Bahasa' src="<?=base_url('assets3/images/flag_id_square_small.jpg');?>"/>
										</a>
										<a href='#!' title='Change to English'>
											<img alt='Change to English' src="<?=base_url('assets3/images/flag_en_square_small.jpg');?>"/>
										</a>
									</div>
								</div>
							</div>
						</nav>
						<!-- Nav Top End -->
						<!-- Page Title Start -->
						<div id='page-title'>
							<?php
								foreach ($uu as $key => $row) { ?>
								<h2><?= $row->judul_uu; ?></h2>
							<?php } ?>
						<!--  <h2>Book : Harry Potter and The Orders the Phoenyx</h2> -->
						</div>
						<!-- Page Title End -->
					</div>
				</div>
			</header>
			<!-- Header Top End -->
			<!-- Content Start -->
			<div id='content'>
				<!-- Tab Menus Start -->
				<div id='tab-menu'>
					<a href='#dokter' class='active'>Informasi Dokumen</a>
					<!-- <a href='#sinopsis'>Sinopsis</a>
					<a href='#infodok'>Info Dokumen</a> -->
				</div>
				<!-- Tab Menus End -->
				<!-- Tab Content Start -->
				<div id='tab-content'>
					<div class='container'>
						<div id='dokter' class='tab-content active'>
							<div class='u-pull-left half iframe'>
								<div id='iframe-dokumen'>
									<div class='dokumen-fullscreen-button' onclick='fullDocument(this)'><i class='ion-arrow-expand'></i></div>
									<div>
									<?php
									foreach ($uu as $key => $row) { ?>
										<iframe src="<?=base_url()?>assets4/file/dokumen/<?=$row->nama_file;?>" class='dokumen'></iframe>
									<?php } ?>
									</div>
								</div>
							</div>
							<div class='u-pull-right half'>
								<div class='info-dokumen'>
									<?php
									foreach ($uu as $key => $row) {
										echo '<b>Judul peraturan : </b>'.$row->judul_uu;
										echo '<br>';
										echo '<b>Kategori peraturan : </b>'.$row->kategori;
										echo '<br>';
										echo '<b>Tahun terbit : </b>'.$row->tahun_terbit;
										echo '<br>';
										echo '<b>Ringkasan : </b>'.$row->ringkasan;
									}
									?>
								</div>
								<div class='dokumen-lain'>
									<h3>Dokumen Lain</h3>
									<div class='rowz'>
										<?php
										foreach ($dokumen_lain as $key => $value) {
										?>
										<div class='six-columns'>
											<a class='result-box' href="<?php echo site_url('Uu/baca/'.$value->id_uu)?>">
												<div class='result-image-wrapper'>
													<div class='result-image' style='background-image: url("<?=base_url()?>assets4/images/paperclip.png")'></div>
												</div>
												<div class='result-detail'>
													<h3><?php echo $value->judul_uu; ?></h3>
												</div>
											</a>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<!-- <div id='sinopsis' class='tab-content'>
							<div class='tab-inner'>
								<h3>Sinopsis</h3>
								<p>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquam pariatur at sit omnis illum saepe harum ipsa nisi corporis eaque, alias esse molestias reprehenderit vero magni vitae aliquid temporibus?
								</p>
							</div>
						</div>
						<div id='infodok' class='tab-content'>
							<div class='tab-inner'>
								<h3>Info Dokumen</h3>
								<p>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquam pariatur at sit omnis illum saepe harum ipsa nisi corporis eaque, alias esse molestias reprehenderit vero magni vitae aliquid temporibus?
								</p>
							</div>
						</div> -->
					</div>

				</div>
				<!-- Tab Content End -->
				<!-- Button Kembali Start -->
				<div class='back-button'>
					<a href="<?php echo site_url('Uu/')?>"><i class='ion-android-search'></i> Kembali ke Pencarian</a>
				</div>
				<!-- Button Kembali End -->
			</div>
			<!-- Content End -->
			<!-- Footer Start -->
			<footer>
					<div class='container'>
						<div class='u-pull-left'>
							Copyright &copy; 2019 | Si-PURI
						</div>
						<a href='<?= base_url(); ?>' class='footer-logo'>
							<img src="<?=base_url('assets3/images/logo_puri.png');?>"/>
						</a>
						<div class='u-pull-right' id="clock">
						</div>
						<div class='u-pull-right'>
							<?php
							$hari = date('l');
							if ($hari=="Sunday") {
							echo "Minggu";
							}elseif ($hari=="Monday") {
							echo "Senin";
							}elseif ($hari=="Tuesday") {
							echo "Selasa";
							}elseif ($hari=="Wednesday") {
							echo "Rabu";
							}elseif ($hari=="Thursday") {
							echo("Kamis");
							}elseif ($hari=="Friday") {
							echo "Jum'at";
							}elseif ($hari=="Saturday") {
							echo "Sabtu";
							}
							?>,
							<?php
							$tgl =date('d');
							echo $tgl;
							$bulan =date('F');
							if ($bulan=="January") {
							echo " Januari ";
							}elseif ($bulan=="February") {
							echo " Februari ";
							}elseif ($bulan=="March") {
							echo " Maret ";
							}elseif ($bulan=="April") {
							echo " April ";
							}elseif ($bulan=="May") {
							echo " Mei ";
							}elseif ($bulan=="June") {
							echo " Juni ";
							}elseif ($bulan=="July") {
							echo " Juli ";
							}elseif ($bulan=="August") {
							echo " Agustus ";
							}elseif ($bulan=="September") {
							echo " September ";
							}elseif ($bulan=="October") {
							echo " Oktober ";
							}elseif ($bulan=="November") {
							echo " November ";
							}elseif ($bulan=="December") {
							echo " Desember ";
							}
							$tahun=date('Y');
							echo $tahun;
							?>
							&nbsp;
						</div>
					</div>
				</footer>
			<!-- Footer End -->
		</div>
		<!-- Content End -->
		<script type="text/javascript">
		function tampilkanwaktu(){         // fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
		var waktu = new Date();            // membuat object date berdasarkan waktu saat
		var sh = waktu.getHours() + "";    // memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    // ambil nilai menit
		var sm = waktu.getMinutes() + "";  // memunculkan nilai detik
		var ss = waktu.getSeconds() + "";  // memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
		document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
		}
		</script>
		<script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/global.js');?>"></script>
	</body>
</html>