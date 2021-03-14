<?php

include "koneksi-database.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Update Hewan</title>

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
				<a class="link-navigasi font-family-dekorasi font-putih" href="/penjualanhewanternak/">Edit Data Hewan</a>
			</li>
			<li class="list-navigasi">
				<a class="link-navigasi font-family-dekorasi font-putih" href="view-hewan-terjual.php">Hewan Terjual</a>
			</li>
		</ul>
	</nav>

	<main class="konten background-umum border-umum">
		<?php

		$idHewan = $_GET["id"];
		$querySelectHewanYangDiupdate = mysqli_query(
			$koneksiDatabase, 
			"SELECT id_hewan, nama, tanggal_masuk, sudah_terjual, path_gambar " .  
			"FROM hewan " .  
			"WHERE id_hewan = " . $idHewan
		); 

		$hasilQueryHewanYangDiupdate = mysqli_fetch_array($querySelectHewanYangDiupdate);

		?>
		
		<h2 class="font-family-teks font-putih">Update Hewan</h2>

		<br><br>

		<h3 class="font-pembatas background-abu-abu font-family-teks font-putih">Update Data Hewan</h3>
		<form class="font-putih" method="post" enctype="multipart/form-data" action="/penjualanhewanternak/">
			<table>
				<tr>
					<td>
						<label>ID Hewan</label>
					</td>
					<td>: </td>
					<td>
						<input type="hidden" name="idHewan" value="<?php echo $hasilQueryHewanYangDiupdate["id_hewan"]; ?>">
						<input type="text" value="<?php echo $hasilQueryHewanYangDiupdate["id_hewan"]; ?>" disabled>
					</td>
				</tr>

				<tr>
					<td>
						<label>Nama Hewan</label>
					</td>
					<td>: </td>
					<td>
						<input type="text" name="namaHewan" value="<?php echo $hasilQueryHewanYangDiupdate["nama"]; ?>" placeholder="<?php echo $hasilQueryHewanYangDiupdate["nama"]; ?>" required>
					</td>
				</tr>

				<tr>
					<td>
						<label>Tanggal Masuk</label>
					</td>
					<td>: </td>
					<td>

						<?php

						$tanggalMasukHewan          = date_create($hasilQueryHewanYangDiupdate["tanggal_masuk"]);
						$tanggalMasukHewanTerformat = date_format($tanggalMasukHewan, "d - m - Y");

						?>

						<input type="text" value="<?php echo $tanggalMasukHewanTerformat; ?>" disabled>
					</td>
				</tr>

				<tr>
					<td><label>Sudah Terjual</label></td>
					<td>: </td>
					<td>

						<?php

						if ($hasilQueryHewanYangDiupdate["sudah_terjual"] == 1) {
							$apakahSudahTerjual = true;
						} else {
							$apakahSudahTerjual = false;
						}

						?>

						<input type="radio" name="sudahTerjual"
						<?php if ($apakahSudahTerjual) echo "checked"; ?> value="true">Sudah
						<input type="radio" name="sudahTerjual"
						<?php if (!$apakahSudahTerjual) echo "checked"; ?> value="false">Belum
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
						<input onclick="return window.confirm('Apakah Anda yakin untuk mengupdate data hewan?');" type="submit" name="updateHewan" value="Update Data">
					</td>
				</tr>
			</table>
		</form>
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