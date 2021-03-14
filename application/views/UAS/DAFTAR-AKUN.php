<!DOCTYPE html>
<html>
<head>
	<title>Daftar Akun</title>
	<link rel="stylesheet" type="text/css" 
	href="<?php echo base_url('CSS/DAFTAR-AKUN.css'); ?>">
</head>
<body>
	<div class="container-form"> 
		<div class="form-rata-tengah">
			<img class="gambar-bunga" src="<?php echo base_url('image/FOTO/bunga.png'); ?>">
			<img class="gambar-nibidi" src="<?php echo base_url('image/FOTO/nibidi.png'); ?>">

			
			<div class="form-daftar">
				<form action="<?php echo base_url('index.php/uasuser/daftar_akun/'); ?>" method="post"> 
					<input class="teks-input" type="text" name="username" placeholder="Masukkan username" required>
					<br>
					<input class="teks-input" type="password" name="password" placeholder="Masukkan password" required>
					<br>
					<button class="button-daftar" type="submit" name="buttonDaftar" 
					onclick="return window.confirm('Apakah Anda yakin akan mendaftar?');">Daftar Akun</button>
				</form>
			</div>
		</div>
		
		<a href="<?php echo base_url('index.php/uasuser'); ?>" class="button-kembali">&#8249;</a>
	</div>
</body>
</html>