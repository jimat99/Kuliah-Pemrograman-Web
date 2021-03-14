<h3>Insert Data Hewan</h3>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url("index.php/hewan/insert_hewan/"); ?>">
	<table>
		<tr>
			<td>
				<label>ID Hewan</label>
			</td>
			<td>: </td>
			<td>
				<input type="text" value="<?php echo $data_id_hewan["auto_increment"]; ?>" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label>Nama Hewan</label>
			</td>
			<td>: </td>
			<td>
				<input type="text" name="nama_hewan" required>
			</td>
		</tr>
		<tr>
			<td>
				<label>Jenis Kelamin</label>
			</td>
			<td>: </td>
			<td>
				<input type="radio" name="jenis_kelamin" value="jantan" checked>Jantan
				<input type="radio" name="jenis_kelamin" value="betina">Betina
			</td>
		</tr>
		<tr>
			<td>
				<label>Gambar Hewan</label>
			</td>
			<td>: </td>
			<td>
				<input id="file" type="file" name="gambar_hewan">
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button type="submit" name="submit" onclick="return window.confirm('Apakah Anda yakin untuk menginsert data hewan?');">
					Insert Data
				</button>
				<button type="button" onclick="document.getElementById('file').value = '';">
					Hapus Gambar
				</button>
			</td>
		</tr>
	</table>
</form>

<table border="1">
	<tr>
		<th class="data-hewan-header">ID Hewan</th>
		<th class="data-hewan-header">Nama Hewan</th>
		<th class="data-hewan-header">Jenis Kelamin</th>
		<th class="data-hewan-header">Tanggal Masuk</th>
		<th class="data-hewan-header">Sudah Terjual</th>
		<th class="data-hewan-header">Gambar Hewan</th>
		<th class="data-hewan-header">Aksi</th>
	</tr>
	<?php
	foreach ($data_semua_hewan as $i) {
		$i["tanggal_masuk"] = date_create($i["tanggal_masuk"]);
		$i["tanggal_masuk"] = date_format($i["tanggal_masuk"], "d - m - Y");

		if ($i["sudah_terjual"] == 1) {
			$i["sudah_terjual"] = "Sudah";
		} else {
			$i["sudah_terjual"] = "Belum";
		}
		?>
		<tr>
			<td><?php echo html_escape($i["id_hewan"]); ?></td>
			<td><?php echo html_escape($i["nama"]); ?></td>
			<td><?php echo ucfirst(html_escape($i["jenis_kelamin"])); ?></td>
			<td><?php echo html_escape($i["tanggal_masuk"]); ?></td>
			<td><?php echo html_escape($i["sudah_terjual"]); ?></td>
			<td><img class="gambar-hewan" src="<?php echo base_url($i["path_gambar"]); ?>"></td>
			<td>
				<a class="link-aksi font-umum" href="<?php echo base_url("index.php/hewan/form_update_hewan/") . $i["id_hewan"]; ?>">Update</a> ||
				<a class="link-aksi font-umum" href="<?php echo base_url("index.php/hewan/hapus_hewan/") . $i["id_hewan"]; ?>" onclick="return window.confirm('Apakah Anda yakin untuk menghapus data hewan?');">Hapus</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>

<?php
if ($this->session->has_userdata("pesan")) {
	?>
	<script>window.alert("<?php echo $this->session->flashdata("pesan"); ?>");</script>
	<?php
}
?>