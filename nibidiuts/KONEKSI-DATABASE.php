<?php

define("HOST_DATABASE"    , "localhost");
define("USER_DATABASE"    , "root");
define("PASSWORD_DATABASE", "");
define("NAMA_DATABASE"    , "nibidi");

$koneksiDatabase = mysqli_connect(HOST_DATABASE, USER_DATABASE, PASSWORD_DATABASE, NAMA_DATABASE);
$koneksiDatabaseError = !$koneksiDatabase;

if (!$koneksiDatabase) {
	die("<h1>Koneksi database gagal. " . mysqli_connect_error() . "</h1>");
}

?>