<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hewan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("model_hewan");
	}

	public function index()
	{
		$data_untuk_view = array("judul" => "Beranda");
		$this->load->view("templates/header", $data_untuk_view);

		$data_id_hewan    = $this->model_hewan->get_id_hewan_otomatis();
		$data_semua_hewan = $this->model_hewan->get_semua_hewan();
		$data_untuk_view  = array(
			"data_id_hewan"    => $data_id_hewan,
			"data_semua_hewan" => $data_semua_hewan
		);
		$this->load->view("view_beranda", $data_untuk_view);
		$this->load->view("templates/footer");
	}

	public function insert_hewan()
	{	
		$nama_hewan    = $this->input->post("nama_hewan");
		$jenis_kelamin = $this->input->post("jenis_kelamin");
		$gambar_tidak_diupload = ! file_exists($_FILES["gambar_hewan"]["tmp_name"]);

		if ($gambar_tidak_diupload) {
			if ($this->model_hewan->insert_hewan_tanpa_gambar($nama_hewan, $jenis_kelamin)) {
				$pesan = "Input data hewan berhasil.";
			} else {
				$pesan = "Input data hewan gagal.";
			}
		} else {
			$direktori_gambar = "assets/gambar/";
			$nama_file_gambar = basename($_FILES["gambar_hewan"]["name"]);
			$path_gambar      = $direktori_gambar . $nama_file_gambar;

			if (move_uploaded_file($_FILES["gambar_hewan"]["tmp_name"], $path_gambar)) {
				if ($this->model_hewan->insert_hewan_dengan_gambar($nama_hewan, $jenis_kelamin, $path_gambar)) {
					$pesan = "Input data hewan berhasil.";
				} else {
					$pesan = "Input data hewan gagal.";
				}
			} else {
				$pesan = "Upload gambar hewan gagal.";
			}
		}
		$this->session->set_flashdata("pesan", $pesan);
		redirect(base_url("index.php/hewan"));
	}

	public function form_update_hewan($id_hewan)
	{
		$data_untuk_view = array("judul" => "Update Hewan");
		$this->load->view("templates/header", $data_untuk_view);

		$data_hewan      = $this->model_hewan->get_hewan_dengan_id($id_hewan);
		$data_untuk_view = array("data_hewan" => $data_hewan);
		$this->load->view("view_update_hewan", $data_untuk_view);
		$this->load->view("templates/footer");
	}

	public function update_hewan()
	{
		$id_hewan      = $this->input->post("id_hewan");
		$nama_hewan    = $this->input->post("nama_hewan");
		$jenis_kelamin = $this->input->post("jenis_kelamin");
		$sudah_terjual = $this->input->post("sudah_terjual");
		$gambar_tidak_diupload = ! file_exists($_FILES["gambar_hewan"]["tmp_name"]);

		if ($gambar_tidak_diupload) {
			if ($this->model_hewan->update_hewan_tanpa_gambar($id_hewan, $nama_hewan, $jenis_kelamin, $sudah_terjual)) {
				$pesan = "Update data hewan berhasil.";
			} else {
				$pesan = "Update data hewan gagal.";
			}
		} else {
			$direktori_gambar = "assets/gambar/";
			$nama_file_gambar = basename($_FILES["gambar_hewan"]["name"]);
			$path_gambar      = $direktori_gambar . $nama_file_gambar;

			if (move_uploaded_file($_FILES["gambar_hewan"]["tmp_name"], $path_gambar)) {
				if ($this->model_hewan->update_hewan_dengan_gambar($id_hewan, $nama_hewan, $jenis_kelamin, $sudah_terjual, $path_gambar)) {
					$pesan = "Update data hewan berhasil.";
				} else {
					$pesan = "Update data hewan gagal.";
				}
			} else {
				$pesan = "Upload gambar hewan gagal.";
			}
		}
		$this->session->set_flashdata("pesan", $pesan);
		redirect(base_url("index.php/hewan"));
	}

	public function hapus_hewan($id_hewan)
	{
		if ($this->model_hewan->hapus_hewan($id_hewan)) {
			$pesan = "Hapus data hewan berhasil.";
		} else {
			$pesan = "Hapus data hewan gagal.";
		}
		$this->session->set_flashdata("pesan", $pesan);
		redirect(base_url("index.php/hewan"));
	}
}
?>