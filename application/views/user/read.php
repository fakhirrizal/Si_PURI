<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Perpustakaan</title>
		<link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
	</head>
	<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

		<!--
			Content Start
			Wrapper ini digunakan untuk halaman single
		-->
		<div id='small-content'>
			<!-- Header Top Start -->
			<header class='header-top' style='background-image: url("<?=base_url()?>assets3/images/resize-img.jpg")'>
				<div class='header-inner'>
					<div class='container'>
						<!-- Nav Top Start -->
						<nav class='nav-top'>
						<div class='u-pull-left'>
							<div id='nav-title'>
								<img src="<?=base_url('assets3/images/logo_pustaka_old.jpg');?>" class='image-white' alt='Pustaka'/>
							</div>
						</div>
						<div class='u-pull-right'>
							<!-- <div id='nav-link'>
								<a href=""><i class='ion-log-in'></i> Logout</a>
							</div> -->
							<div id='nav-account'>
								<div class='prof'>
								<?php
									$where = array(
									'id' => $this->session->userdata('id_pengguna')
									);
									$query = $this->User_model->getSelectedData('anggota',$where);
									foreach($query as $value){
										if(!empty($value->file_foto)){
											echo '<img src="'.base_url('assets/uploads/profil/').$value->file_foto.'" >';
										}
										else{
											echo '<img src="'.base_url('assets2/pages/img/avatars/kosong.jpeg').'" >';
										}
									} ?>
									<label><?php echo $this->session->userdata('user_name'); ?></label>
									<i class='ion-ios-arrow-down'></i>
								</div>
								<ul class='nav-account-menus'>
									<li><a href='<?php echo site_url('Pengguna/profil'); ?>'><i class='ion-person'></i> Profil</a></li>
									<li><a href='<?php echo site_url('Pengguna/email'); ?>'><i class='ion-email'></i> Email</a></li>
									<li><a href='<?php echo site_url('Pengguna/password'); ?>'><i class='ion-locked'></i> Kata Sandi</a></li>
									<li><a href='<?php echo site_url('Pengguna/tentang'); ?>'><i class='ion-information'></i> Tentang</a></li>
									<li><a href='<?php echo site_url('Pengguna/logout'); ?>'><i class='ion-log-out'></i> Keluar</a></li>
								</ul>
							</div>
							<div id='nav-lang'>
								<a href='#!' title='Ubah ke Bahasa'>
									<img alt='Ubah ke Bahasa' src="<?=base_url('assets3/images/flag_id_square_small.jpg');?>"/>
								</a>
								<a href='#!' title='Change to English'>
									<img alt='Change to English' src="<?=base_url('assets3/images/flag_en_square_small.jpg');?>"/>
								</a>
							</div>
						</div>
						</nav>
						<!-- Nav Top End -->
						<!-- Page Title Start -->
						<div id='page-title'>
							<h2><?php foreach($variable as $row){ echo "Buku : ".$row->nama_buku; }?></h2>
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
					<a href='#dokter' class='active'>E-Book</a>
					<a href='#sinopsis'>Sinopsis</a>
					<a href='#infodok'>Info Dokumen</a>
				</div>
				<!-- Tab Menus End -->
				<!-- Tab Content Start -->
				<div id='tab-content'>

					<div id='dokter' class='tab-content active'>

						<div class='u-pull-left half iframe'>
							<div id='iframe-dokumen'>
								<div class='dokumen-fullscreen-button' onclick='fullDocument(this)'><i class='ion-arrow-expand'></i></div>
								<div>
									<?php
									foreach($variable as $row){
									if(empty($row->pdf)){
									?>
									<img height="380" width="620" style="text-align: center;" src="<?=base_url()?>assets/images/filetidakada.png">
									<?php
									}
									else{
									?>
									<iframe class='dokumen' src="<?=base_url()?>assets/document/<?=$row->pdf;?>"></iframe>
									<?php } } ?>
								</div>
							</div>
						</div>
						<div class='u-pull-right half'>
							<div class='info-dokumen'>
								<?php
									foreach($variable as $row){
									if(empty($row->pdf)){
									echo "* Mohon maaf buku ini tidak mempunyai file e-book";
										}
									}
								?>
							</div>
							<div class='dokumen-lain'>
								<h3>Buku Terkait</h3>

								<div class='rowz'>
									<?php
									foreach($buku_lain as $key => $value){
									?>
									<div class='four-columns'>
										<a class='result-box' href="<?php echo site_url('Perpustakaan/baca_buku/'.$value->id_buku)?>">
											<div class='result-image-wrapper'>
												<?php
												if(is_null($value->nama_file)){ ?>
												<div class='result-image' style='background-image: url("<?=base_url()?>assets/uploads/noimage.jpg")'></div>
												<?php }
												else{ ?>
												<div class='result-image' style='background-image: url("<?=base_url()?>assets/uploads/<?=$value->nama_file;?>")'></div>
												<?php }
												?>
											</div>
											<div class='result-detail'>
												<h3><?= $value->nama_buku; ?></h3>
											</div>
										</a>
									</div>
									<?php } ?>
								</div>

							</div>
						</div>
					</div>

					<div id='sinopsis' class='tab-content'>
						<div class='container'>
							<div class='tab-inner'>
								<h3>Sinopsis</h3>
								<p>
									<?php foreach($variable as $row){ echo $row->sinopsis; }?>
								</p>
							</div>
						</div>
					</div>

					<div id='infodok' class='tab-content'>
						<div class='container'>
							<div class='info-dokumen'>
								<h3>Tentang Dokumen</h3>
								<?php
									if(isset($variable)){
										foreach($variable as $row)
										{
								?>
								<div class="col-md-6">
										<table class="table">
										<tbody>
										<tr>
										<td> Judul Buku </td>
										<td> : </td>
										<td><?php echo $row->nama_buku; ?></td>
										</tr>
										<tr>
										<td> Kategori </td>
										<td> : </td>
										<td><?php echo $row->nama_kategori; ?>
										</td>
										</tr>
										<tr>
										<td> Penulis </td>
										<td> : </td>
										<td>
											<?php
											$author = explode(',',$row->penulis);
											$jumlah = count($author);
											for ($i=0; $i < $jumlah; $i++) {
												$where['id'] = $author[$i];
												$variable = $this->User_model->getSelectedData('author',$where);
												foreach ($variable as $key => $value) {
												echo $value->nama;
												}
												echo "<br>";
											}
											?>
										</td>
										</tr>
										<tr>
										<td> Penerbit </td>
										<td> : </td>
										<td><?php echo $row->penerbit; ?></td>
										</tr>
										<tr>
										<td> Tahun Terbit </td>
										<td> : </td>
										<td><?php echo $row->tahun_terbit; ?>
										</td>
										</tr>
										<tr>
										<td> Call Number </td>
										<td> : </td>
										<td><?php echo $row->call_number; ?>
										</td>
										</tr>
										<?php
										if(is_null($row->stok)){
										?>
										<tr>
										<td> Keterangan </td>
										<td> : </td>
										<td>Buku ini hanya ada E-book, tidak memiliki bentuk fisik.</td>
										</tr>
										<?php
										}
										else{
										?>
										<tr>
										<td> Stok </td>
										<td> : </td>
										<td><?php echo $row->stok; ?> pcs. <br>Silahkan hubungi petugas perpustakaan jika Anda ingin meminjam buku ini.</td>
										</tr>
										<?php } ?>
										</tbody>
										</table>
								</div>
								<?php }} ?>
							</div>
						</div>
					</div>

				</div>
				<!-- Tab Content End -->
				<!-- Button Kembali Start -->
				<div class='back-button'>
					<a href="<?php echo site_url('Perpustakaan/pencarian/')?>"><i class='ion-android-search'></i> Kembali ke Pencarian</a>
				</div>
				<!-- Button Kembali End -->
			</div>
			<!-- Content End -->
			<!-- Footer Start -->
			<footer>
				<div class='container'>
					<div class='u-pull-left'>
						<div id='footer-image'>
							<img alt='Footer Logo' src="<?=base_url('assets3/images/logo_alpha_2.png');?>"/>
						</div>
						Copyright &copy; 2017 | Si-PURI
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
		function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
		var waktu = new Date();            //membuat object date berdasarkan waktu saat
		var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
		var sm = waktu.getMinutes() + "";  //memunculkan nilai detik
		var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
		document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
		}
		</script>

		<script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/global.js');?>"></script>
	</body>
</html>