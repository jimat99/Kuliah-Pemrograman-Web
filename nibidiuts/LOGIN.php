<?php

include "KONEKSI-DATABASE.php";

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/LOGIN.css">
</head>
<body>
	<div class="container-form">
		<div class="form-rata-tengah">
			<img class="gambar-bunga" src="FOTO/bunga.png">
			<img class="gambar-nibidi" src="FOTO/nibidi.png">

			<div class="form-login">
				<form action="" method="post"> 
					<input class="teks-input" type="text" name="username" placeholder="Masukkan username" required>
					<br>
					<input class="teks-input" type="password" name="password" placeholder="Masukkan password" required>
					<br>
					<button class="button-login" type="submit" name="buttonLogin" 
					onclick="return window.confirm('Apakah Anda yakin akan login?');">Login</button>
				</form>
			</div>

			<p class="teks-buat-akun">Belum punya akun? <a class="teks-daftar" href="DAFTAR-AKUN.php">Daftar di sini</a></p>
		</div>

		<a href="HOME.php" class="button-kembali">&#8249;</a>
	</div>

	<?php
	$penggunaSudahLogin = isset($_SESSION["username"]);
	// Ketika sudah login tetapi mencoba mengakses login.php, maka akan diarahkan ke HOME.php.
	if ($penggunaSudahLogin) {
		header("Location: HOME.php");
		exit;
	}

	// Pesan antar halaman
	if (isset($_SESSION["pesan"])) {
		echo "<script>window.alert('" . $_SESSION['pesan'] . "');</script>";
		unset($_SESSION["pesan"]);
	}

	if (isset($_POST["buttonLogin"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$queryCekDataLogin = mysqli_query(
			$koneksiDatabase, 
			"SELECT id_pelanggan FROM pelanggan " . 
			"WHERE username = '" . $username . "' " . 
			"AND password = '" . $password . "'"
		);
		$cekJumlahDataValid = mysqli_num_rows($queryCekDataLogin);

		if ($cekJumlahDataValid == 0) {
			$loginValid = false;
		} else {
			$loginValid = true;
		}

		if ($loginValid) {
			$_SESSION["username"] = $username;
			$_SESSION["pesan"] = "Anda telah berhasil login.";
			header("Location: HOME.php");
		} else {
			echo "<script>window.alert('Maaf, username atau password yang Anda inputkan salah!');</script>";
			
		} 
	}
	?>
</body>
</html>