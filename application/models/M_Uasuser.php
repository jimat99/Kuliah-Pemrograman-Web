<?php

class M_Uasuser extends CI_Model
{
	function cari_id_pelanggan($username)
	{
		$this->db->select("id_pelanggan");
		$this->db->from("pelanggan");
		$this->db->where("username", $username);
		$query = $this->db->get();
		
		return $query->row_array();
	}

	function cek_login_valid($username, $password)
	{
		$this->db->select("id_pelanggan");
		$this->db->from("pelanggan");
		$this->db->where("username = '$username' AND password = '$password'");
		$query = $this->db->get();
		
		return $query->num_rows();
	}

	function tambah_akun($username, $password)
	{	
		$data_pelanggan = array(
			"id_pelanggan" => NULL,
			"username"     => $username,
			"password"     => $password
		);

		return $this->db->insert("pelanggan", $data_pelanggan);
	}

	function update_akun($id_pelanggan, $username, $password)
	{
		$data_pelanggan = array(
			"username" => $username,
			"password" => $password
		);

		$this->db->where("id_pelanggan", $id_pelanggan);
		return $this->db->update("pelanggan", $data_pelanggan);
	}
}
