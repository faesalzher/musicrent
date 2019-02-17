<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MusicRent</title>


  <!-- Bootstrap core CSS -->
  /<link href="<?php echo base_url("vendor/bootstrap/css/bootstrap.css");?>" rel="stylesheet">  

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url("vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
  <script src="<?php echo base_url("js/main.js");?>"></script>


</head>
<body>
  <!------ Include the above in your HEAD tag ---------->

  <div id="wrapper" class="animate">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container">
      <?php if($this->session->userdata('akses')=='1'){?>
          <a class="navbar-brand js-scroll-trigger"  href="<?php echo base_url('index.php/admin')?>">MusicRent</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
              <?php }else{?>    
            <a class="navbar-brand js-scroll-trigger"  href="<?php echo base_url('index.php/guest#page-top')?>">MusicRent</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
            <?php }?>    
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <?php if($this->session->userdata('username')==''|| $this->session->userdata('akses')=='3'){
                ?>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-uppercase " href="<?php echo site_url('guest#barang');?>">Daftar Barang</a>
                </li>    
              <?php }  if($this->session->userdata('username') == '') {?>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-uppercase " href="<?php echo site_url('guest#login');?>">Login</a>
                </li> 
              <?php }else{
                 if($this->session->userdata('akses') == '1') {?>                
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger "><?php echo ($this->session->userdata('username'));?></a>
                </li>
                <?php }else{?>
                <li class="nav-item">
                  <a class="nav-link"><?php echo ($this->session->userdata('email'));?></a>
                </li>   
              <?php }?>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger text-uppercase " href="<?php echo site_url('guest/logout');?>">logout</a>
                </li>    
              <?php }?>    
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </body>

  </html>


