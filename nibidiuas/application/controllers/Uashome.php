<?php
class Uashome extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('M_Uashome');
   }

   function index()
   {
      $this->load->view('UAS/HOME');
   }

   function insert()
   {
      if ($this->session->has_userdata('username')) {
         $idbarang = $this->input->post('id_barang');
         $harga = $this->M_Uashome->selectHarga($idbarang);
         $idPelanggan = $this->M_Uashome->selectidpelanggan($this->session->userdata('username'));
         if ($this->M_Uashome->insert($harga['harga'], $idbarang, $idPelanggan['id_pelanggan'])) {
            $this->session->set_flashdata('pesan', 'Berhasil');
         } else {
            $this->session->set_flashdata('pesan', 'Salah');
         }
      } else {
         $this->session->set_flashdata('pesan', 'Belum Login');
      }
      redirect(base_url('index.php/Uashome'));
   }
}
