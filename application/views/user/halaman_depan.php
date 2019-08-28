<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Perundangan</title>
		<link rel="stylesheet" href="<?=base_url('assets3/css/ionicons.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/normalize.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/skeleton.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/jquery-ui.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/select2.min.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/global.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets3/css/media.css');?>" media="screen"/>
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
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
		<div class='full-bg no-filter' style='background-image:url("<?=base_url()?>assets3/images/gambar1.jpg")'>

			<div id='content'>
				<!-- Header Running Text Start -->
				<header class='container'>
					<!-- <div class='container'> -->
					<nav class='nav-top'>
						<div class='u-pull-left'>
							<div id='nav-title'>
								<img src="<?=base_url('assets3/images/logo_pustaka_old.jpg');?>" class='image-white' alt='Perundangan'/>
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
								<form method='GET' action="<?php echo site_url('Perpustakaan/searching'); ?>">

									<div id='form-hide'>
										<div class='row'>
											<div class='seven columns'>
												<input type='text' class='u-full-width' name='param1' placeholder='ex: Something' onkeyup="cariWilayah(this.value);" onblur="pilih();" onfocus="if(this.value=='ex: Something') this.value='';" id="keyword"/>
											</div>
											<div class='five columns'>
												<!-- Dropdown Forms -->
												<select class='u-full-width select2' name='param2'>
													<option value=''>-Pilih parameter-</option>
													<option value='judul'>Judul Buku</option>
													<option value='tahun'>Tahun Terbit</option>
													<option value='penerbit'>Penerbit</option>
													<option value='author'>Author</option>
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
										for(i=65; i<=90; i++){
											document.write("<a href='<?= site_url(); ?>Perpustakaan/searching/"+String.fromCharCode(i)+"'>"+String.fromCharCode(i)+"</a>");
										}
									</script>
								</div>
							</div>

							<!-- Home Result Start -->
							<div id='home-result' class='home-result-4a'>
								<div class='table-result'>
									<!-- <table id="table_id">
										<thead>
											<tr>
												<th style="text-align: center;" width="4%"> # </th>
												<th style="text-align: center;"> Judul Buku </th>
												<th style="text-align: center;"> Penerbit </th>
												<th style="text-align: center;"> Pengarang </th>
												<th style="text-align: center;"> Sinopsis </th>
												<th style="text-align: center;" width="7%"> Aksi </th>
											</tr>
										</thead>
									</table>
									<script type="text/javascript" language="javascript" >
										$(document).ready(function(){
											$('#table_id').dataTable({
												"order": [[ 0, "asc" ]],
												"bProcessing": true,
												"ajax" : {
													url:"<?= site_url('Perpustakaan/json_buku'); ?>"
												},
												"aoColumns": [
															{ mData: 'number', sClass: "alignCenter" },
															{ mData: 'judul_buku', sClass: "alignCenter" },
															{ mData: 'penerbit', sClass: "alignCenter" },
															{ mData: 'pengarang', sClass: "alignCenter" } ,
															{ mData: 'sinopsis', sClass: "alignCenter" },
															{ mData: 'action' }
												]
											});
										});
									</script> -->
									<table id="table_id">
										<thead>
											<tr>
												<th style="text-align: center" width="4%">No</th>
												<th style="text-align: center" width="16%">Judul Buku</th>
												<th style="text-align: center" width="11%">Penerbit</th>
												<th style="text-align: center" width="13%">Pengarang</th>
												<th style="text-align: center" width="42%">Sinopsis</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no=1;
											foreach($data_buku as $content)
											{
												foreach ($content as $key => $value ) {
												$$key=$value;
											}
											?>
											<tr class="gradeX">
												<td style="text-align: center"><?= $no++."."; ?></td>
												<td><?php echo $nama_buku; ?></td>
												<td><?php echo $penerbit; ?></td>
												<td>
												<?php
												$author = explode(',',$penulis);
												$jumlah = count($author);
												for ($i=0; $i < $jumlah; $i++) {
													$where['id'] = $author[$i];
													$variable = $this->User_model->getSelectedData('author',$where);
													foreach ($variable as $key => $value) {
														echo $value->nama;
													}
													echo ", ";
												}
												?>
												</td>
												<td>
													<?php echo substr($sinopsis,0,100);
													// $jumlah = strlen($sinopsis);
													// if($jumlah>100){
													// 	echo "...... <a href='".site_url('Buku/detail/'.$id_buku)."'>[read more]</a>";
													// }
													// else{
													// 	echo "";
													// }
													?>
													<span class="more"><?= $sinopsis; ?></span>
												</td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
									<script>
										// $(document).ready(function() {
										// 	var showChar = 100;
										// 	var ellipsestext = "...";
										// 	var moretext = "[Show more]";
										// 	var lesstext = "[Show less]";

										// 	$('.more').each(function() {
										// 		var content = $(this).html();
										// 		if(content.length > showChar) {
										// 			var c = content.substr(0, showChar);
										// 			var h = content.substr(showChar, content.length - showChar);
										// 			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
										// 			$(this).html(html);
										// 		}
										// 	});

										// 	$(".morelink").click(function(){
										// 		if($(this).hasClass("less")) {
										// 			$(this).removeClass("less");
										// 			$(this).html(moretext);
										// 		} else {
										// 			$(this).addClass("less");
										// 			$(this).html(lesstext);
										// 		}
										// 		$(this).parent().prev().toggle();
										// 		$(this).prev().toggle();
										// 		return false;
										// 	});
										// });
									</script>
								</div>

							</div>
							<!-- Home Result End -->

							<div id='result-info'>
								<div class='u-pull-left'>
									<div class='result-total'>
										<label>Total : </label>
										<?= number_format(count($data_buku)); ?> Data
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
		<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
		<script src="<?=base_url('assets3/js/jquery-3.2.1.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/jquery-ui.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/select2.min.js');?>"></script>
		<script src="<?=base_url('assets3/js/global.js');?>"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script>
			$(function () {
				$("#table_id").DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": false,
					"autoWidth": true
				});
			});
		</script>
	</body>
</html>