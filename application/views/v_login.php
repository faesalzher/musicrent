<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login MusicRent</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="<?php echo base_url("vendor/bootstrap/css/bootstrap.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("fonts/font-awesome-4.7.0/css/font-awesome.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("fonts/iconic/css/material-design-iconic-font.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/animate/animate.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/css-hamburgers/hamburgers.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/animsition/css/animsition.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/select2/select2.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/daterangepicker/daterangepicker.css");?>">
	<link href="<?php echo base_url("css/mainn.min.css");?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
	<script src="<?php echo base_url("js/main.js");?>"></script>
</head>
<div>        
	<?php
	if ($this->session->flashdata('ketersediaan')) {
		echo '<p class="warning">' . $this->session->flashdata('ketersediaan') . '</p>';
	}?>            
</div>
<div class="background">
	<div class="container-login100">
		<div class="wrap-login100 p-t-85 p-b-20">
			<?php echo form_open('guest/login');?>
			<span class="login100-form-title p-b-70">
				MusicRent Login
			</span>
			<center>
				<div class="alert" style="text-align: center; " role="alert">					
					<?php // Cetak jika ada notifikasi
					if($this->session->flashdata('ceklogin')) {
						echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('ceklogin').'</p>';
					}				// Cetak jika ada notifikasi
					if($this->session->flashdata('sukses')) {
						echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
					}
					?>
				</div>
			</center>
			<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
				<input class="input100" type="text" name="username" required/>
				<span class="focus-input100" data-placeholder="username" name=></span>
			</div>

			<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
				<input class="input100" type="password" name="password" required/>
				<span class="focus-input100" data-placeholder="Password"></span>
			</div>

			<div class="container-login100-form-btn">
				<button class="login100-form-btn">Login	</button>
			</div>			
			<ul class="login-more p-t-190">
				<li class="m-b-8">
					<span class="txt1">
						Forgot
					</span>
					<a href="#" class="txt2">Username / Password?/a>
					</li>
					<li>
						<span class="txt1">	Don’t have an account?</span>
						<a href="#" class="txt2">Sign up</a>
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>





<script src="<?php echo base_url("vendor/jquery/jquery-3.2.1.min.js")?>"></script>
<script src="<?php echo base_url("vendor/animsition/js/animsition.min.js")?>"></script>
<script src="<?php echo base_url("vendor/bootstrap/js/popper.js")?>"></script>
<script src="<?php echo base_url("vendor/bootstrap/js/bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("vendor/select2/select2.min.js")?>"></script>
<script src="<?php echo base_url("vendor/daterangepicker/moment.min.js")?>"></script>
<script src="<?php echo base_url("vendor/daterangepicker/daterangepicker.js")?>"></script>
<script src="<?php echo base_url("vendor/countdowntime/countdowntime.js")?>"></script>
<script src="<?php echo base_url("js/main.js")?>"></script>

</body>
</html>