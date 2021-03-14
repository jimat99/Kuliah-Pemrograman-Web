<?php
class M_Uashome extends CI_Model
{

    function selectHarga($idbarang)
    {
        $this->db->select('harga');
        $this->db->where('id_barang', $idbarang);
        $harga = $this->db->get('barang');
        return $harga->row_array();
        
    }

    function selectidpelanggan($username)
    {
        $this->db->select('id_pelanggan');
        $this->db->where('username', $username);
        $idpelanggan = $this->db->get('pelanggan');
        return $idpelanggan->row_array();
    }


    function insert($harga, $idbarang, $idpelanggan)
    {
        $data = array(
            'id_pelanggan' => $idpelanggan,
            'id_barang' => $idbarang,
            'qty' => '1',
            'totalharga' => $harga

        );
        return $this->db->insert('detailpembelian', $data);
    }
}
