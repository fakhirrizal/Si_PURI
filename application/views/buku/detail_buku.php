					<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>
					<style>
						@font-face{
							font-family:'barcode';
							src: url('<?= base_url('assets/fonts/BarcodeFont.ttf'); ?>') format('truetype');
						}

					</style>
						<div class="page-header">
							<h1>
								Buku
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Detail Buku
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<?= $this->session->flashdata('gagal') ?>
								<?= $this->session->flashdata('sukses') ?>
								<!-- PAGE CONTENT BEGINS -->
								<?php
								foreach ($data_buku as $key => $value) {
								?>
								<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<?php
																	if(is_null($value->gambar)){
																?>
																	<img class="editable img-responsive" alt="<?= $value->nama_buku ?>" src="<?=base_url()?>assets/uploads/noimage.jpg">
																<?php
																	}
																else{
																?>
																<img class="editable img-responsive" alt="<?= $value->nama_buku ?>" src="<?=base_url()?>assets/uploads/<?=$value->gambar;?>">
																<?php } ?>
															</span>

															<div class="space space-4"></div>
															<?php
																	if(is_null($value->gambar)){
															?>
															<a data-toggle="modal" data-target="#tambah-poto" class="btn btn-sm btn-block btn-success">
																<i class="ace-icon fa fa-image bigger-120"></i>
																<span class="bigger-110">Ganti foto cover</span>
															</a>
															<?php
																}
															else{
															?>
															<a data-toggle="modal" data-target="#editt-poto" class="btn btn-sm btn-block btn-success">
																<i class="ace-icon fa fa-image bigger-120"></i>
																<span class="bigger-110">Ganti foto cover</span>
															</a>
															<?php
															}
															?>
														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">
															<h4 class="blue">
																<span class="middle"><?= $value->nama_buku ?></span>

																<span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
																	<?= $value->nama_kategori; ?>
																</span>
															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> Penulis </div>

																	<div class="profile-info-value">
																		<?php
												                        $author = explode(',',$value->penulis);
												                        $jumlah = count($author);
												                        for ($i=0; $i < $jumlah; $i++) {
												                        	$where['id'] = $author[$i];
												                        	$variable = $this->User_model->getSelectedData('author',$where);
												                        	foreach ($variable as $key => $row) {
												                        		echo "<span>".$row->nama."</span>";
												                        	}
												                        }
												                        ?>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Penerbit </div>

																	<div class="profile-info-value">
																		<span><?= $value->penerbit ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Tahun Terbit </div>

																	<div class="profile-info-value">
																		<span><?= $value->tahun_terbit ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Call Number </div>

																	<div class="profile-info-value">
																		<span><?= $value->call_number ?></span>
																	</div>
																	<div>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name">  </div>

																	<div class="profile-info-value">
																		<span><font style='font-family:barcode' size="100em"><?= $value->call_number ?></font>
																		<?php
																		if($value->barcode==NULL){
																			echo'
																			<br>
																			<button class="btn btn-white btn-default btn-round">
																					<i class="ace-icon fa fa-dropbox"></i>
																					<a href="'.site_url('perpustakaan/generate_barcode/'.$value->id).'">Generate Barcode</a>
																			</button>
																			';
																		}else{
																			echo'<img style="width: 100px;" src="'.base_url().'assets/barcode/'.$value->barcode.'">';
																		}
																		?></span>
																	</div>
																	<div>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Ketebalan </div>

																	<div class="profile-info-value">
																		<span><?= $value->halaman." halaman"; ?></span>
																	</div>
																</div>

																<?php
																	if(is_null($value->stok)){
																?>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Keterangan </div>

																	<div class="profile-info-value">
																		<span>Hanya ada E-book, tidak ada buku fisiknya</span>
																	</div>
																</div>
																<?php
																	}
																else{
																?>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Stok </div>

																	<div class="profile-info-value">
																		<span><?= $value->stok." pcs" ?></span>
																	</div>

																</div>
																<?php } ?>
																<?php
																	if(is_null($value->stok)){
																	echo "";
																}
																else{
																?>
																<div class="profile-info-row">
																	<div class="profile-info-name"></div>

																	<div class="profile-info-value">
																		<span></span>
																		<button class="btn btn-white btn-default btn-round">
																				<i class="ace-icon fa fa-plus-circle"></i>
																				<a class="tambah_data" data-toggle="modal" title="lihat gambar" data-target="#myModal" id="<?php echo $value->id; ?>">Tambah Stok</a>
																		</button>
																	</div>

																</div>
																<?php } ?>
															</div>

															<div class="hr hr-8 dotted"></div>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name">
																		<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
																	</div>

																	<div class="profile-info-value">
																		<a href="#">Find me on Facebook</a>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name">
																		<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
																	</div>

																	<div class="profile-info-value">
																		<a href="#">Follow me on Twitter</a>
																	</div>
																</div>
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-20"></div>

													<div class="row">
														<div class="col-sm-12">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-check-square-o bigger-110"></i>
																		Sinopsis
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<p style="text-align: justify;">
																			<?= $value->sinopsis ?>
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div><!-- /#home -->
								</div>
								<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align: center;">
		<div class="modal-dialog" role="document">
			<div class="modal-content" >
				<div class="modal-header">
					<button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Tambah Stok</h4>
				</div>
				<!-- memulai untuk konten dinamis -->
				<div class="modal-body" id="stok" >
				</div>
				<!-- selesai konten dinamis -->
			</div>
		</div>
</div>
<div class="modal fade" id="tambah-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
			<button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Ubah Foto Cover Buku</h4>
			</div>
			<!-- memulai untuk konten dinamis -->
			<div class="modal-body">
								<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/ubah_foto'); ?>" method="post" enctype='multipart/form-data'>
											<input name="id" type="hidden" value="<?= $value->id_buku; ?>">
											<input type="hidden" name="status" value="0">
									<h4>Foto</h5>

										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
											<input name="gambar" type="file" class="form-control" required>
										</div>
										<br>

								<div class="modal-footer" style="text-align: center;">
									<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
										<i class="ace-icon fa fa-check-square-o"></i>
										Ubah
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn btn-white btn-default btn-round" type="reset">
										<i class="ace-icon fa fa-undo"></i>
										Batal
									</button>
								</div>
								</form>
			</div>
			<!-- selesai konten dinamis -->
		</div>
    </div>
</div>
<div class="modal fade" id="editt-poto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
			<button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">Form Ubah Foto Cover Buku</h4>
			</div>
			<!-- memulai untuk konten dinamis -->
			<div class="modal-body">
								<form class="form-horizontal" role="form" action="<?php echo site_url('Buku/ubah_foto'); ?>" method="post" enctype='multipart/form-data'>
											<input name="id_gambar" type="hidden" value="<?= $value->id_gambar; ?>">
											<input name="id" type="hidden" value="<?= $value->id_buku; ?>">
											<input type="hidden" name="status" value="1">
									<h4>Foto</h5>

										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
											<input name="gambar" type="file" class="form-control" required>
										</div>
										<br>

								<div class="modal-footer" style="text-align: center;">
									<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
										<i class="ace-icon fa fa-check-square-o"></i>
										Ubah
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn btn-white btn-default btn-round" type="reset">
										<i class="ace-icon fa fa-undo"></i>
										Batal
									</button>
								</div>
								</form>
			</div>
			<!-- selesai konten dinamis -->
		</div>
    </div>
</div>
	<script>
	// ini menyiapkan dokumen agar siap grak :)
	$(document).ready(function(){
		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
		$('.tambah_data').click(function(){
			// membuat variabel id, nilainya dari attribut id pada button
			// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
			var id = $(this).attr("id");

			// memulai ajax
			$.ajax({
				url: '<?php echo base_url(); ?>Buku/tampil_ajax_edit_stok',	// set url -> ini file yang menyimpan query tampil detail data gambar
				method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
				data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
				success:function(data){		// kode dibawah ini jalan kalau sukses
					$('#stok').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_gambar">
					$('#myModal').modal("show");	// menampilkan dialog modal nya
				}
			});
		});
	});
	</script>