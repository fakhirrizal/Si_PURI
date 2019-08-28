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
					<strong>8 MB</strong> (default file size is unlimited). </li>
				<li> Only image files (
					<strong>JPG, JPEG, PNG, BMP</strong>) are allowed in this demo (by default there is no file type restriction). </li>
				<li> Uploaded files will be deleted automatically after
					<strong>5 minutes</strong> (demo setting). </li>
			</ul>
		</div>
	</div>
</div>
<div class="portlet light bordered">
	<div class="portlet-body form">
	<?php
	foreach ($data_risalah as $key => $value) {
	?>
		<form class="form-horizontal" role="form" action="<?php echo site_url('Risalah/ubah_risalah'); ?>" method="post" enctype='multipart/form-data'>
			<div class="form-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-md-line-input has-info form-md-floating-label">
							<div class="input-icon">
								<input type="text" name="nomor" class="form-control" required value="<?= $value->nomor_risalah; ?>">
								<input type="hidden" name="id" value="<?= $value->id_risalah; ?>">
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
								<input type="text" name="nama_acara" class="form-control" required value="<?= $value->nama_acara; ?>">
								<label for="form_control_1">Nama acara/ agenda</label>
								<span class="help-block">Ini berguna sebagai judul risalah</span>
								<i class="fa fa-list"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group form-md-line-input has-error form-md-floating-label">
							<div class="input-icon">
								<label for="form_control_1">Tanggal pelaksanaan</label>
								<input type="date" name="tanggal" class="form-control" required value="<?= $value->tanggal_acara; ?>">
								<span class="help-block">Format : tanggal/bulan/tahun</span>
								<i class="fa fa-calendar-o"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group form-md-line-input has-success form-md-floating-label">
							<div class="input-icon">
								<label for="form_control_1">Isi Risalah</label>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group form-md-line-input has-success form-md-floating-label">
							<div class="input-icon">
							<textarea class="form-control" rows="3" name="isi" placeholder="Isikan secara rinci bentuk kegiatannya"><?= $value->isi_risalah; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group form-md-line-input has-success form-md-floating-label">
							<div class="input-icon">
								<label for="form_control_1">Link Video</label>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="input-group input-icon right">
							<span class="input-group-addon">
								<i class="fa fa-file-video-o fileinput-exists font-purple"></i>
							</span>
							<i class="fa fa-exclamation tooltips" data-toggle="modal" data-target="#myModal" data-container="body"></i>
							<input id="email" class="input-error form-control" type="text" value='<?= $value->link; ?>' name="link">
						</div>
					</div>
				</div>
			</div>

			<div class="form-actions noborder">
				<button type="submit" class="btn blue">Perbarui</button>
				<button type="reset" class="btn default">Batal</button>
			</div>
		</form>
	<?php } ?>
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