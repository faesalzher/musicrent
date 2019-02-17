<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url("vendor/bootstrap/css/bootstrap.css");?>" rel="stylesheet">
	<title>MusicRent - Halaman Permintaan</title>


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

	<!-- Page Content -->
	<div class="limiter">
		<div class="container-login100 p-t-1 p-b-10 p-l-85 p-r-85" >   
			<div class = "limiter p-b-20">
				<!-- Page Heading -->
				<h1 class="my-4">Daftar Permintaan Penyewaan</h1>
				Pilih Tanggal :				
				<div class="form-data p-b-20">
					<form action="<?= site_url('admin/halaman_permintaan') ?>" method="GET" role="form"  enctype="multipart/form-data">
						<input type="date" name="tanggal">	

						<button type="submit" class="btn btn-primary">Cari</button>

					</form>				
					<?php
					if($this->session->flashdata('sukses')) {
						echo '<p class="alert alert-success" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
					} ?>
				</div>
				<table class='table'> 
					<tr>
						<td>ID</td>
						<td>ID Barang</td>
						<td>Username</td>
						<td>Email</td>
						<td>Nama Penyewa</td>
						<td>No KTP</td>
						<td>Alamat Sewa</td>		
						<td>Tanggal</td>
						<td></td>		
					</tr>
					<?php foreach($penyewaan as $m){ ?>
						<tr>					
							<td> <?php echo $m->id_penyewaan; ?> </td>
							<td> <?php echo $m->id_barang; ?> </td>
							<td> <?php echo $m->username; ?> </td>
							<td> <?php echo $m->email; ?> </td>
							<td> <?php echo $m->nama_penyewa; ?> </td>
							<td> <?php echo $m->no_ktp; ?> </td>
							<td> <?php echo $m->alamat_sewa; ?> </td>
							<td> <?php echo $m->tanggal; ?> </td>
							<td>
								<a class="btn btn-xs btn-danger btn-sm" href="<?php echo base_url('index.php/admin/delete_penyewaan/'.$m->id_penyewaan); ?>">
									<i class="ace-icon fa fa-trash-o bigger-120">Delete</i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

</body>

</html>
