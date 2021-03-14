<?php
class Model_hewan extends CI_Model
{
	public function get_semua_hewan()
	{
		$query = $this->db->get("hewan");

		return $query->result_array();
	}

	public function get_hewan_dengan_id($id_hewan)
	{
		$this->db->where("id_hewan", $id_hewan);
		$query = $this->db->get("hewan");

		return $query->row_array(); 
	}

	public function get_id_hewan_otomatis()
	{
		$this->db->select("auto_increment");
		$this->db->from("information_schema.tables");
		$this->db->where("table_schema = 'penjualanhewanternak2' AND table_name = 'hewan'");
		$query = $this->db->get();
		
		return $query->row_array(); 
	}

	public function insert_hewan_tanpa_gambar($nama_hewan, $jenis_kelamin)
	{	
		$tanggal = date("Y-m-d");

		$data_hewan = array(
			"id_hewan"      => NULL,
			"nama"          => $nama_hewan,
			"jenis_kelamin" => $jenis_kelamin,
			"tanggal_masuk" => DATE($tanggal),
			"sudah_terjual" => 0
		);

		return $this->db->insert("hewan", $data_hewan);
	}

	public function insert_hewan_dengan_gambar($nama_hewan, $jenis_kelamin, $path_gambar)
	{
		$tanggal = date("Y-m-d");

		$data_hewan = array(
			"id_hewan"      => NULL,
			"nama"          => $nama_hewan,
			"jenis_kelamin" => $jenis_kelamin,
			"tanggal_masuk" => DATE($tanggal),
			"sudah_terjual" => 0,
			"path_gambar"   => $path_gambar
		);

		return $this->db->insert("hewan", $data_hewan);
	}

	public function update_hewan_tanpa_gambar($id_hewan, $nama_hewan, $jenis_kelamin, $sudah_terjual)
	{
		$data_hewan = array(
			"nama"          => $nama_hewan,
			"jenis_kelamin" => $jenis_kelamin,
			"sudah_terjual" => $sudah_terjual
		);

		$this->db->where("id_hewan", $id_hewan);
		return $this->db->update("hewan", $data_hewan);
	}

	public function update_hewan_dengan_gambar($id_hewan, $nama_hewan, $jenis_kelamin, $sudah_terjual, $path_gambar)
	{
		$data_hewan = array(
			"nama"          => $nama_hewan,
			"jenis_kelamin" => $jenis_kelamin,
			"sudah_terjual" => $sudah_terjual,
			"path_gambar"   => $path_gambar
		);

		$this->db->where("id_hewan", $id_hewan);
		return $this->db->update("hewan", $data_hewan);
	}

	public function hapus_hewan($id_hewan)
	{
		$this->db->where("id_hewan", $id_hewan);
		return $this->db->delete("hewan");
	}
}
?>