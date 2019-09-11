	<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
	
						<div class="page-header">
							<h1>
								Peminjaman
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Detail Peminjaman Buku
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="space-6"></div>

								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<!-- #section:pages/invoice -->
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-list-alt green"></i>
													Invoice Peminjaman Buku
												</h3>

												<!-- #section:pages/invoice.info -->
												<?php
													foreach ($data_user as $key => $value) {
												?>
												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">ID:</span>
													<span class="red"><?php echo $value->id_peminjaman; ?></span>

													<br />
													<span class="invoice-info-label">Tanggal:</span>
													<span class="blue"><?php echo date('d-m-Y', strtotime($value->tanggal_pinjam)); ?></span>
												</div>
												<?php
													}
												?>
												<div class="widget-toolbar hidden-480">
													<a href="#">
														<i class="ace-icon fa fa-print"></i>
													</a>
												</div>

												<!-- /section:pages/invoice.info -->
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Identitas Peminjam</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<?php
																		foreach ($data_user as $key => $value) {
																	?>
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i><?php echo $value->nama; ?>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i><?php echo $value->no_anggota; ?>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i><?php echo $value->alamat; ?>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
																				Phone:
																		<b class="red"><?php echo $value->no_hp."  "; ?></b>
																		<?php
																		$pesan = "Harap mengembalikan buku yang Anda pinjam. TTD Perpustakaan Pemkot Semarang";
																		?>
																		<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $value->no_hp;?>&text=<?php echo $pesan; ?>" title="kirim pesan pemberitahuan">
																			<i class="ace-icon fa fa-paper-plane"></i>
																		</a>
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>
																		<?php echo $value->email."  "; ?>
																		<a href="#" title="kirim email pemberitahuan">
																			<i class="ace-icon fa fa-envelope"></i>
																		</a>
																	</li>
																	<?php } ?>
																</ul>
															</div>
														</div><!-- /.col -->
														<!--
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
																	<b>Customer Info</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled  spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>Street, City
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>Zip Code
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>State, Country
																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>
																		Contact Info
																	</li>
																</ul>
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space"></div>

													<div>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th class="hidden-xs">Nama Buku</th>
																	<th class="hidden-480">Jumlah</th>
																	<th class="hidden-480">Sudah Dikembalikan</th>
																	<th class="hidden-xs">Tanggal Kembali</th>
																	<th>Keterangan</th>
																	
																</tr>
															</thead>

															<tbody>
																<!--
																<tr>
																	<td class="center">1</td>
																	<td>
																		Bulan (B-002-001)
																	</td>
																	<td class="hidden-480"> 4 </td>
																	<td class="hidden-xs">
																		4
																	</td>
																	<td>19/10/2019</td>
																	<td>Tepat waktu</td>
																	<td>
																		<a><i class="fa fa-check"></i></a>
																		|
																		<a><i class="fa fa-check-square-o"></i></a>
																	</td>
																</tr>
																<tr style="background-color: red;">
																	<td class="center">1</td>
																	<td>
																		Matahari (B-001-001)
																	</td>
																	<td class="hidden-480"> 4 </td>
																	<td class="hidden-xs">
																		3
																	</td>
																	<td><a data-toggle="modal" data-target="#myModal">Lihat detail</a></td>
																	<td>Telat 1 buku</td>
																	<td><a href="" title="Kembalikan satu buku"><i class="fa fa-check"></i></a>
																		|
																		<a href="" title="Kembalikan semua buku"><i class="fa fa-check-square-o"></i></a>
																	</td>
																</tr>-->
																<?php
																	$no = 1;
																		foreach ($data_1 as $key => $d1) {
																			$tanggal1 = new DateTime($d1->tanggal_pinjam);
																			$tanggal2 = new DateTime();
																			 
																			$perbedaan = $tanggal2->diff($tanggal1)->format("%a");
																			if($perbedaan>$max){
																?>
																<tr style="background-color: red;">
																	
																	<td class="center"><?php echo $no++; ?></td>
																	<td>
																		<?php echo $d1->nama_buku." (".$d1->id_buku.")"; ?>
																	</td>
																	<td class="hidden-480"> <?php echo $d1->jumlah; ?> </td>
																	<td class="hidden-xs">
																		0
																	</td>
																	<td>-</td>
																	<td>
																		<?php
																			$selesih = $perbedaan-$max;
																			echo "Telat ".$selesih." hari.";
																		?>
																	</td>
																	
																	
																</tr>
																<?php }
																	else{
																?>
																<tr>
																	
																	<td class="center"><?php echo $no++; ?></td>
																	<td>
																		<?php echo $d1->nama_buku." (".$d1->id_buku.")"; ?>
																	</td>
																	<td class="hidden-480"> <?php echo $d1->jumlah; ?> </td>
																	<td class="hidden-xs">
																		0
																	</td>
																	<td>-</td>
																	<td>
																		<?php
																			echo "Belum mengembalikan";
																		?>
																	</td>
																	
																	
																</tr>
																<?php 
																	}
																}
																		foreach ($data_3 as $key => $d3) {
																			$tanggal1 = new DateTime($d3->tanggal_pinjam);
																			$tanggal2 = new DateTime($d3->tanggal_kembali);
																			 
																			$perbedaan = $tanggal2->diff($tanggal1)->format("%a");
																			if($perbedaan>$max){
																?>
																<tr style="background-color: red;">
																	
																	<td class="center"><?php echo $no++; ?></td>
																	<td>
																		<?php echo $d3->nama_buku." (".$d3->id_buku.")"; ?>
																	</td>
																	<td class="hidden-480"> <?php echo $d3->jumlah; ?> </td>
																	<td class="hidden-xs">
																		<?php echo $d3->jumlah; ?>
																	</td>
																	<td><?php echo date('d-m-Y', strtotime($d3->tanggal_kembali)); ?></td>
																	<td>
																		<?php
																			$selesih = $perbedaan-$max;
																			echo "Telat ".$selesih." hari.";
																		?>
																	</td>
																	
																	
																</tr>
																<?php }
																	else{
																?>
																<tr>
																	
																	<td class="center"><?php echo $no++; ?></td>
																	<td>
																		<?php echo $d3->nama_buku." (".$d3->id_buku.")"; ?>
																	</td>
																	<td class="hidden-480"> <?php echo $d3->jumlah; ?> </td>
																	<td class="hidden-xs">
																		<?php echo $d3->jumlah; ?>
																	</td>
																	<td><?php echo date('d-m-Y', strtotime($d3->tanggal_kembali)); ?></td>
																	<td>
																		<?php
																			echo "Tepat waktu.";
																		?>
																	</td>
																	
																	
																</tr>
																<?php 
																	}
																}
																		foreach ($data_2 as $key => $d2) {
																			$sisa = ($d2->jumlah)-($d2->kurang);
																?>
																<tr>
																	
																	<td class="center"><?php echo $no++; ?></td>
																	<td>
																		<?php echo $d2->nama_buku." (".$d2->id_buku.")"; ?>
																	</td>
																	<td class="hidden-480"> <?php echo $d2->jumlah; ?> </td>
																	<td class="hidden-xs">
																		<?php echo $sisa; ?>
																	</td>
																	<td><a data-toggle="modal" data-target="#myModal" class="view_data" id="<?php echo $d2->id.",".$d2->tanggal_pinjam; ?>">Lihat detail</a></td>
																	<td><a data-toggle="modal" data-target="#myModal" class="view_data" id="<?php echo $d2->id; ?>">Lihat detail</a></td>
																	<?php
																		if($d2->kurang==0){
																	?>
																	
																	<?php
																		}
																		elseif($d2->kurang==1){
																	?>
																	
																	<?php
																		}
																		else{
																	?>
																	
																	<?php
																		}
																	?>
																</tr>
																<?php
																	}
																?>
																
															</tbody>
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<!--<h4 class="pull-right">
																Denda :
																<span class="red">Rp <?php echo number_format("120000").".00"; ?></span>
															</h4>-->
														</div>
														<!--<div class="col-sm-7 pull-left"> Informasi Tambahan </div>-->
													</div>

													<div class="space-6"></div>
													<div class="well">
														Thank you for choosing our products.
														We believe you will be satisfied by our services.
													</div>
												</div>
											</div>
										</div>

										<!-- /section:pages/invoice -->
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Detail tanggal pengembalian</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body" id="detail_peminjaman" >
					<!--<p>16/01/2019</p>
					<p>06/11/2019</p>
					<p>09/09/2019</p>
					<p>1</p>
					<p>2</p>
					<p>5</p>-->
				</div>
				<!-- footer modal -->
				<!--<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>-->
			</div>
		</div>
	</div>	
	<script>
	// ini menyiapkan dokumen agar siap grak :)
	$(document).ready(function(){
		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
		$('.view_data').click(function(){
			// membuat variabel id, nilainya dari attribut id pada button
			// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
			var id = $(this).attr("id");
			var res = id.split(',');
			
			// memulai ajax
			$.ajax({
				url: '<?php echo base_url(); ?>Peminjaman/tampil_ajax',	// set url -> ini file yang menyimpan query tampil detail data peminjaman
				method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
				data: {id:res[0],tanggal_pinjam:res[1]},		
				success:function(data){		// kode dibawah ini jalan kalau sukses
					$('#detail_peminjaman').html(data);	// mengisi konten dari -> <div class="modal-body" id="detail_peminjaman">
					$('#myModal').modal("show");	// menampilkan dialog modal nya
				}
			});
		});
	});
	</script>			 