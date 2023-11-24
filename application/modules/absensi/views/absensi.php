<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Absensi | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>assets/dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/iCheck/square/blue.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/plugin/screen.css">

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<b>Absensi</b>Univ
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Masukkan NIM dan ttd digital <small>( maksimal 1mb) </small></p>
			<?= @$error;?>
			<?= $this->session->flashdata('message');?>
			<?= form_open_multipart('absensi/validate_absen');?>
			<!-- <form id="form-login" action="<?=site_url('absensi/validate_absen')?>" method="post"> -->
				<div class="form-group has-feedback">
					<input type="text" id="nim" name="nim" maxlength="20" class="form-control" placeholder="NIM" data-rule-required="true" data-rule-minlength="4" data-msg-required="NIM masih kosong, silakan isi" data-msg-minlength="NIM minimal 4 karakter" data-msg-maxlength="NIM maksimal 20 karakter">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="file" id="ttd_digital" name="ttd_digital" class="form-control">
					<span class="glyphicon glyphicon-file form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-xs-8">
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
					<!-- /.col -->
				</div>
				<?= form_close(); ?>
			<!-- </form> -->

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?=base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
	<script src="<?php echo base_url();?>/assets/backend/js/plugin/jquery.validate.js"></script>
	<script src="<?php echo base_url();?>/assets/backend/js/plugin/additional-methods.min.js"></script>

	<script>
		$(document).ready(function(){
			$("#form-login").validate({
				onkeyup: false,
				})
			})
	</script>
</body>

</html>
