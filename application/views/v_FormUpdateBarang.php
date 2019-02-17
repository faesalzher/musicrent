<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url("vendor/bootstrap/css/bootstrap.css");?>" rel="stylesheet">
	<title>MusicRent - Update Barang</title>


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
</head>
<body>  <!-- Page Content -->
	<div class="limiter">
		<div class="container-login100 p-t-120 p-b-10 p-l-250 p-r-250" >       
			<div class = "limiter p-b-20">
				<h1>Update Barang</h1>
				<?php
				if($this->session->flashdata('sukses')) {
					echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
				} ?>
				<form action="<?= site_url('admin/update') ?>" method="POST" role="form"  enctype="multipart/form-data">
					<div class="form-group">
						<label for="id_barang" class="control-label col-xs-2">ID Barang</label>
						<div class="col-xs-10">
							<label for="id_barang" class="control-label col-xs-2"><?php echo $entry->id_barang; ?></label>
							<input type="hidden" class="form-control" name="id_barang" placeholder="ID Barang" value="<?php echo $entry->id_barang; ?>" pattern=".{4}" title="harus 4 karakter" required>
						</div>
					</div>
					<div class="form-group">
						<label for="judul" class="control-label col-xs-2">Judul</label>
						<div class="col-xs-10">			
							<input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $entry->judul; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="jenis" class="control-label col-xs-2">Jenis</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="jenis" placeholder="Jenis" value="<?php echo $entry->jenis; ?>" requiredd>
						</div>
					</div>  
					<div class="form-group">
						<label for="harga_sewa" class="control-label col-xs-2">Harga Sewa</label>
						<div class="col-xs-10">
							<input type="text" class="form-control" name="harga_sewa" placeholder="Harga Sewa" value="<?php echo $entry->harga_sewa; ?>" pattern="[0-9]{1,}" title="harus berupa nominal angka" required>
						</div>
					</div>
					<div class="form-group">
						<label for="deskripsi" class="control-label col-xs-2">Deskripsi</label>
						<div class="col-xs-10">
							<textarea rows="5" class="form-control"  cols="100" name="deskripsi"  placeholder="Deskripsi" required><?php echo $entry->deskripsi; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="gambar" class="control-label col-xs-2">Gambar</label>
						<div class="col-xs-10">
							<div class="col-md-4">
								<!-- Gambar -->						
								<!-- Gambar -->
							</div>

						</div>
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
					<div>
						<span class="btn btn-default btn-file">
							<input type="file" name="gambar" required></span>
						</div>

						<!-- Gambar -->
						<div class="form-group p-t-50">
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
