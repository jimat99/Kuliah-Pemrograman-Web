<h3>Update Data Hewan</h3>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url("index.php/hewan/update_hewan/"); ?>">
	<table>
		<tr>
			<td>
				<label>ID Hewan</label>
			</td>
			<td>: </td>
			<td>
				<input type="hidden" name="id_hewan" value="<?php echo $data_hewan["id_hewan"]; ?>">
				<input type="text" value="<?php echo $data_hewan["id_hewan"]; ?>" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label>Nama Hewan</label>
			</td>
			<td>: </td>
			<td>
				<input type="text" name="nama_hewan" value="<?php echo $data_hewan["nama"]; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				<label>Jenis Kelamin</label>
			</td>
			<td>: </td>
			<td>
				<input type="radio" name="jenis_kelamin"
				<?php if ($data_hewan["jenis_kelamin"] == "jantan") echo "checked"; ?> value="jantan">Jantan
				<input type="radio" name="jenis_kelamin" 
				<?php if ($data_hewan["jenis_kelamin"] == "betina") echo "checked"; ?> value="betina">Betina
			</td>
		</tr>
		<tr>
			<td>
				<label>Tanggal Masuk</label>
			</td>
			<td>: </td>
			<td>
				<?php
				$tanggalMasukHewan           = date_create($data_hewan["tanggal_masuk"]);
				$data_hewan["tanggal_masuk"] = date_format($tanggalMasukHewan, "d - m - Y");
				?>
				<input type="text" value="<?php echo $data_hewan["tanggal_masuk"]; ?>" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label>Sudah Terjual</label>
			</td>
			<td>: </td>
			<td>
				<input type="radio" name="sudah_terjual"
				<?php if ($data_hewan["sudah_terjual"] == 1) echo "checked"; ?> value="1">Sudah
				<input type="radio" name="sudah_terjual"
				<?php if ($data_hewan["sudah_terjual"] == 0) echo "checked"; ?> value="0">Belum
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
				<button type="submit" name="submit" onclick="return window.confirm('Apakah Anda yakin untuk mengupdate data hewan?');">
					Update Data
				</button>
				<button type="button" onclick="document.getElementById('file').value = '';">
					Hapus Gambar
				</button>
			</td>
		</tr>
	</table>
</form>