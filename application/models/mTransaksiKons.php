<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiKons extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('transaksi_cust');
        $this->db->join('konsumen', 'konsumen.id_konsumen = transaksi_cust.id_konsumen', 'left');
        return $this->db->get()->result();
    }
    public function konfirmasi($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi_cust', $data);
    }
    public function detail_transaksi($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi_cust` JOIN konsumen ON konsumen.id_konsumen=transaksi_cust.id_konsumen WHERE id_transaksi='" . $id . "';")->row();
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi_cust` JOIN detail_transaksi ON transaksi_cust.id_transaksi=detail_transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_transaksi.id_produk WHERE transaksi_cust.id_transaksi='" . $id . "';")->result();
        return $data;
    }

    //transaksi langsung
    public function transaksi_langsung()
    {
        $this->db->select('*');
        $this->db->from('transaksi_cust');
        $this->db->where('type_transaksi=2');
        return $this->db->get()->result();
    }
    public function detail_transaksi_langsung($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi_cust` WHERE id_transaksi='" . $id . "';")->row();
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi_cust` JOIN detail_transaksi ON transaksi_cust.id_transaksi=detail_transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_transaksi.id_produk WHERE transaksi_cust.id_transaksi='" . $id . "';")->result();
        return $data;
    }
}

/* End of file mTransaksiKons.php */
