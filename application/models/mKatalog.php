<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }

    public function insert_transaksi($data)
    {
        $this->db->insert('transaksi_cust', $data);
    }
    public function detail_transaksi($data)
    {
        $this->db->insert('detail_transaksi', $data);
    }

    public function max_id_transaksi()
    {
        return $this->db->query("SELECT MAX(id_transaksi) as max FROM `transaksi_cust`")->row();
    }


    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi_cust');
        $this->db->join('konsumen', 'transaksi_cust.id_konsumen = transaksi_cust.id_konsumen', 'left');
        $this->db->where('konsumen.id_konsumen', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function bayar($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi_cust', $data);
    }
    public function view_detail($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi_cust` JOIN konsumen ON konsumen.id_konsumen=transaksi_cust.id_konsumen WHERE id_transaksi='" . $id . "';")->row();
        $data['produk'] = $this->db->query("SELECT * FROM `transaksi_cust` JOIN detail_transaksi ON transaksi_cust.id_transaksi=detail_transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk=produk.id_produk WHERE transaksi_cust.id_transaksi='" . $id . "';")->result();
        return $data;
    }
}

/* End of file mKatalog.php */
