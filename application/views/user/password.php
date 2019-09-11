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
										}
									}
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
						<a class="active item">
							Kata Sandi
						</a>
						<a class="item" href="<?php echo site_url('Pengguna/email'); ?>">
							Email
						</a>
						<a class="item" href="<?php echo site_url('Pengguna/tentang'); ?>">
							Tentang
						</a>
					</div>
					<!-- Menu Profile End -->
				</div>
				<!-- Left Profile End -->

				<!-- Right Content Start -->
				<div class='eleven wide column'>
				<?= $this->session->flashdata('gagal') ?>
					<div class="ui success message">
						<div class="header">
							Gunakan kata sandi yang aman!
						</div>
						<ul class="list">
							<li>Kata sandi minimal 8 karakter</li>
							<li>Kata sandi mengandung huruf dan angka</li>
						</ul>
					</div>
					<div class='ui segment'>
						<h3>Ubah Kata Sandi</h3>
						<form class='ui form' method='POST' action="<?php echo site_url('Pengguna/ubah_password'); ?>">
							<div class='ui field'>
								<label>Kata Sandi Lama</label>
								<input type='password' required placeholder='********' name="password_lama" />
							</div>
							<div class='ui field'>
								<label>Kata Sandi Baru</label>
								<input type='password' required placeholder='********' maxlength="32" name="password_baru" />
							</div>
							<div class='ui field'>
								<label>Konfirmasi Kata Sandi</label>
								<input type='password' required placeholder='********' maxlength="32" name="password_konfirmasi" />
							</div>
								<?php
								$where = array(
									'id' => $this->session->userdata('id_pengguna')
									);
									$query = $this->User_model->getSelectedData('anggota',$where);
									foreach($query as $value){
									echo '<input type="hidden" name="nama" value="'.$value->nama.'"/>';
								}
								?>
							<button type='submit' class='ui primary button'><i class='save icon'></i> Simpan</button>
						</form>
					</div>
				</div>
				<!-- Right Content End -->
			</div>

		</div>
		<!-- Outer Wrapper End -->
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