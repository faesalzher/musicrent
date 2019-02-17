<!DOCTYPE html>
<html lang="en">
<head>
	<title>MusicRent - Admin Main Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

	<link href="<?php echo base_url("css/mainmenu.css");?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/animsition/css/animsition.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/select2/select2.min.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/daterangepicker/daterangepicker.css");?>">
	<link href="<?php echo base_url("css/admin.css");?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css');?>">
	<script src="<?php echo base_url("js/main.js");?>"></script>
</head>
<body>

	<!-- Form -->
	<div class="limiter">
		<div class="container-login100 p-t-120 p-b-10 p-l-250" >
			<?php if($this->session->flashdata('sukses')) {
				echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
			} ?>       
			<div class = "limiter p-b-20">
				<a class="btn btn-primary" href="<?php echo base_url('index.php/admin/halaman_tambah_barang'); ?>">Tambah Barang</a>	
				<a class="btn btn-primary pull-right" href="<?php echo base_url('index.php/admin/halaman_permintaan'); ?>">Lihat Permintaan</a>
			</div>		
			<hr>

			<?php foreach($barang as $m){ ?>

				<!-- Project One -->
				<div class="row">
					<div class="col-md-2">
						<!-- Gambar -->
						<td><img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo base_url("./assets/gambar_barang/$m->gambar");?>" alt=""></td>
						<!-- Gambar -->
					</div>
					<!-- Keterangan -->
					<div class="col-md-6">
						<h6>ID : <?php echo $m->id_barang; ?></h6>
						<h6><?php echo $m->jenis; ?></h6>
						<h3><?php echo $m->judul; ?></h3>
						<h4>Rp. <?php echo $m->harga_sewa; ?>,-</h4>
						<p><?php echo $m->deskripsi; ?></p>
					</div>
					<!-- Keterangan -->
					<div class="button">
						<a class="btn btn-xs btn-primary btn-sm btn-sm" href="<?php echo base_url('index.php/admin/halaman_update_barang/'.$m->id_barang); ?>">
							<i class="ace-icon fa fa-trash-o bigger-120">   Edit   </i>
						</a>
						<a class="btn btn-xs btn-danger btn-sm" href="<?php echo base_url('index.php/admin/delete_barang/'.$m->id_barang); ?>">
							<i class="ace-icon fa fa-trash-o bigger-120">Delete</i>
						</a>
					</div>
				</div>
				<hr>
				<!-- /.row -->
			<?php } ?>
			<hr>
		</div></div>


		<!-- Bootstrap core JavaScript -->

	</body>

	</html>
