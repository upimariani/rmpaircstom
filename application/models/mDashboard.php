<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function jml_dashboard()
    {
        $data['bahanbaku'] = $this->db->query("SELECT COUNT(id_produk) as produk FROM `produk` WHERE price_gudang !=0;")->row();
        $data['transaksi_bb'] = $this->db->query("SELECT COUNT(id_invoice) as tran_bb FROM `invoice_bb`;")->row();
        $data['produk'] = $this->db->query("SELECT COUNT(id_transaksi) as tran_cust FROM `transaksi_cust`;")->row();
        $data['tinta'] = $this->db->query("SELECT COUNT(id_sablon) as sablon FROM `sablon`;")->row();
        return $data;
    }
    public function stok_bb()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function stok_bb_supplier()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_supplier', $id);
        return $this->db->get()->result();
    }
}

/* End of file mDashboard.php */
