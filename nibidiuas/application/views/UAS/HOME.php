<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>CSS/HOME.css">
</head>

<body>

	<!-- HEADER -->
	<div class="container">
		<div class="topbar">
			<div class="img">
				<img src=<?php echo base_url('image/FOTO/bunga.png'); ?> width="45%">
			</div>

			<div class="img2">
				<a href="<?php echo base_url('index.php/uashome/'); ?>"><img src=<?php echo base_url('image/FOTO/nibidi.png'); ?> width="45%"></a>
			</div>

			<div class="navbar">
				<ul>
					<li class="link-navigasi"><a class='link-navigasi' href="<?php echo base_url('index.php/uashome/'); ?>">HOME</a></li>
					<li class="link-navigasi"><a class='link-navigasi' href="<?php echo base_url('index.php/uaswishlist/'); ?>">CART</a></li>
					<?php
					$penggunaBelumLogin = !isset($_SESSION["username"]);
					if ($penggunaBelumLogin) {
						echo "<li><a class='link-navigasi' href='" . base_url('index.php/uasuser/') . "'>LOGIN</a></li>";
					} else {
						echo "<li><a class='link-navigasi' href='" . base_url('index.php/uasuser/form_update_akun') . "'>AKUN</a></li>";
						echo "<li><a class='link-navigasi' href='" . base_url('index.php/uasuser/logout') . "'>LOGOUT</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
	</div>

	<!-- CONTENT1 -->
	<div class="container3">

		<div class="slides fade">
			<img src=<?php echo base_url('image/FOTO/INDOMIE2.png'); ?> width="100%" class="img4">
		</div>

		<div class="slides fade">
			<img src=<?php echo base_url('image/FOTO/GAMING.png'); ?> width="100%" class="img4">
		</div>

		<div class="slides fade">
			<img src=<?php echo base_url('image/FOTO/GUITAR.png'); ?> width="100%" class="img4">
		</div>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>


	<!-- CONTENT2 -->
	<div class="container2">
		<div class="layoutimgbarang">
			<form method="post" action="<?php echo base_url('index.php/Uashome/insert'); ?>">
				<input type="hidden" name="id_barang" value="1">
				<div class="imgbarang">
					<img src=<?php echo base_url('image/FOTO/INDOMIE.png'); ?> width="10%" class="img3">
					<p class="p"><b>INDOMIE</b><br><b>RP 2.500</b></p>

					<button class="button" type="submit" name="button1">Add to Cart</button>

					<br>
				</div>
			</form>

			<form method="post" action="<?php echo base_url('index.php/Uashome/insert'); ?>">
				<input type="hidden" name="id_barang" value="2">
				<div class="imgbarang">
					<img src=<?php echo base_url('image/FOTO/GITAR.png'); ?> width="10%" class="img3">
					<p class="p2"><b>Gitar Elektrik</b><br><b>RP 500.000</b></p>

					<button class="button2" type="submit" name="button2">Add to Cart</button>
				</div>
			</form>

			<form method="post" action="<?php echo base_url('index.php/Uashome/insert'); ?>">
				<input type="hidden" name="id_barang" value="3">
				<div class="imgbarang">
					<img src=<?php echo base_url('image/FOTO/CASING.png'); ?> width="10%" class="img3">
					<p class="p2"><b>Casing Komputer</b><br><b>RP 700.000</b></p>

					<button class="button" type="submit" name="button3">Add to Cart</button>
				</div>
			</form>

			<form method="post" action="<?php echo base_url('index.php/Uashome/insert'); ?>">
				<input type="hidden" name="id_barang" value="4">
				<div class="imgbarang">
					<img src=<?php echo base_url('image/FOTO/KURSI.png'); ?> width="10%" class="img3">
					<p class="p2"><b>Gaming Chair</b><br><b>RP 3.000.000</b></p>

					<button class="button2" type="submit" name="button4">Add to Cart</button>
				</div>
			</form>
		</div>

	</div>


	<!-- PHP -->
	<?php
	if ($this->session->has_userdata('pesan')) {
	?>
		<script>
			window.alert("<?php echo $this->session->flashdata("pesan"); ?>");
		</script>
	<?php
	}

	?>


	<script src="<?php echo base_url(''); ?>JS/HOME.js" type="text/javascript">
	</script>


</body>

</html>