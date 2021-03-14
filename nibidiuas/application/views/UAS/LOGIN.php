<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("CSS/LOGIN.css"); ?>">
</head>

<body>
	<div class="container-form">
		<div class="form-rata-tengah">
			<img class="gambar-bunga" src=<?php echo base_url('image/FOTO/bunga.png'); ?>>
			<img class="gambar-nibidi" src=<?php echo base_url('image/FOTO/nibidi.png'); ?>>

			<div class="form-login">
				<form action="<?php echo base_url('index.php/uasuser/login/'); ?>" method="post">
					<input class="teks-input" type="text" name="username" placeholder="Masukkan username" required>
					<br>
					<input class="teks-input" type="password" name="password" placeholder="Masukkan password" required>
					<br>
					<button class="button-login" type="submit" name="buttonLogin" onclick="return window.confirm('Apakah Anda yakin akan login?');">Login</button>
				</form>
			</div>

			<p class="teks-buat-akun">Belum punya akun? <a class="teks-daftar" href="<?php echo base_url('index.php/uasuser/form_daftar_akun/'); ?>">Daftar di sini</a></p>
		</div>

		<a href="<?php echo base_url('index.php/uashome/'); ?>" class="button-kembali">&#8249;</a>
	</div>

	<?php
	if ($this->session->has_userdata("pesan")) {
		?>
		<script>window.alert("<?php echo $this->session->flashdata("pesan"); ?>");</script>
		<?php
	}
	?>
</body>

</html>