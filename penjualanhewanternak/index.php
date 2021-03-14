<?php

include "koneksi-database.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Edit Data Hewan</title>

	<link rel="stylesheet" href="css/css-umum.css">
</head>
<body class="background-umum">

	<header class="header background-umum border-umum font-putih">
		<h1 class="font-family-dekorasi">Penjualan Hewan Ternak</h1>
	</header>

	<nav class="navigasi background-umum border-umum">
		<a class="navigasi-ikon-gitar" href="/penjualanhewanternak/">
			<img class="ikon-umum" src="gambar/ikon-sapi.png" alt="Ikon Gitar">
		</a>

		<ul class="daftar-navigasi">
			<li class="list-navigasi">
				<a class="active link-navigasi font-family-dekorasi font-putih" href="/penjualanhewanternak/">Edit Data Hewan</a>
			</li>
			<li class="list-navigasi">
				<a class="link-navigasi font-family-dekorasi font-putih" href="view-hewan-terjual.php">Hewan Terjual</a>
			</li>
		</ul>
	</nav>

	<main class="konten background-umum border-umum">
		<?php
		
		if (isset($_POST["insertHewan"])) {
			$namaHewan           = $_POST["namaHewan"];
			$direktoriGambar     = "gambar/";
			$namaFileGambarHewan = basename($_FILES["gambarHewan"]["name"]);
			$pathGambarHewan     = $direktoriGambar . $namaFileGambarHewan;
			$ukuranGambarHewan   = $_FILES["gambarHewan"]["size"];
			$tipeGambarHewan     = strtolower(pathinfo($namaFileGambarHewan, PATHINFO_EXTENSION));
			
			if ($ukuranGambarHewan > 0) { // Insert dengan gambar
				if ($tipeGambarHewan == "png" || $tipeGambarHewan == "jpg" || $tipeGambarHewan == "jpeg") {
					if (move_uploaded_file($_FILES["gambarHewan"]["tmp_name"], $pathGambarHewan)) {

						$queryInsertHewan = mysqli_query(
							$koneksiDatabase,
							"INSERT INTO hewan (id_hewan, nama, tanggal_masuk, sudah_terjual, path_gambar) " .
							"VALUES (NULL, '" . $namaHewan . "', CURRENT_DATE(), FALSE, " . 
							"'" . $pathGambarHewan . "')"
						);

						if ($queryInsertHewan) {
							echo "<script>window.alert('Insert data hewan telah berhasil.');</script>";
						} else {
							echo "<script>window.alert('Insert data hewan gagal.');</script>";
						}
					} else {
						echo "<script>window.alert('Upload gambar hewan gagal.');</script>";
					}
				} else {
					echo "Maaf, hanya file dengan ekstensi png, jpg, dan jpeg yang dapat diupload.";
				}
			} else { // Insert tanpa gambar
				$queryInsertHewan = mysqli_query(
					$koneksiDatabase,
					"INSERT INTO hewan (id_hewan, nama, tanggal_masuk, sudah_terjual) " .
					"VALUES (NULL, '" . $namaHewan . "', CURRENT_DATE(), FALSE)"
				);

				if ($queryInsertHewan) {
					echo "<script>window.alert('Insert data hewan telah berhasil.');</script>";
				} else {
					echo "<script>window.alert('Insert data hewan gagal.');</script>";
				}
			}

		} elseif (isset($_POST["updateHewan"])) {
			$idHewanYangDiupdate = $_POST["idHewan"];
			$namaHewan           = $_POST["namaHewan"];
			$sudahTerjual        = $_POST["sudahTerjual"];

			$direktoriGambar     = "gambar/";
			$namaFileGambarHewan = basename($_FILES["gambarHewan"]["name"]);
			$pathGambarHewan     = $direktoriGambar . $namaFileGambarHewan;
			$ukuranGambarHewan   = $_FILES["gambarHewan"]["size"];
			$tipeGambarHewan     = strtolower(pathinfo($namaFileGambarHewan, PATHINFO_EXTENSION));

			if ($ukuranGambarHewan > 0) { // Update dengan gambar
				if ($tipeGambarHewan == "png" || $tipeGambarHewan == "jpg" || $tipeGambarHewan == "jpeg") {
					if (move_uploaded_file($_FILES["gambarHewan"]["tmp_name"], $pathGambarHewan)) {

						$queryUpdateHewan = mysqli_query(
							$koneksiDatabase,
							"UPDATE hewan " .
							"SET nama = '" . $namaHewan .  "', sudah_terjual = " . $sudahTerjual . ", " .
							"path_gambar = '" . $pathGambarHewan . "' " .
							"WHERE id_hewan = " . $idHewanYangDiupdate
						);

						if ($queryUpdateHewan) {
							echo "<script>window.alert('Update data hewan telah berhasil.');</script>";
						} else {
							echo "<script>window.alert('Update data hewan gagal.');</script>";
						}
					} else {
						echo "<script>window.alert('Upload gambar hewan gagal.');</script>";
					}
				} else {
					echo "Maaf, hanya file dengan ekstensi png, jpg, dan jpeg yang dapat diupload.";
				}
			} else { // Update tanpa gambar
				$queryUpdateHewan = mysqli_query(
					$koneksiDatabase,
					"UPDATE hewan " .
					"SET nama = '" . $namaHewan .  "', sudah_terjual = " . $sudahTerjual . " " . 
					"WHERE id_hewan = " . $idHewanYangDiupdate
				);

				if ($queryUpdateHewan) {
					echo "<script>window.alert('Update data hewan telah berhasil.');</script>";
				} else {
					echo "<script>window.alert('Update data hewan gagal.');</script>";
				}
			}
		}

		?>
		
		<h2 class="font-family-teks font-putih">Edit Data Hewan</h2>

		<br><br>

		<h3 class="font-pembatas background-abu-abu font-family-teks font-putih">Insert Data Hewan</h3>
		<form class="font-putih" method="post" enctype="multipart/form-data" action="">
			<table>
				<tr>
					<td>
						<label>ID Hewan</label>
					</td>
					<td>: </td>
					
					<?php

					$querySelectIdOtomatis = mysqli_query(
						$koneksiDatabase,
						"SELECT auto_increment " . 
						"FROM information_schema.tables " . 
						"WHERE table_schema = 'penjualanhewanternak' AND table_name = 'hewan'"
					); 
					$hasilQueryIdOtomatis = mysqli_fetch_array($querySelectIdOtomatis);
					$idHewanOtomatis      = $hasilQueryIdOtomatis["auto_increment"];

					?>

					<td><input type="text" value="<?php echo $idHewanOtomatis; ?>" disabled></td>
				</tr>

				<tr>
					<td>
						<label>Nama Hewan</label>
					</td>
					<td>: </td>
					<td>
						<input type="text" name="namaHewan" required>
					</td>
				</tr>

				<tr>
					<td>
						<label>Gambar Hewan</label>
					</td>
					<td>: </td>
					<td>
						<input type="file" name="gambarHewan">
					</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>
						<input onclick="return window.confirm('Apakah Anda yakin untuk menginsert data hewan?');" type="submit" name="insertHewan" value="Insert Data">
					</td>
				</tr>
			</table>
		</form>

		<hr>
		<br>

		<div class="font-family-teks font-putih">
			<h3 class="font-pembatas background-abu-abu">Daftar Hewan</h3>

			<table border="1">
				<tr>
					<th class="data-hewan-header">ID Hewan</th>
					<th class="data-hewan-header">Nama Hewan</th>
					<th class="data-hewan-header">Tanggal Masuk</th>
					<th class="data-hewan-header">Sudah Terjual</th>
					<th class="data-hewan-header">Gambar Hewan</th>
					<th class="data-hewan-header">Aksi</th>
				</tr>

				<?php

				$querySelectSemuaHewan = mysqli_query(
					$koneksiDatabase, 
					"SELECT id_hewan, nama, tanggal_masuk, sudah_terjual, path_gambar FROM hewan"
				);

				while ($hasilQuerySemuaHewan = mysqli_fetch_array($querySelectSemuaHewan)) {
					$tanggalMasukHewan          = date_create($hasilQuerySemuaHewan["tanggal_masuk"]);
					$tanggalMasukHewanTerformat = date_format($tanggalMasukHewan, "d - m - Y");

					if ($hasilQuerySemuaHewan["sudah_terjual"] == 1) {
						$pesanSudahTerjual = "Sudah";
					} else {
						$pesanSudahTerjual = "Belum";
					}
					
					?>

					<tr>
						<td><?php echo $hasilQuerySemuaHewan["id_hewan"]; ?></td>
						<td><?php echo $hasilQuerySemuaHewan["nama"]; ?></td>
						<td><?php echo $tanggalMasukHewanTerformat; ?></td>
						<td><?php echo $pesanSudahTerjual; ?></td>
						<td><img class="gambar-hewan" src="<?php echo $hasilQuerySemuaHewan["path_gambar"]; ?>"></td>
						<td class="td-aksi font-putih">
							<a class="link-aksi font-putih" 
							href="update-hewan.php?id=<?php echo $hasilQuerySemuaHewan["id_hewan"]; ?>">Update</a> ||
							<a class="link-aksi font-putih" 
							href="delete-hewan.php?id=<?php echo $hasilQuerySemuaHewan["id_hewan"]; ?>">Delete</a>
						</td>
					</tr>

					<?php

				}
				
				?>
			</table>
		</div>
	</main> 

	<footer class="footer background-umum border-umum">
		<address>
			<a href="http://www.facebook.com/bima.adeknyaayox" target="_blank">
				<img class="ikon-footer ikon-umum" src="gambar/ikon-facebook.png" alt="facebook.com/bima.adeknyaayox">
			</a>
			<a href="https://www.instagram.com/_bimakurnia/" target="_blank">
				<img class="ikon-footer ikon-umum" src="gambar/ikon-instagram.png" alt="instagram.com/_bimakurnia/">
			</a>
			<a href="https://www.youtube.com/channel/UCSpcNq20Vg1el1bmF01x9qg" target="_blank">
				<img class="ikon-footer ikon-umum" src="gambar/ikon-youtube.png" alt="youtube.com/channel/UCSpcNq20Vg1el1bmF01x9qg">
			</a>
		</address>

		<p class="font-family-dekorasi font-putih">Copyright &copy; 2020 Bima. All right reserved.</p>
	</footer>

</body>
</html>