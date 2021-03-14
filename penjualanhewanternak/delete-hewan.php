<?php

include "koneksi-database.php";

$idHewan          = $_GET["id"];
$queryDeleteHewan = mysqli_query(
	$koneksiDatabase,
	"DELETE FROM hewan WHERE id_hewan = " . $idHewan
);

if ($queryDeleteHewan) {
	header("Location: /penjualanhewanternak/");
} else {

	?>

	<script>
		window.alert("Delete data hewan gagal.");
		window.location.replace("/penjualanhewanternak/");
	</script>";

	<?php

}

?>