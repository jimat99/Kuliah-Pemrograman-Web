<?php
class Uaswishlist extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('M_Uaswishlist');
   }

   function index()
   {

      $data = array(
         "harga" => $this->M_Uaswishlist->selectharga(),
         "qty" => $this->M_Uaswishlist->selectqty(),
         "total_harga" => $this->M_Uaswishlist->hitung_total_harga()
      );
      $this->load->view('UAS/WISHLIST', $data);
   }

   function update()
   {
      if ($this->input->post('id_barang') == 1) {
         $this->M_Uaswishlist->update(1);
      } else if ($this->input->post('id_barang') == 2) {
         $this->M_Uaswishlist->update(2);
      } else if ($this->input->post('id_barang') == 3) {
         $this->M_Uaswishlist->update(3);
      } else if ($this->input->post('id_barang') == 4) {
         //echo "<script>alert('aaaa');</script>";
         $this->M_Uaswishlist->update(4);
      }
      redirect(base_url('index.php/uaswishlist/'));
   }

   function bayar()
   {
      $username = $this->session->userdata('username');
      $uang_pelanggan = $this->input->post('uangpelanggan');
      $this->M_Uaswishlist->insert_pembayaran($uang_pelanggan, $username);
      redirect(base_url('index.php/uaswishlist/'));
   }

   function delete_item()
   {
      $this->M_Uaswishlist->delete_item($this->input->post('delete'));
      redirect(base_url('index.php/uaswishlist/'));
   }
}
