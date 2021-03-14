<?php

include "KONEKSI-DATABASE.php";

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Akun</title>
	<link rel="stylesheet" type="text/css" href="CSS/DAFTAR-AKUN.css">
</head>
<body>
	<div class="container-form"> 
		<div class="form-rata-tengah">
			<img class="gambar-bunga" src="FOTO/bunga.png">
			<img class="gambar-nibidi" src="FOTO/nibidi.png">

			
			<div class="form-daftar">
				<form action="" method="post"> 
					<input class="teks-input" type="text" name="username" placeholder="Masukkan username" required>
					<br>
					<input class="teks-input" type="password" name="password" placeholder="Masukkan password" required>
					<br>
					<button class="button-daftar" type="submit" name="buttonDaftar" 
					onclick="return window.confirm('Apakah Anda yakin akan mendaftar?');">Daftar Akun</button>
				</form>
			</div>
		</div>
		
		<a href="LOGIN.php" class="button-kembali">&#8249;</a>
	</div>



	
	

	<?php
	if (isset($_POST["buttonDaftar"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$queryDaftarAkun = mysqli_query(
			$koneksiDatabase, 
			"INSERT INTO pelanggan (id_pelanggan, username, password) " . 
			"VALUES (NULL, '" . $username . "', '" . $password . "')"
		);

		if ($queryDaftarAkun) {
			$_SESSION["pesan"] = "Daftar akun telah berhasil.";
		} else {
			$_SESSION["pesan"] = "Daftar akun gagal";
		}

		header("Location: LOGIN.php");
	}
	?>
</body>
</html>