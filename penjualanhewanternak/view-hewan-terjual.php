<?php

include "koneksi-database.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Hewan Terjual</title>

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
				<a class="active link-navigasi font-family-dekorasi font-putih" href="view-hewan-terjual.php">Hewan Terjual</a>
			</li>
		</ul>
	</nav>

	<main class="konten background-umum border-umum">
		<h2 class="font-family-teks font-putih">Hewan Terjual</h2>

		<br><br>

		<div class="font-putih font-family-teks">
			<h3 class="font-pembatas background-abu-abu">Daftar Hewan Terjual</h3>

			<table border="1">
				<tr>
					<th class="data-hewan-header">ID Hewan</th>
					<th class="data-hewan-header">Nama Hewan</th>
					<th class="data-hewan-header">Tanggal Masuk</th>
					<th class="data-hewan-header">Sudah Terjual</th>
					<th class="data-hewan-header">Gambar Hewan</th>
				</tr>

				<?php

				$querySelectHewanTerjual = mysqli_query(
					$koneksiDatabase, 
					"SELECT id_hewan, nama, tanggal_masuk, sudah_terjual, path_gambar FROM hewan " . 
					"WHERE sudah_terjual = 1"
				);

				while ($hasilQueryHewanTerjual = mysqli_fetch_array($querySelectHewanTerjual)) {
					$tanggalMasukHewan          = date_create($hasilQueryHewanTerjual["tanggal_masuk"]);
					$tanggalMasukHewanTerformat = date_format($tanggalMasukHewan, "d - m - Y");

					if ($hasilQueryHewanTerjual["sudah_terjual"] == 1) {
						$pesanSudahTerjual = "Sudah";
					} else {
						$pesanSudahTerjual = "Belum";
					}

					?>

					<tr>
						<td><?php echo $hasilQueryHewanTerjual["id_hewan"]; ?></td>
						<td><?php echo $hasilQueryHewanTerjual["nama"]; ?></td>
						<td><?php echo $tanggalMasukHewanTerformat; ?></td>
						<td><?php echo $pesanSudahTerjual; ?></td>
						<td><img class="gambar-hewan" src="<?php echo $hasilQueryHewanTerjual["path_gambar"]; ?>"></td>
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