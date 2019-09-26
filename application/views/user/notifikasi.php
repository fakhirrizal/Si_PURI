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
        <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
								<img src="<?=base_url('assets3/images/logo_pustaka.png');?>" alt='Si-PURI | Pustaka'/>
								<!-- <img src="<?=base_url('assets3/images/logo_pustaka_old.jpg');?>" class='image-white' alt='Si-PURI | Pustaka'/> -->
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
									<li><a href='<?php echo site_url('Pengguna/notifikasi'); ?>'><i class='ion-ios-bell'></i> Notifikasi</a></li>
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
							<h2>Daftar Notifikasi</h2>
						</div>
						<!-- Page Title End -->
					</div>
				</div>
			</header>
			<!-- Header Top End -->
			<!-- Content Start -->
			<div id='content'>
				<div class='container'>
					<!-- Result Wrapper Start -->
					<div id='result-wrapper'>

						<div class='rowz'>
						</div>

						<!-- End Result Detail Start -->
						<div id='result-info'>
                            <table class="table table-bordered table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width='4%'>No</th>
                                        <th style="text-align: center">Buku</th>
                                        <th style="text-align: center">Tanggal Request</th>
                                        <th style="text-align: center">Ketersediaan</th>
                                        <th style="text-align: center">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    foreach($peminjaman as $content)
                                    {
                                        foreach ($content as $key => $value ) {
                                        $$key=$value;
                                    }
                                    $gettanggal = explode(' ',$created_date);
                                    ?>
                                    <tr class="gradeX">
                                        <td style="text-align: center"><?= $no++."."; ?></td>
                                        <td><?php echo $nama_buku; ?></td>
                                        <td style="text-align: center"><?php echo $this->Main_model->convert_tanggal($gettanggal[0]); ?></td>
                                        <td style="text-align: center"><?php
                                        if($jawaban=='0'){
                                            echo'Tidak Tersedia';
                                        }elseif($jawaban=='1'){
                                            echo'Tersedia';
                                        }else{
                                            echo'Belum ada tanggapan dari Admin';
                                        }
                                        ?></td>
                                        <td style="text-align: center"><?php echo $catatan; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <script>
                                $(function () {
                                    $("#myTable").DataTable({
                                        "paging": true,
                                        "lengthChange": false,
                                        "searching": true,
                                        "ordering": true,
                                        "info": true,
                                        "autoWidth": false
                                    });
                                });
                            </script>
						</div>
						<!-- End Result Detail End -->

					</div>
					<!-- Result Wrapper End -->
				</div>
				<div class='back-button'>
					<a href="<?php echo site_url('Perpustakaan/pencarian/')?>"><i class='ion-android-search'></i> Kembali ke Pencarian</a>
				</div>
			</div>
			<!-- Content End -->
			<!-- Footer Start -->
			<footer>
				<div class='container'>
					<div class='u-pull-left'>
						<div id='footer-image'>
							<img alt='Footer Logo' src="<?=base_url('assets3/images/logo_alpha_2.png');?>"/>
						</div>
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
		function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
		var waktu = new Date();            //membuat object date berdasarkan waktu saat
		var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
		var sm = waktu.getMinutes() + "";  //memunculkan nilai detik
		var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
		document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
		}
		</script>

		<!-- <script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script> -->
		<script src="<?=base_url('assets3/js/global.js');?>"></script>
	</body>
</html>