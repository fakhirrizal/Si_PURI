<script src="<?=base_url('assets/js/jquery.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
		$("#submit").click(function () {
			var kelamin = $("#jenis_kelamin");
			if (kelamin.val() == "") {
				//If the "Please Select" option is selected display error.
				alert("Harap pilih jenis kelamin!");
				return false;
			}
			return true;
		});
	});
</script>
<div class="page-header">
	<h1>
		Anggota
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Ubah Data Anggota
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<?= $this->session->flashdata('sukses') ?>
		<?php
		foreach ($variable as $key => $value) {
		?>
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="<?php echo site_url('Admin/update_anggota'); ?>" method="post" enctype='multipart/form-data'>
			<!-- #section:elements.form -->
			<h4>Nama</h5>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input name="nama" type="text" onkeyup="validHuruf(this)" maxlength="50" class="col-xs-10 col-sm-5" placeholder="Masukkan nama lengkap" required value="<?= $value->nama; ?>">
				<input name="id" type="hidden" value="<?= $value->id; ?>">
			</div>

			<h4>Nomor Anggota</h5>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
				<input name="no_anggota" type="text" maxlength="20" class="col-xs-10 col-sm-5" value="<?= $value->no_anggota; ?>" placeholder="Nomor Keanggotaan" required>
			</div>

			<h4>Tempat, Tanggal Lahir</h5>

			<div class="row">
				<div class="col-lg-5">
					<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
				<input name="tempat_lahir" value="<?= $value->tempat_lahir; ?>" type="text" class="form-control" maxlength="50" placeholder="Masukkan nama daerah tempat lahir" required>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<input name="tanggal_lahir" type="date" class="form-control" value="<?= $value->tanggal_lahir; ?>" required>
					</div>
				</div>
			</div>

			<h4>Jenis Kelamin</h5>

			<div class="row">
				<div class="col-lg-6">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-male"></i><i class="fa fa-female"></i></span>
				<select class='form-control' name="jenis_kelamin" id="jenis_kelamin">
				<option value=''>--Pilih--</option>
				<option value="Laki-laki" <?php if($value->jenis_kelamin=='Laki-laki'){echo 'selected';}else{echo '';} ?>>Laki-laki</option>
				<option value="Perempuan" <?php if($value->jenis_kelamin=='Perempuan'){echo 'selected';}else{echo '';} ?>>Perempuan</option>
				</select>
				</div>
				</div>
			</div>

			<h4>Nomor HP</h5>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
				<input name="no_hp" type="text" onkeyup="validAngka(this)" maxlength="13" class="col-xs-10 col-sm-5" value="<?= $value->no_hp; ?>" placeholder="6285696303627" required>
			</div>

			<h4>Email</h5>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input name="email" type="email" value="<?= $value->email; ?>" maxlength="50" id="cek_email" class="col-xs-10 col-sm-5" placeholder="email@the_domain" required>
			</div>
			<h4>Kata Sandi</h5>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input name="password" type="text" value="<?= $value->password; ?>" maxlength="32" class="col-xs-10 col-sm-5" placeholder="Masukkan password sementara" required>
			</div>

			<h4>Alamat Tempat Tinggal</h5>

			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
				<input name="alamat" type="text" class="form-control" maxlength="200" placeholder="Masukkan alamat sesuai KTP" required value="<?= $value->alamat; ?>">
					</div>
				</div>
			</div>

			<h4>Masa Aktif Kartu Anggota</h5>

			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<input name="masa_aktif" type="date" class="form-control" value='<?= $value->masa_aktif; ?>' required>
					</div>
				</div>
			</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-5 col-md-9">
					<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
						<i class="ace-icon fa fa-check-square-o"></i>
						Perbarui
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn btn-white btn-default btn-round" type="reset">
						<i class="ace-icon fa fa-undo"></i>
						Hapus
					</button>
				</div>
			</div>
		</form>
		<?php } ?>
<script language='javascript'>
	function validAngka(a)
	{
		if(!/^[0-9]+$/.test(a.value))
		{
		a.value = a.value.substring(0,a.value.length-1000);
		}
	}
</script>

<script language='javascript'>
	function validHuruf(a)
	{
		if(!/^[a-z, A-Z.']+$/.test(a.value))
		{
		a.value = a.value.substring(0,a.value.length-1000);
		}
	}
</script>