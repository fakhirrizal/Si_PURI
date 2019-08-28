<h3 class="page-title"> Form Input
	<small>data risalah</small>
</h3>
<div class="portlet-title">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Catatan</h3>
		</div>
		<div class="panel-body">
			<ul>
				<li> The maximum file size for uploads in this demo is
					<strong>5 MB</strong> (default file size is unlimited). </li>
				<li> Only image files (
					<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction). </li>
				<li> Uploaded files will be deleted automatically after
					<strong>5 minutes</strong> (demo setting). </li>
			</ul>
		</div>
	</div>
</div>
<div class="portlet light bordered">
	<div class="portlet-body form">
		<form class="form-horizontal" role="form" action="<?php echo site_url('Risalah/simpan_risalah'); ?>" method="post" enctype='multipart/form-data'>
			<div class="form-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-md-line-input has-info form-md-floating-label">
							<div class="input-icon">
								<input type="text" name="nomor" class="form-control" required>
								<label for="form_control_1">Nomor risalah</label>
								<span class="help-block">Format : xx/xxxx/xxxx/xx</span>
								<i class="fa fa-bell-o"></i>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group form-md-line-input has-warning form-md-floating-label">
							<div class="input-icon">
								<input type="text" name="nama_acara" class="form-control" required>
								<label for="form_control_1">Nama acara/ agenda</label>
								<span class="help-block">Ini berguna sebagai judul risalah</span>
								<i class="fa fa-list"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success">
					<label class="col-md-2 control-label" for="form_control_1">Isi risalah</label>
					<div class="col-md-10">
						<textarea class="form-control" rows="3" name="isi" placeholder="Isikan secara rinci bentuk kegiatannya" style="margin: 0px 18.9844px 0px 0px; height: 97px; width: 835px;"></textarea>
						<div class="form-control-focus"> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-md-line-input has-error form-md-floating-label">
							<div class="input-icon">
								<label for="form_control_1">Tanggal pelaksanaan</label>
								<input type="date" name="tanggal" class="form-control" required>
								<span class="help-block">Format : tanggal/bulan/tahun</span>
								<i class="fa fa-calendar-o"></i>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-md-line-input has-warning form-md-floating-label">
							<div class="input-group">
								<span class="input-group-btn btn-left">
								</span>
								<div class="input-group-control">
									<input type="text" class="form-control edited" readonly value=".pdf">
									<label for="form_control_1">Ekstensi File PDF</label>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="col-md-4">
						<div class="form-group form-md-line-input has-error form-md-floating-label">
							<div class="input-group">
								<span class="input-group-btn btn-left">
								</span>
								<div class="input-group-control">
									<input type="text" class="form-control edited" readonly value=".mp3">
									<label for="form_control_1">Ekstensi File Audio</label>
								</div>
							</div>
						</div>
					</div> -->
					<div class="col-md-4">
						<div class="form-group form-md-line-input has-info form-md-floating-label">
							<div class="input-group">
								<span class="input-group-btn btn-left">
								</span>
								<div class="input-group-control">
									<input type="text" class="form-control edited" readonly value=".jpg/ .png/ .bmp/ .jpeg">
									<label for="form_control_1">Ekstensi File Foto</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<label class="control-label col-md-3"><b>File PDF</b></label>
						<div class="col-md-3">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="input-group input-large">
									<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
										<i class="fa fa-file-pdf-o fileinput-exists"></i>&nbsp;
										<span class="fileinput-filename"></span>
									</div>
									<span class="input-group-addon btn default btn-file yellow">
										<span class="fileinput-new"> Pilih file </span>
										<span class="fileinput-exists"> Ubah </span>
										<input type="hidden"><input type="file" name="file" accept="application/pdf" required> </span>
									<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="row">
				<div class="form-group">
				<label class="control-label col-md-3"><b>File Audio</b></label>
				<div class="col-md-3">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="input-group input-large">
								<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
									<i class="fa fa-file-audio-o fileinput-exists"></i>&nbsp;
									<span class="fileinput-filename"></span>
								</div>
								<span class="input-group-addon btn default btn-file purple">
									<span class="fileinput-new"> Select file </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="hidden"><input type="file" name="audio" required accept="audio/*"> </span>
								<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
				</div>
				</div>
				</div> -->
				<div class="row">
				<div class="form-group">
				<label class="control-label col-md-3"><b>Link Video</b></label>
				<div class="col-md-3">
					<div class="input-group input-icon right">
						<span class="input-group-addon">
							<i class="fa fa-file-video-o fileinput-exists font-purple"></i>
						</span>
						<i class="fa fa-exclamation tooltips" data-toggle="modal" data-target="#myModal" data-container="body"></i>
						<input id="email" class="input-error form-control" type="text" name="link">
					</div>
				</div>
				</div>
				</div>
				<div class="row fileupload-buttonbar">
				<label class="control-label col-md-3"><b>File Foto</b></label>
					<div class="col-md-3">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
							<div>
								<span class="btn default btn-file">
									<span class="fileinput-new"> Pilih gambar </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="file" name="foto[]" multiple="" required accept="image/*"> </span>
								<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
							<div>
								<span class="btn default btn-file">
									<span class="fileinput-new"> Pilih gambar </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="file" name="foto[]" multiple="" accept="image/*"> </span>
								<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
							<div>
								<span class="btn default btn-file">
									<span class="fileinput-new"> Pilih gambar </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="file" name="foto[]" multiple="" accept="image/*"> </span>
								<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row fileupload-buttonbar">
				<label class="control-label col-md-3"></label>
					<div class="col-md-3">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
							<div>
								<span class="btn default btn-file">
									<span class="fileinput-new"> Pilih gambar </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="file" name="foto[]" multiple="" accept="image/*"> </span>
								<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
							<div>
								<span class="btn default btn-file">
									<span class="fileinput-new"> Pilih gambar </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="file" name="foto[]" multiple="" accept="image/*"> </span>
								<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
						
					
					</div>
					<div class="col-md-3">
						
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""> </div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
							<div>
								<span class="btn default btn-file">
									<span class="fileinput-new"> Pilih gambar </span>
									<span class="fileinput-exists"> Ubah </span>
									<input type="file" name="foto[]" multiple="" accept="image/*"> </span>
								<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
							</div>
						</div>
						
					
					</div>
				</div>
			</div>
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Menyematkan video</h4>
					</div>
					<div class="modal-body">
					<ol>
						<li>Di komputer, buka video YouTube yang ingin disematkan.</li>
						<li>Di bawah video, klik <strong>BAGIKAN</strong> <img src="https://png.pngtree.com/svg/20160222/57b775c38b.svg" width='5%' alt="Bagikan" title="Bagikan">.</li>
						<li>Klik <strong>Sematkan</strong>.</li>
						<li>Dari kotak yang muncul, salin kode HTML.</li>
					</ol>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
					</div>

				</div>
			</div>

			<div class="form-actions noborder">
				<button type="submit" class="btn blue">Simpan</button>
				<button type="reset" class="btn default">Hapus</button>
			</div>
		</form>
	</div>
</div>