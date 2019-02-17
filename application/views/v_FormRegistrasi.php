<!DOCTYPE html>
<html lang="en">
<head>
 <title>MusicRent - Register</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">  
 <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("vendor/bootstrap/css/bootstrap.css");?>" rel="stylesheet">
  

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url("vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  
  <link href="<?php echo base_url("css/mainmenu.css");?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/animsition/css/animsition.min.css");?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/select2/select2.min.css");?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/daterangepicker/daterangepicker.css");?>">
  <link href="<?php echo base_url("css/main.css");?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
  <script src="<?php echo base_url("js/main.js");?>"></script>

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url('index.php/guest/#page-top');?>">MusicRent</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-uppercase " href="<?php echo base_url('index.php/guest#barang')?>";>Daftar Barang</a>
          </li>    
          <?php   if($this->session->userdata('username') == '') {?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-uppercase " href="<?php echo base_url('index.php/guest#login')?>">Login</a>
            </li>            
          <?php }else{
            ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger"><?php echo ($this->session->userdata('email'));?></a>
            </li>   
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-uppercase " href="<?php echo site_url('guest/logout');?>">logout</a>
            </li>   
          <?php }?>    
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-login100">
   <div class="wrap-login100 p-t-85 p-b-20">
    <span class="login100-form-title p-b-70">
      MusicRent Register
      </span>
      <?php echo form_open('guest/register');?>
     
      <div class="wrap-input100 validate-input m-t-10 m-b-50">
        <p> <?php echo form_error('username'); ?></p>
        <p> <?php if ($this->session->flashdata('cekmember')) {
          echo $this->session->flashdata('cekmember');
        } ?></p>
        <input class="input100" type="text" name="username" value="<?php echo set_value('username'); ?>" required/>
        <span class="focus-input100" data-placeholder="Username"></span>
      </div>
      <div class="wrap-input100 validate-input  m-b-50">
        <p> <?php echo form_error('email'); ?> </p>
        <input class="input100" type="text" name="email" value="<?php echo set_value('email'); ?>" required/>
        <span class="focus-input100" data-placeholder="Example@example.com"></span>
      </div>
      <div class="wrap-input100 validate-input m-b-50">
        <p> <?php echo form_error('password'); ?> </p>
        <input class="input100" type="password" name="password" value="<?php echo set_value('password'); ?>" pattern=".{8,22}" title="panjang 8-22 karakter" required/>
        <span class="focus-input100" data-placeholder="Password"></span>
      </div>
      <div class="wrap-input100 validate-input m-b-50">
        <p> <?php echo form_error('password_conf'); ?> </p>
        <input class="input100" type="password" name="password_conf" value="<?php echo set_value('password_conf'); ?>"required/>
        <span class="focus-input100" data-placeholder="Password"></span>
      </div>
      <div class="wrap-input100 validate-input  m-b-50">
       <p> <?php echo form_error('alamat'); ?> </p>
       <input class="input100" type="text"  name="alamat" value="<?php echo set_value('alamat'); ?>"required/>
       <span class="focus-input100" data-placeholder="Alamat"></span>
     </div>
     <div class="wrap-input100 validate-input  m-b-100">
       <p> <?php echo form_error('no_telp'); ?> </p>
       <input class="input100" type="text" name="no_telp" value="<?php echo set_value('no_telp'); ?>" pattern="[0-9]{8,12}" title="hanya boleh angka, panjang 8-12 karakter"/required>
       <span class="focus-input100" data-placeholder="No. Telp"></span>
     </div>
     <div class="container-login100-form-btn m-b-70 p-b-100">
       <input type="submit" name="btnSubmit" class="login100-form-btn" value = "Daftar"/>
     </div>

   </form>                         
   <?php echo form_close();?>
 </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo base_url('js/jqBootstrapValidation.js');?>"></script>
<script src="<?php echo base_url('js/contact_me.js');?>"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url('js/agency.min.js');?>"></script>
<script src="<?php echo base_url("js/main.js")?>"></script>


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