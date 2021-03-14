<?php

include "KONEKSI-DATABASE.php";

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Akun</title>
	<link rel="stylesheet" type="text/css" href="CSS/AKUN.css">
</head>
<body>
	<div class="container-form"> 
		<div class="form-rata-tengah">
			<img class="gambar-bunga" src="FOTO/bunga.png">
			<img class="gambar-nibidi" src="FOTO/nibidi.png">

			<div class="form-daftar">
				<form action="" method="post"> 
					<input class="teks-input" type="text" name="username" placeholder="Masukkan username baru" required>
					<br>
					<input class="teks-input" type="password" name="password" placeholder="Masukkan password baru" required>
					<br>
					<button class="button-update" type="submit" name="buttonUpdate" 
					onclick="return window.confirm('Apakah Anda yakin akan mengupdate data?');">UPDATE</button>
				</form>
			</div>
		</div>
		
		<a href="HOME.php" class="button-kembali">&#8249;</a>
	</div>

	<?php
	$penggunaBelumLogin = !isset($_SESSION["username"]);

	if ($penggunaBelumLogin) {
		header("Location: HOME.php");
		exit;
	}

	if (isset($_POST["buttonUpdate"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$queryCariIdPelanggan = mysqli_query(
			$koneksiDatabase, 
			"SELECT id_pelanggan " . 
			"FROM pelanggan " . 
			"WHERE username = '" . $_SESSION["username"] . "'"
		);

		$row = mysqli_fetch_array($queryCariIdPelanggan);

		$queryUpdateAkun = mysqli_query(
			$koneksiDatabase, 
			"UPDATE pelanggan " . 
			"SET username = '" . $username . "', password = '" . $password . "' " . 
			"WHERE id_pelanggan = " . $row["id_pelanggan"]
		);

		if ($queryUpdateAkun) {
			echo "<script>window.alert('Update akun telah berhasil.');</script>";
			//$_SESSION["pesan"] = "Update akun telah berhasil.";
			//header("Location: HOME.php");
		} else {
			echo "<script>window.alert('Update akun gagal');</script>";
		}
	}
	?>
</body>
</html>