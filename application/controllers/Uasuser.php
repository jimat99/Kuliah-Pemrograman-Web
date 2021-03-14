<?php
class Uasuser extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model("M_Uasuser");
   }

   function index()
   {
      $this->load->view('UAS/LOGIN');
   }

   function login()
   {
      $username = $this->input->post("username");
      $password = $this->input->post("password");

      if ($this->M_Uasuser->cek_login_valid($username, $password)) {
         $this->session->set_userdata("username", $username);
         $this->session->set_flashdata("pesan", "Anda berhasil login");
         redirect(base_url("index.php/uashome"));
      } else {
         $this->session->set_flashdata("pesan", "Anda gagal login");
         redirect(base_url("index.php/uasuser"));
      }
   }

   function form_daftar_akun()
   {
      $this->load->view('UAS/DAFTAR-AKUN');
   }

   function daftar_akun()
   {
      $username = $this->input->post("username");
      $password = $this->input->post("password");

      if ($this->M_Uasuser->tambah_akun($username, $password)) {
         $pesan = "Daftar akun berhasil";
      } else {
         $pesan = "Daftar akun gagal";
      }
      $this->session->set_flashdata("pesan", $pesan);
      redirect(base_url("index.php/uasuser"));
   }

   function form_update_akun()
   {
      $this->load->view('UAS/UPDATE-AKUN');
   }

   function update_akun()
   {
      $usernameLama = $this->session->userdata("username");
      $data_id_pelanggan = $this->M_Uasuser->cari_id_pelanggan($usernameLama);

      $usernameBaru = $this->input->post("username");
      $password     = $this->input->post("password");

      if ($this->M_Uasuser->update_akun(
         $data_id_pelanggan['id_pelanggan'], 
         $usernameBaru, 
         $password
      )) {
         $pesan = "Update akun berhasil";
      } else {
         $pesan = "Update akun gagal";
      }
      $this->session->set_flashdata("pesan", $pesan);
      redirect(base_url("index.php/uashome/"));
   }

   function logout (){
      $this->session->sess_destroy();
      redirect(base_url("index.php/uashome/"));
   }
}
