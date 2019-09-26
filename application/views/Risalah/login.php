<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Admin Login</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/plugins/select2/css/select2-bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/global/css/components.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
		<link href="<?=base_url('assets2/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets2/pages/css/login-4.min.css');?>" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="<?=base_url()?>assets/images/logo.ico">
		<style>
		.page-bg {
			background-image: url("https://asset.kompas.com/crop/0x0:0x0/780x390/data/photo/2011/04/02/1028333620X310.jpg");
			-webkit-filter: blur(99px);
			-moz-filter: blur(99px);
			-o-filter: blur(99px);
			-ms-filter: blur(99px);
			filter: blur(99px);
			position: fixed;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			z-index: -1;

		}    	
		</style>
	</head>

	<body class=" login">
		<div class="page-bg"></div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="content">
			<div style="text-align: center">
				<a href="#">
				<!--     <img src="<?=base_url('assets2/pages/img/logo-big.png');?>" alt="" /> </a> -->
					<img src="<?=base_url('assets3/images/logo_risalah.png');?>" width="100" alt='Si-PURI | Risalah'/>
				</a>
			</div>
			<form class="login-form" action="<?php echo site_url('Risalah/masuk'); ?>" method="post">
				<div>
					<h5><?= $this->session->flashdata('error') ?></h5>
				</div>
				<h3 class="form-title">Login Admin,</h3>
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span> Enter any username and password. </span>
				</div>
				<div class="form-group">
					<label class="control-label">Email</label>
					<div class="input-icon">
						<i class="fa fa-envelope"></i>
						<input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" maxlength="50" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Kata Sandi</label>
					<div class="input-icon">
						<i class="fa fa-lock"></i>
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Kata Sandi" name="password" maxlength="20" />
					</div>
				</div>
				<div class="form-actions">
					<label class="rememberme mt-checkbox mt-checkbox-outline">
						<input type="checkbox" name="remember" value="1" /> Ingat saya
						<span></span>
					</label>
					<button type="submit" class="btn green pull-right"> Masuk </button>
				</div>
				<div class="forget-password">
					<!-- <h4>Forgot your password ?</h4>
					<p> no worries, click
						<a href="javascript:;" id="forget-password"> here </a> to reset your password. </p> -->
				</div>
			</form>
			<form class="forget-form" action="<?php echo site_url('Risalah/admin'); ?>" method="post">
				<h3>Forget Password ?</h3>
				<p> Enter your e-mail address below to reset your password. </p>
				<div class="form-group">
					<div class="input-icon">
						<i class="fa fa-envelope"></i>
						<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" maxlength="50" />
					</div>
				</div>
				<div class="form-actions">
					<button type="button" id="back-btn" class="btn red btn-outline">Back </button>
					<button type="submit" class="btn green pull-right"> Submit </button>
				</div>
			</form>
		</div>
		<div class="copyright"> 2019 &copy; Si-PURI. </div>
		<script src="<?=base_url('assets2/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/jquery-validation/js/additional-methods.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/select2/js/select2.full.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/plugins/backstretch/jquery.backstretch.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/scripts/app.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/pages/scripts/login-4.min.js');?>" type="text/javascript"></script>
	</body>
</html>