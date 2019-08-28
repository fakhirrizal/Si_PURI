<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Undang-Undang</title>
		<link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/jquery-ui.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/select2.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
		<script type="text/javascript">
			// $(function() {
			//  $('#loading').ajaxStart(function(){
			//    $(this).fadeIn();
			//  }).ajaxStop(function(){
			//    $(this).fadeOut();
			//  });
			// });

			function cariWilayah(keyword) {
				if(keyword.length == 0) {
				$('#hasilPencarian').hide();
				} else {
				$.post("<?php echo base_url(); ?>Uu/autocomplete", {kirimNama: ""+keyword+""}, function(data){
					if(data.length >0) {
					$('#hasilPencarian').fadeIn();
					$('#dataPencarian').html(data);
					}
				});
				}
			}
			function pilih(thisValue) {
				$('#keyword').val(thisValue);
				//$('#tes').val(thisValue);
				setTimeout("$('#hasilPencarian').fadeOut();", 100);
			}
		</script>
	</head>
	<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">

		<!-- Full Bg Start -->
		<!-- <div class='full-bg no-filter' style='background-image:url("<?=base_url()?>assets3/images/gambar1.jpg")'> -->
			<?php
			foreach ($foto as $key => $value) {
			?>
			<div class='full-bg no-filter' style='background-image: url("<?=base_url()?>assets4/background/<?= $value->keterangan; ?>")'>
			<?php
			}
			?>
			<div id='content'>
				<!-- Header Running Text Start -->
				<header class='container'>
					<!-- <div class='container'> -->
					<nav class='nav-top'>
						<div class='u-pull-left'>
							<div id='nav-title'>
								<img src="<?=base_url('assets3/images/logo_perundangan.png');?>" class='image-white' alt='Perundangan'/>
							</div>
						</div>
						<div class='u-pull-right'>
							<div id='nav-lang'>
										<a href='#!' title='Ubah ke Bahasa'>
											<img alt='Ubah ke Bahasa' src="<?=base_url('assets3/images/flag_id_square_small.jpg');?>"/>
										</a>
										<a href='#!' title='Change to English'>
											<img alt='Change to English' src="<?=base_url('assets3/images/flag_en_square_small.jpg');?>"/>
										</a>
							</div>
							<div id='nav-link'>
								<!-- <a href='login.html'><i class='ion-log-in'></i> Login</a> -->
							</div>
						</div>
					</nav>
					<!-- </div> -->
				</header>
				<!-- Header Running Text End -->
				<!-- Top Content Start -->
				<div id='top-content'>
					<div class='middle'>
						<div class='container'>
							<div id='home-search'>

								<!-- Form Animation Start -->
								<form method='GET' action="<?php echo site_url('Uu/pencarian'); ?>">

									<div id='form-hide'>
										<div class='row'>
											<div class='seven columns'>
												<input type='text' class='u-full-width' name='param1' placeholder='ex: Something' onkeyup="cariWilayah(this.value);" onblur="pilih();" onfocus="if(this.value=='ex: Something') this.value='';" id="keyword"/>
											</div>
											<div class='five columns'>
												<!-- Dropdown Forms -->
												<select class='u-full-width select2' name='param2' required>
													<option value=''>-Pilih parameter-</option>
													<option value='all'>All</option>
													<option value='judul'>Judul Peraturan</option>
													<option value='tahun'>Tahun Terbit</option>
													<option value='deskripsi'>Deskripsi</option>
												</select>
											</div>
											<div class='seven columns' id="hasilPencarian" style="display: none;">
												<div style="border: dashed 2px #eceff5; padding: 15px; margin: 0; line-height: 23px; color: #1a356e" id="dataPencarian">
												</div>
											</div>
										</div>
									</div>

									<div id='form-show'>
										<button data-search='false' onclick='open_search(this, event)' type='button' class='loop-animation'>
											<i class='ion-android-search'></i>
										</button>
									</div>
								</form>
								<!-- Form Animation End -->

								<div id='alpha-search'>
									<!-- <a href='2c.html'>A</a> -->
									<script>
										for(i=2013; i<=2017; i++){
											document.write("<a href='<?= site_url(); ?>Uu/pencarian/"+i+"'>"+i+"</a>");
										}
									</script>
								</div>
							</div>

							<!-- Home Result Start -->
							<div id='home-result' class='home-result-4a'>
								<div class='table-result'>
									<table id="table_id">
										<thead>
											<tr>
												<th width="5%" style="text-align: center;">No</th>
												<th width="30%" style="text-align: center;">Judul Peraturan</th>
												<th width="10%" style="text-align: center;">Dikeluarkan Tahun</th>
												<th width="44%" style="text-align: center;">Deskripsi</th>
												<th width='11%' style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = $this->uri->segment('3') + 1;
											foreach($uu as $value){
											?>
											<tr>
												<td class='text-center'><?= $no++; ?></td>
												<td><?= $value->judul_uu; ?></td>
												<td class='text-center' style="text-align: center;"><?= $value->tahun_terbit; ?></td>
												<td>
													<?php echo substr($value->ringkasan,0,100);
														$jumlah = strlen($value->ringkasan);
														if($jumlah>100){
															echo "<a href='".site_url('Uu/baca/'.$value->id)."'>[read more]</a>";
														}
														else{
															echo "";
														}
													?>
												</td>
												<td>
													<!-- <a href="<?php echo site_url('Uu/download_uu/'.$value->id)?>" class='badge badge-primary'><i class='ion-android-download'></i> Unduh</a>  -->
													<a href="<?php echo site_url('Uu/baca/'.$value->id)?>" class='badge badge-success'><i class='ion-eye'></i> Lihat</a>
													<!-- <a href='#!' class='badge badge-danger'><i class='ion-trash-b'></i> Delete</a> -->
												</td>
											</tr>
											<?php } ?>
											<!-- <tr>
												<td class='text-center'>2</td>
												<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. </td>
												<td class='text-center'>2011</td>
												<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ducimus itaque odit at obcaecati facilis consequuntur officiis neque quam optio eveniet ipsam excepturi esse, sint alias saepe! Atque, optio tempora!</td>
												<td>
													<a href='#!' class='badge badge-primary'><i class='ion-android-open'></i> Ubah</a>
													<a href='#!' class='badge badge-success'><i class='ion-eye'></i> Lihat</a>
													<a href='#!' class='badge badge-danger'><i class='ion-trash-b'></i> Delete</a>
												</td>
											</tr> -->
											<!-- <tr>
												<td class='text-center'>3</td>
												<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. </td>
												<td class='text-center'>2011</td>
												<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ducimus itaque odit at obcaecati facilis consequuntur officiis neque quam optio eveniet ipsam excepturi esse, sint alias saepe! Atque, optio tempora!</td>
												<td>
													<a href='#!' class='badge badge-primary'><i class='ion-android-open'></i> Ubah</a>
													<a href='#!' class='badge badge-success'><i class='ion-eye'></i> Lihat</a>
													<a href='#!' class='badge badge-danger'><i class='ion-trash-b'></i> Delete</a>
												</td>
											</tr>
											<tr>
												<td class='text-center'>4</td>
												<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. </td>
												<td class='text-center'>2011</td>
												<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ducimus itaque odit at obcaecati facilis consequuntur officiis neque quam optio eveniet ipsam excepturi esse, sint alias saepe! Atque, optio tempora!</td>
												<td>
													<a href='#!' class='badge badge-primary'><i class='ion-android-open'></i> Ubah</a>
													<a href='#!' class='badge badge-success'><i class='ion-eye'></i> Lihat</a>
													<a href='#!' class='badge badge-danger'><i class='ion-trash-b'></i> Delete</a>
												</td>
											</tr> -->
										</tbody>
									</table>
								</div>

							</div>
							<!-- Home Result End -->

							<div id='result-info'>
								<div class='u-pull-left'>
									<div class='result-total'>
										<label>Total : </label>
										<?= number_format(count($jumlah_uu)); ?> Data
									</div>
								</div>
								<div class='u-pull-right'>
									<div class='pagination'>
										<?php
										echo $this->pagination->create_links();
										?>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- Top Content End -->
				<!-- Footer Start -->
				<footer>
					<div class='container'>
						<div class='u-pull-left'>
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

		</div>
		<!-- Full Bg End -->
		<script type="text/javascript">
			function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
				var waktu = new Date();            //membuat object date berdasarkan waktu saat
				var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
				var sm = waktu.getMinutes() + "";  //memunculkan nilai detik
				var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
				document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
			}
		</script>
		<!-- Full Bg End -->
		<script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/jquery-ui.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/select2.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/global.js');?>"></script>
	</body>
</html>