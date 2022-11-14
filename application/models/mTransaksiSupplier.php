<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiSupplier extends CI_Model
{
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('invoice_bb');
        $this->db->join('user', 'invoice_bb.id_user = user.id_user', 'left');
        $this->db->join('supplier', 'supplier.id_supplier = invoice_bb.id_supplier', 'left');
        $this->db->where('invoice_bb.id_supplier', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function status_konfirmasi($id, $data)
    {
        $this->db->where('id_invoice', $id);
        $this->db->update('invoice_bb', $data);
    }

    public function produk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function sablon($id)
    {
        $this->db->select('*');
        $this->db->from('sablon');
        $this->db->where('id_sablon', $id);
        return $this->db->get()->row();
    }
}

/* End of file mTransaksiSupplier.php */
