<?php

$hostDatabase     = "localhost";
$userDatabase     = "root";
$passwordDatabase = "";
$namaDatabase     = "penjualanhewanternak";

$koneksiDatabase = mysqli_connect($hostDatabase, $userDatabase, $passwordDatabase, $namaDatabase);

if (!$koneksiDatabase) {
	die("<h1>Koneksi database gagal</h1>");
}

?>