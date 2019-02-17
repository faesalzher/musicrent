<!DOCTYPE html>
<html lang="en">
<head>
  <title>MusicRent - Penyewaan</title>
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
  <link href="<?php echo base_url("css/admin.css");?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
  <script src="<?php echo base_url("js/main.js");?>"></script>
</head>
<body>
  <!-- Form -->

  <div class="container-login100">
    <div class="wrap-login100 p-t-85 p-b-20">      
      <span class="login100-form-title">
        Isi Kolom Berikut          
      </span>      
      <?php echo form_open('member/cek_ketersediaan/'.$entry->id_barang);?>

      <center>
        <label for = "id_barang" class = "control-label col-xs-2">ID barang : <?php echo $entry->id_barang; ?></label>
        <div class="alert" style="text-align: center; " role="alert">          
          <?php
          if ($this->session->flashdata('ketersediaan')) {
            echo '<p class="alert alert-success" style="margin: 10px 20px;">' . $this->session->flashdata('ketersediaan') . '</p>';
          }?>            
        </div>
      </center>
      <input type="hidden" name="id_barang" placeholder="ID Barang" value="<?php echo $entry->id_barang; ?>"/>
      <div class="wrap-input100 m-t-85 m-b-35">
        tanggal pemesanan
        <input required type="date" class="wrap-input100" name="tanggal" min="<?php echo date('Y-m-d');?>" aria-describedby="button-addon2"/ >           
      </div>
      <div class="wrap-input100 validate-input m-b-50">
        <input class="input100" type="text" name="nama_penyewa" value="<?php echo set_value('nama_penyewa'); ?>" pattern="[A-Z,a-z]{}" title="hanya boleh alfabet" required/>
        <span class="focus-input100" data-placeholder="Nama Penyewa"></span>
      </div>
      <div class="wrap-input100 validate-input m-b-50">
        <input class="input100" type="text" name="no_ktp"  value="<?php echo set_value('no_ktp'); ?>" pattern="[0-9]{16}" title="hanya boleh angka, panjang 16 karakter"/required>
        <span class="focus-input100" data-placeholder="No.KTP Penjamin"></span>
      </div>

      <div class="wrap-input100 validate-input m-b-50">
        <input class="input100" type="text" name="alamat_sewa" value="<?php echo set_value('alamat_sewa'); ?>"required/>
        <span class="focus-input100" data-placeholder="Alamat Lengkap"></span>
      </div>
      <!-- Tombol -->
      <div class="container-login100-form-btn p-b-100">
        <button type="submit" class="login100-form-btn" >
          Booking
        </button>
      </div>
    </form>
    <?php echo form_close();?>

    <!-- Alert -->

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