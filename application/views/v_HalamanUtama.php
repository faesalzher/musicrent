<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MusicRent - Main Page</title>

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

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">MusicRent</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-uppercase" href="#barang">Daftar Barang</a>
          </li>    
          <?php   if($this->session->userdata('username') == '') {?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-uppercase" href="#login">Login</a>
            </li>            
          <?php }else{
           if($this->session->userdata('akses') == '1'){?>
            ?>            
            <li class="nav-item">
              <a class="nav-link"><?php echo ucfirst($this->session->userdata('username'));?></a>
            <?php }else{?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger"><?php echo ($this->session->userdata('email'));?></a>
              </li> 
            <?php }?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-uppercase" href="<?php echo site_url('guest/logout');?>">logout</a>
            </li>   
          <?php }?>    
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To</div>
        <div class="intro-heading text-uppercase">MusicRent</div>
        <?php   if($this->session->userdata('username') == '') {?>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#login">login ?</a>
          <?php }else{?>
            <a class="btn btn-primary btn-xl js-scroll-trigger">Hello, <?php echo ($this->session->userdata('username'));?> ! </a>
          <?php }?>
        </div>
      </div>
    </header>

    <!-- barang Grid -->
    <section class="bg-light" id="barang">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">          
            <h2 class="section-heading text-uppercase">Daftar Barang</h2>
            <hr>         
          </div>
        </div>
        <div class="row">
          <?php foreach ($barang as $m){?>
            <div class="col-md-4 col-sm-6 barang-item">
              <a class="barang-link" data-toggle="modal" href="#porfolioModal<?php echo $m->id_barang; ?>">
                <div class="barang-hover">
                  <div class="barang-hover-content">
                    <i class="fas fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="<?php echo base_url("./assets/gambar_barang/$m->gambar");?>" alt="">              
              </a>
              <div class="barang-caption">
                <h4><?php echo $m->judul;?></h4>
                <p class="text-muted">Rp. <?php echo $m->harga_sewa;?></p>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    </section>

    <!-- Login -->
    <?php   if($this->session->userdata('username') == '') {?>
      <section id="login" class="container-login100 p-t-100">
        <div class="wrap-login100">
          <?php echo form_open('guest/login');?>
          <span class="login100-form-title p-b-100">
            MusicRent Login
          </span>
          <center>
            <div class="alert" style="text-align: center; " role="alert">         
          <?php // Cetak jika ada notifikasi
          if($this->session->flashdata('ceklogin')) {
            echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('ceklogin').'</p>';
          }       // Cetak jika ada notifikasi
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
        <button class="login100-form-btn">Login </button>
      </div>      
      <ul class="login-more p-t-60">
        <li class="m-b-100">          
          <span class="txt1"> Don’t have an account?</span>
          <a href="<?php echo base_url('index.php/guest/register');?>" class="txt2">Register</a>
        </li>
      </ul>
    </form>
  </div>
</section>
<?php }?>
<!-- Modal 1 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<?php foreach ($barang as $m){?>
  <div class="barang-modal modal fade" id="porfolioModal<?php echo $m->id_barang; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase"><?php echo $m->judul; ?></h2>
                <p class="item-intro text-muted">ID : <?php echo $m->id_barang?></p>
                <img class="img-fluid mb-5" src="<?php echo base_url("./assets/gambar_barang/$m->gambar");?>"alt="">
                <h6>--------------------------<?php echo $m->jenis; ?>--------------------------</h6>                 
                <h4>Rp. <?php echo $m->harga_sewa; ?>,-</h4>
                <p class="mb-5"><?php echo $m->deskripsi?></p>
                <button>
                  <a class="btn btn-primary" href="<?php echo base_url('index.php/member/halaman_sewa/' . $m->id_barang); ?>"> <i class="far fa-bookmark"></i> Book  </a>
                </button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">                      
                  <i class="fas fa-times"></i>
                Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>


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


</body>

</html>
