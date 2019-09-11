<script type="text/javascript" src="<?=base_url('assets/js/jquery.js');?>"></script>

<div class="page-header">
	<h1>
		Author
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Tambah Data
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="col-sm-12">
			<div class="tab-content">
					<div class="alert alert-block alert-success">
						<strong class="red">* </strong>Wajib diisi
					</div>

					<form class="form-horizontal" role="form" action="<?php echo site_url('Author/simpan_author'); ?>" method="post" enctype='multipart/form-data'>
							<!-- #section:elements.form -->
						<h4>Nama Author <strong class="red">* </strong></h4>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input name="nama" type="text" onkeyup="validHuruf(this)" maxlength="50" class="form-control" placeholder="Masukkan nama Author beserta gelar" required>
						</div>

						<h4>Tanggal Lahir</h5>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input name="tanggal_lahir" type="date" class="form-control">
						</div>

						<h4>Asal</h5>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
							<input name="asal" type="text" onkeyup="validHuruf(this)" maxlength="50" class="form-control" placeholder="Bisa asal kota atau kewarganegaraannya">
						</div>

						<h4>Tipe Author <strong class="red">* </strong></h5>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<select name="tipe" class="form-control" id="tipe">
								<option value="">--Pilih--</option>
								<option value="p">Personal Name</option>
								<option value="o">Organizational Body</option>
								<option value="c">Conference</option>
							</select>
						</div>
						<div class="clearfix form-actions">
							<div class="col-md-offset-4 col-md-10">
								<button class="btn btn-white btn-default btn-round" type="submit" id="submit">
									<i class="ace-icon fa fa-check-square-o"></i>
									Simpan
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn btn-white btn-default btn-round" type="reset">
									<i class="ace-icon fa fa-undo"></i>
									Hapus
								</button>
							</div>
						</div>
					</form>
			</div>
		</div>
<script type="text/javascript">
	$(function () {
		$("#submit").click(function () {
			var tipe = $("#tipe");
			if (tipe.val() == "") {
				//If the "Please Select" option is selected display error.
				alert("Harap pilih tipe author!");
				return false;
			}
			return true;
		});
	});
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