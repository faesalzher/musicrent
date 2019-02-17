<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("vendor/bootstrap/css/bootstrap.css");?>" rel="stylesheet">
  
  <title>MusicRent - Tambah Barang</title>

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
  <link href="<?php echo base_url("css/admin.css");?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
  <script src="<?php echo base_url("js/main.js");?>"></script>
</head>
<body>  
  <div class="limiter">
    <div class="container-login100 p-t-120 p-b-10 p-l-250 p-r-250" >       
      <div class = "limiter p-b-20">
       <h1>Tambah Barang </h1>
       <?php
       if($this->session->flashdata('sukses')) {
        echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
      } ?>
      <form action="<?= site_url('admin/tambah_barang') ?>" method="POST" role="form"  enctype="multipart/form-data">         
        <div class="form-group">
          <label for="judul" class="control-label col-xs-2">Judul</label>
          <div class="col-xs-10">
            <input type="text" class="form-control" name="judul" placeholder="Judul" required>
          </div>
        </div>
        <div class="form-group">
          <label for="jenis" class="control-label col-xs-2">Jenis</label>
          <div class="col-xs-10">
           <input type="text" class="form-control" name="jenis" placeholder="Jenis" required>
         </div>
       </div>  
       <div class="form-group">
        <label for="harga_sewa" class="control-label col-xs-2">Harga Sewa</label>

        <div class="col-xs-10">
          <input type="text" class="form-control" name="harga_sewa" placeholder="Harga Sewa" pattern="[0-9]{1,}" title="hanya boleh angka"/required>
        </div>
      </div>
      <div class="form-group">
        <label for="deskripsi" class="control-label col-xs-2">Deskripsi</label>
        <div class="col-xs-10">
          <textarea rows="5" class="form-control"  cols="100" name="deskripsi"  placeholder="Deskripsi" required></textarea>
        </div>
      </div>

      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
      <div>
        <span class="btn btn-default btn-file">
          <input type="file" name="gambar"></span>                
        </div>
        <div class="form-group p-t-50 p-b-100">
          <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>

</html>
