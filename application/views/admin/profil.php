<!-- /section:settings.box -->
<style type="text/css">
	* {margin:0; padding: 0;}

/* Jendela Pop Up */
#popup {
	width: 100%;
	height: 100%;
	position: fixed;
	background: rgba(0,0,0,.7);
	top: 0;
	left: 0;
	z-index: 9999;
	visibility: hidden;
}

.window {
	width: 400px;
	height: 120px;
	background: #fff;
	border-radius: 10px;
	position: relative;
	padding: 10px;
	text-align: center;
	margin: 15% auto;
}
.window h2 {
	margin: 30px 0 0 0;
}
/* Button Close */
.close-button {
width: 25px;
height: 25px;
background: #000;
border-radius: 50%;
border: 3px solid #fff;
display: block;
text-align: center;
color: #fff;
text-decoration: none;
position: absolute;
top: -10px;
right: -10px;
}

/* Memunculkan Jendela Pop Up*/
#popup:target {
	visibility: visible;
}
</style>


<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>-->
<div class="page-header">
	<h1>
	Setting <small>
	<i class="ace-icon fa fa-angle-double-right"></i>
	Profile </small>
	</h1>
</div>
<!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
<script type="text/javascript">
 window.onload = function () {
  document.getElementById("pw1").onchange = validatePassword;
  document.getElementById("pw2").onchange = validatePassword;
 }
 function validatePassword(){
  var pass2=document.getElementById("pw2").value;
  var pass1=document.getElementById("pw1").value;
  if(pass1!=pass2)
   document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Harap Ulangi Lagi");
  else
  document.getElementById("pw2").setCustomValidity('');
 }
</script>
<?php
foreach ($profil as $key => $value) {
?>

<div class="error">
<?= validation_errors() ?>
<?= $this->session->flashdata('error') ?>
<?= $this->session->flashdata('sukses') ?>
</div>
<div class="col-sm-12 widget-container-col">
	<div class="widget-box transparent">
		<div class="widget-header">
			<h4 class="widget-title lighter">Pengaturan Akun</h4>
			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="myTab2">
					<li class="active">
						<a data-toggle="tab" href="#info1">Ubah Profil</a>
					</li>
					<li >
						<a data-toggle="tab" href="#info2">Ubah Kata Sandi</a>
					</li>
					<li>
						<a data-toggle="tab" href="#info3">Ubah Email</a>
					</li>
					
					<!--<li>
						<a data-toggle="tab" href="#info3">Pengaturan Notifikasi</a>
					</li>-->
				</ul>
			</div>
		</div>
		<div class="widget-body">
			<div class="widget-main padding-12 no-padding-left no-padding-right">
				<div class="tab-content padding-4">
					<div id="info1" class="tab-pane in active">
						<div class="scrollable" data-size="100">
							<div class="panel-body">
															<h4 class="header blue bolder smaller">Foto Profil</h4>
															<form action="<?php echo site_url('Admin/ubah_foto'); ?>" role="form" enctype='multipart/form-data' method="post">
															<div class="row">
																<div class="col-xs-12 col-sm-4">
																	<label class="ace-file-input ace-file-multiple"><input type="file" name="foto"><span class="ace-file-container" data-title="Change avatar"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-picture-o"></i></span></span></label>
																	<button type="submit" class="btn btn-green custom-1">Ubah Foto Profil</button>
																</div>
																
															</div>
															</form>
															

															
															<div class="space"></div>
															<h4 class="header blue bolder smaller">Informasi Umum</h4>
															<form action="<?php echo site_url('Admin/ubah_profil'); ?>" method="post">
															
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Tempat Lahir</label>

																<div class="col-sm-9">
																	<div class="input-icon">
																		<input type="text" value="<?= $value->tempat_lahir; ?>" name="tempat_lahir" placeholder="Masukkan nama daerah tempat lahir Anda" class="form-control">
																	</div>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Tanngal Lahir</label>

																<div class="col-sm-9">
																	<div class="input-icon">
																		<input type="date" value="<?= $value->tanggal_lahir; ?>" name="tanggal_lahir" class="form-control">
																	</div>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Alamat</label>

																<div class="col-sm-9">
																	<div class="input-icon">
																		<input type="text" value="<?= $value->alamat; ?>" name="alamat" placeholder="Masukkan alamat Anda sesuai KTP" class="form-control">
																	</div>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">No. HP</label>

																<div class="col-sm-9">
																	<div class="input-icon">
																		<input type="text" value="<?= $value->no_hp; ?>" class="form-control" name='no_hp' placeholder='Masukkan hanya angka' onkeyup="validAngka(this)">
																	</div>
																</div>
															</div>
														
															<button type="submit" class="btn btn-green custom-1">Simpan</button>
															<button type="reset" class="btn btn-green custom-1">Hapus</button>
															</form>

															
							</div>
						</div>
					</div>

					<div id="info2" class="tab-pane ">
						<!-- #section:custom/scrollbar.horizontal -->
						<div class="scrollable-horizontal" data-size="800">
							<form action="<?php echo site_url('Admin/ubah_password'); ?>" method="post">
									<div class="form-group clearfix">
										<label class="col-lg-3 control-label">Kata Sandi Saat Ini</label>
										<div class="col-lg-6">
											<input type="password" name="password" class="form-control" minlength="5" maxlength="50" required>
											<label class="error error-current_password"></label>
										</div>
									</div>
									<div class="clearfix"></div>
									<br>
									<div class="form-group clearfix">
										<label class="col-lg-3 control-label">Kata Sandi Baru</label>
										<div class="col-lg-6">
											<input type="password" name="new_password" class="form-control" id="pw1" minlength="5" maxlength="50" required>
											<label class="error-new_password"></label>
										</div>
									</div>
									<div class="clearfix"></div>
									<br>
									<div class="form-group clearfix">
										<label class="col-lg-3 control-label">Ulangi Kata Sandi</label>
										<div class="col-lg-6">
											<input type="password" name="re_new_password" class="form-control" id="pw2" minlength="5" maxlength="50" required>
											<span class="error error-re_password"></span>
										</div>
									</div>
									<br>
									<br>
									<div class="form-group clearfix">
										<div class="box-content right">
											<button type="submit" class="btn btn-green custom-1">Simpan</button>
										</div>
									</div>
							</form>
						</div>
						<!-- /section:custom/scrollbar.horizontal -->
					</div>
					
					<div id="info3" class="tab-pane">
						<div class="scrollable" data-size="100">
							<div class="panel-body">
								<span id="alert_email"></span>
								<form action="<?php echo site_url('Admin/ubah_email'); ?>" method="post">
									<div class="form-group clearfix">
										<label class="col-lg-3 control-label">Email Baru</label>
										<div class="col-lg-6">
											<input name="email" class="form-control" type="email" maxlength="50">
											<label class="error error-email"></label>
										</div>
									</div>
									<div class="clearfix"></div>
									<br>
									<div class="form-group clearfix">
										<label class="col-lg-3 control-label">Kata Sandi Saat Ini</label>
										<div class="col-lg-6">
											<input type="password" name="_password" class="form-control" minlength="5" maxlength="50">
											<span class="error error-password"></span>
										</div>
									</div>
									<div class="clearfix"></div>
									<br>
									<div class="form-group clearfix">
										<div class="box-content right">
											<button type="submit" class="btn btn-green custom-1">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>
<script language='javascript'>
                    function validAngka(a)
                    {
                        if(!/^[0-9]+$/.test(a.value))
                        {
                        a.value = a.value.substring(0,a.value.length-1000);
                        }
                    }
</script> 