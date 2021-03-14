<?php

session_start();

$penggunaBelumLogin = !isset($_SESSION["username"]);

if ($penggunaBelumLogin) {
	header("Location: HOME.php");
	exit;
} else {
	unset($_SESSION["username"]);

	$_SESSION["pesan"] = "Anda telah berhasil logout.";

	header("Location: HOME.php");
	exit;
}

?>