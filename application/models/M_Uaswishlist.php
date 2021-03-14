<?php
class M_Uaswishlist extends CI_Model
{
    function selectqty()
    {
        $this->db->select('qty');
        $this->db->where('id_barang', 1);
        $idpelanggan = $this->db->get('detailpembelian');
        $qty['0'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $qty['0'] = $idpelanggan->row_array()['qty'];
        }

        $this->db->select('qty');
        $this->db->where('id_barang', 2);
        $idpelanggan = $this->db->get('detailpembelian');
        $qty['1'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $qty['1'] = $idpelanggan->row_array()['qty'];
        }

        $this->db->select('qty');
        $this->db->where('id_barang', 3);
        $idpelanggan = $this->db->get('detailpembelian');
        $qty['2'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $qty['2'] = $idpelanggan->row_array()['qty'];
        }

        $this->db->select('qty');
        $this->db->where('id_barang', 4);
        $idpelanggan = $this->db->get('detailpembelian');
        $qty['3'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $qty['3'] = $idpelanggan->row_array()['qty'];
        }

        return $qty;
    }

    function selectharga()
    {
        $this->db->select('totalharga');
        $this->db->where('id_barang', 1);
        $idpelanggan = $this->db->get('detailpembelian');
        $totalharga['0'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $totalharga['0'] = $idpelanggan->row_array()['totalharga'];
        }

        $this->db->select('totalharga');
        $this->db->where('id_barang', 2);
        $idpelanggan = $this->db->get('detailpembelian');
        $totalharga['1'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $totalharga['1'] = $idpelanggan->row_array()['totalharga'];
        }

        $this->db->select('totalharga');
        $this->db->where('id_barang', 3);
        $idpelanggan = $this->db->get('detailpembelian');
        $totalharga['2'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $totalharga['2'] = $idpelanggan->row_array()['totalharga'];
        }

        $this->db->select('totalharga');
        $this->db->where('id_barang', 4);
        $idpelanggan = $this->db->get('detailpembelian');
        $totalharga['3'] = 0;
        if ($idpelanggan->num_rows() > 0) {
            $totalharga['3'] = $idpelanggan->row_array()['totalharga'];
        }

        return $totalharga;
    }

    function update($id)
    {
        // select harga from barang
        $this->db->select('harga');
        $this->db->where('id_barang', $id);
        $idpelanggan = $this->db->get('barang');
        $harga = $idpelanggan->row_array()['harga'];

        // update qty
        $qty = $this->input->post('qty');
        $data['qty'] = $qty;
        $this->db->where("id_barang", $id);
        $this->db->update("detailpembelian", $data);

        // total harga
        $total_harga = $qty * $harga;
        $data['totalharga'] = $total_harga;
        $this->db->where("id_barang", $id);
        $this->db->update("detailpembelian", $data);
    }

    function hitung_total_harga()
    {
        $total_per = $this->selectharga();
        $total_harga = $total_per['0'] + $total_per['1'] + $total_per['2'] + $total_per['3'];
        return $total_harga;
    }

    function insert_pembayaran($uang_pelanggan, $username)
    {
        $this->db->select("id_pelanggan");
        $this->db->from("pelanggan");
        $this->db->where("username", $username);
        $query = $this->db->get();

        $data_pelanggan = array(
            "id_pembayaran" => NULL,
            "uang_pelanggan"  => $uang_pelanggan,
            "id_pelanggan" => $query->row_array()['id_pelanggan']
        );
        $this->db->insert("pembayaran", $data_pelanggan);
    }

    function delete_item($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('detailpembelian');
    }
}
