<!DOCTYPE html>
<html>
<head>
	<title>Update Akun</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("CSS/AKUN.css"); ?>">
</head>
<body>
	<div class="container-form"> 
		<div class="form-rata-tengah">
			<img class="gambar-bunga" src="<?php echo base_url("image/FOTO/bunga.png"); ?>">
			<img class="gambar-nibidi" src="<?php echo base_url("image/FOTO/nibidi.png"); ?>">

			<div class="form-daftar">
				<form action="<?php echo base_url('index.php/uasuser/update_akun/'); ?>" method="post"> 
					<input class="teks-input" type="text" name="username" placeholder="Masukkan username baru" required>
					<br>
					<input class="teks-input" type="password" name="password" placeholder="Masukkan password baru" required>
					<br>
					<button class="button-update" type="submit" name="buttonUpdate" 
					onclick="return window.confirm('Apakah Anda yakin akan mengupdate data?');">UPDATE</button>
				</form>
			</div>
		</div>
		
		<a href="<?php echo base_url('index.php/uashome/'); ?>" class="button-kembali">&#8249;</a>
	</div>

	<?php
	if ( ! $this->session->has_userdata("username")) {
		redirect(base_url("index.php/uasuser/"));
	}
	?>
</body>
</html>