<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Profil</title>
		<link rel="stylesheet" href="<?=base_url('assets/profile/css/semantic.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets/profile/css/style.css');?>" />
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
	</head>
	<body>

		<!-- Outer Wrapper Start -->
		<div id='outer-wrapper'>

			<div class="ui menu">
				<a class="item">
					<i class="home icon"></i>
					Beranda
				</a>
				<div class="ui dropdown item">
					<i class='search icon'></i> Si-PURI <i class="dropdown icon"></i>
					<div class="menu">
					<a class="item" href="<?php echo site_url('Uu'); ?>">Perundang-undangan</a>
					<a class="item" href="<?php echo site_url('Perpustakaan/pencarian'); ?>">Pustaka</a>
					<a class="item" href="<?php echo site_url('Risalah'); ?>">Risalah</a>
					</div>
				</div>
				<div class="right menu">
					<div class="ui dropdown item">
						Bahasa <i class="dropdown icon"></i>
						<div class="menu">
						<a class="item" title='Change to English'><i class='us flag'></i> English</a>
						<a class="item" title='Ubah ke Bahasa'><i class='id flag'></i> Indonesia</a>
						</div>
					</div>
					<div class="item">
						<div class="ui red button" onclick="location.href='<?= base_url("Pengguna/logout"); ?>'"><i class="sign out icon"></i>Keluar</div>
					</div>
				</div>
			</div>

			<div class='ui grid'>
				<!-- Left Profile Start -->

				<div class='five wide column'>
					<!-- Profile Card Start -->
					<div class="ui special cards">
						<div class="card">
							<div class="blurring dimmable image">
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
											} }
								?>
							</div>
							<div class="content">
								<?php
								$where = array(
									'id' => $this->session->userdata('id_pengguna')
									);
									$query = $this->User_model->getSelectedData('anggota',$where);
									foreach($query as $value){
									echo '<a class="header">'.$value->nama.'</a>';
								}
								?>
								<!-- <div class="meta">
									<span class="date">mnovalbs</span>
								</div> -->
							</div>
						</div>
					</div>
					<!-- Profile Card End -->
					<!-- Menu Profile Start -->
					<div class="ui vertical fluid pointing menu">
						<a class="item" href="<?php echo site_url('Pengguna/profil'); ?>">
							Profil
						</a>
						<a class="item" href="<?php echo site_url('Pengguna/password'); ?>">
							Kata Sandi
						</a>
						<a class="item" href="<?php echo site_url('Pengguna/email'); ?>">
							Email
						</a>
						<a class="active item">
							Tentang
						</a>
					</div>
					<!-- Menu Profile End -->
				</div>
				<!-- Left Profile End -->

				<!-- Right Content Start -->
				<div class='eleven wide column'>
					<div class='ui segment'>
						<div class="ui divided items">
							<h3>Tentang</h3>
							<div class="item">
								<div class="image">
									<!-- <img src="images/logo_puri.png"> -->
									<img src="<?= base_url() ?>assets/profile/images/logo_puri.png">
								</div>
								<div class="content">
									<a class="header">Si-PURI</a>
									<div class="meta">
										<span class="cinema">Sistem Informasi Pustaka, Perundang-undangan dan Risalah</span>
									</div>
									<div class="description" style="text-align: justify;">
										<p>Si-PURI adalah serangkaian aplikasi yang diimplementasikan di lingkungan Pemerintah Kota Semarang untuk menunjang kinerja karyawan ataupun anggota dewan dalam kesehariannya. Terdapat 3 sub aplikasi.</p>
									</div>
									<div class="extra">
										<div class="ui label">Pemkot Semarang</div>
										<div class="ui right floated primary button" onclick='open_modal("modal-sipuri")'>
											Lihat
											<i class="right chevron icon"></i>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="item">
								<div class="image">
									<img src="images/logo_perundangan.png">
								</div>
								<div class="content">
									<a class="header">Perundang-undangan</a>
									<div class="meta">
										<span class="cinema">Sistem Perundang-undangan</span>
									</div>
									<div class="description">
										<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, sint nostrum numquam quam, ullam reiciendis tempore dolorem sit fuga soluta quidem quisquam enim provident aliquid labore praesentium dolor reprehenderit blanditiis.</p>
									</div>
									<div class="extra">
										<div class="ui label">Kemenkumham</div>
										<div class="ui right floated primary button" onclick='open_modal("modal-perundangan")'>
											Lihat
											<i class="right chevron icon"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="image">
									<img src="images/logo_risalah.png">
								</div>
								<div class="content">
									<a class="header">Risalah</a>
									<div class="meta">
										<span class="cinema">Sistem Risalah</span>
									</div>
									<div class="description">
										<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, sint nostrum numquam quam, ullam reiciendis tempore dolorem sit fuga soluta quidem quisquam enim provident aliquid labore praesentium dolor reprehenderit blanditiis.</p>
									</div>
									<div class="extra">
										<div class="ui label">Kemenkumham</div>
										<div class="ui right floated primary button" onclick='open_modal("modal-risalah")'>
											Lihat
											<i class="right chevron icon"></i>
										</div>
									</div>
								</div>
							</div> -->
							<div class="item">
								<div class="image">
									<img src="<?= base_url() ?>assets3/images/logo_pustaka.png">
								</div>
								<div class="content">
									<a class="header">Pustaka</a>
									<div class="meta">
										<span class="cinema">Sistem Pustaka</span>
									</div>
									<div class="description" style="text-align: justify;">
										<p>Aplikasi Pustaka adalah aplikasi perpustakaan berbasis web yang dapat diakses dimanapun asal masih dalam lingkup Pemerintah Kota Semarang. Terdapat berbagai macam E-book yang tersedia guna meningkatkan minat baca dan pengetahuan bagi para karyawan.</p>
									</div>
									<div class="extra">
										<div class="ui label">Pemkot Semarang</div>
										<div class="ui right floated primary button" onclick='open_modal("modal-pustaka")'>
											Lihat
											<i class="right chevron icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Right Content End -->
			</div>

		</div>
		<!-- Outer Wrapper End -->

		<!-- Modals -->
		<!-- Modal SiPuri -->
		<div class="ui basic modal" id='modal-sipuri'>
			<img class='ui centered medium image' src='<?= base_url() ?>assets/profile/images/logo_puri.png'/>
			<div class="content">
				<p style="text-align: justify;">
					Si-PURI adalah serangkaian aplikasi yang diimplementasikan di lingkungan Pemerintah Kota Semarang untuk menunjang kinerja karyawan ataupun anggota dewan dalam kesehariannya. Terdapat 3 sub aplikasi antara lain, aplikasi Pustaka untuk perpustakaan online sehingga pengguna bisa membaca buku meski sedang tidak di perpustakaan, asalkan terdapat E-book pengguna telah bisa menikmati fasilitas seperti halnya sedang berada di perpustakaan. Selanjutnya ada sub aplikasi Perundangan, ini berguna bagi para karyawan khususnya anggota dewan yang membutuhkan referensi ketika sedang melakukan rapat untuk menegaskan argumennya. Dan terakhir ada sub aplikasi Risalah, rekapan kegiatan dalam setahun akan tersedia disini demi transparansinya roda pemerintahan, terdapat file dokumen, suara, dan foto kegiatan yang dapat dinikmati oleh pengunjung ketika mengakses sub aplikasi ini.
				</p>
			</div>
			<div class="actions">
				<div class="ui red basic cancel inverted button">
					<i class="remove icon"></i>
					Tutup
				</div>
			</div>
		</div>

		<!-- Modal Perundangan -->
		<!-- <div class="ui basic modal" id='modal-perundangan'>
			<img class='ui centered medium image image-white' src='images/logo_perundangan.png'/>
			<div class="content">
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quisquam maxime provident repellat qui dolore corporis culpa veniam illo. Odit magni nisi earum consequuntur corrupti quidem accusantium, ducimus omnis accusamus!
					Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed qui exercitationem aliquid, cupiditate, eaque asperiores provident expedita reprehenderit nulla odit enim laudantium quaerat praesentium molestiae consequatur quam libero porro ad.
					Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis laborum molestias nesciunt reiciendis nisi laudantium soluta optio deserunt vel ipsum, quasi odio maiores explicabo magnam delectus quo, pariatur blanditiis voluptates!
				</p>
			</div>
			<div class="actions">
				<div class="ui red basic cancel inverted button">
					<i class="remove icon"></i>
					Tutup
				</div>
			</div>
		</div> -->

		<!-- Modal Risalah -->
		<!-- <div class="ui basic modal" id='modal-risalah'>
			<img class='ui centered medium image image-white' src='images/logo_risalah.png'/>
			<div class="content">
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque quisquam maxime provident repellat qui dolore corporis culpa veniam illo. Odit magni nisi earum consequuntur corrupti quidem accusantium, ducimus omnis accusamus!
					Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed qui exercitationem aliquid, cupiditate, eaque asperiores provident expedita reprehenderit nulla odit enim laudantium quaerat praesentium molestiae consequatur quam libero porro ad.
					Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis laborum molestias nesciunt reiciendis nisi laudantium soluta optio deserunt vel ipsum, quasi odio maiores explicabo magnam delectus quo, pariatur blanditiis voluptates!
				</p>
			</div>
			<div class="actions">
				<div class="ui red basic cancel inverted button">
					<i class="remove icon"></i>
					Tutup
				</div>
			</div>
		</div> -->

		<!-- Modal Perundangan -->
		<div class="ui basic modal" id='modal-pustaka'>
			<!-- <img class='ui centered medium image image-white' src='<?= base_url() ?>assets3/images/logo_pustaka.png'/> -->
			<div class="content">
				<p style="text-align: justify;">
					Aplikasi Pustaka adalah aplikasi perpustakaan berbasis web yang dapat diakses dimanapun asal masih dalam lingkup Pemerintah Kota Semarang. Terdapat berbagai macam E-book yang tersedia guna meningkatkan minat baca dan pengetahuan bagi para karyawan.
				</p>
			</div>
			<div class="actions">
				<div class="ui red basic cancel inverted button">
					<i class="remove icon"></i>
					Tutup
				</div>
			</div>
		</div>

		<script src="<?=base_url('assets/profile/js/jquery-3.2.1.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/css/components/dropdown.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/css/components/transition.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/css/components/dimmer.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/css/components/tab.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/css/components/checkbox.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/css/components/modal.min.js');?>"></script>
		<script src="<?=base_url('assets/profile/js/script.js');?>"></script>
	</body>
</html>