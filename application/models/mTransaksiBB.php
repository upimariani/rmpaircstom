<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiBB extends CI_Model
{
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('invoice_bb');
        $this->db->join('supplier', 'invoice_bb.id_supplier = invoice_bb.id_supplier', 'left');
        $this->db->join('user', 'user.id_user = invoice_bb.id_user', 'left');
        return $this->db->get()->result();
    }
    public function produk($id)
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_supplier', $id);
        return $this->db->get()->result();
    }
    public function sablon($id)
    {
        $this->db->select('*');
        $this->db->from('sablon');
        $this->db->where('id_supplier', $id);
        return $this->db->get()->result();
    }

    public function insert_transaksi($data)
    {
        $this->db->insert('invoice_bb', $data);
    }
    public function insert_detail_produk($data)
    {
        $this->db->insert('detail_invoicebb', $data);
    }

    public function insert_detail_sablon($data)
    {
        $this->db->insert('detail_invoicesb', $data);
    }
    public function max_id_transaksi()
    {
        return $this->db->query("SELECT MAX(id_invoice) as max FROM `invoice_bb`")->row();
    }


    public function detail_transaksi_produk($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `invoice_bb` JOIN user ON user.id_user=invoice_bb.id_user JOIN supplier ON invoice_bb.id_supplier=supplier.id_supplier WHERE invoice_bb.id_invoice='" . $id . "';")->row();
        $data['produk'] = $this->db->query("SELECT * FROM `invoice_bb` JOIN detail_invoicebb ON invoice_bb.id_invoice=detail_invoicebb.id_invoice JOIN bahan_baku ON detail_invoicebb.id_bb=bahan_baku.id_bb WHERE invoice_bb.id_invoice='" . $id . "';")->result();
        return $data;
    }
    public function detail_transaksi_sablon($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `invoice_bb` JOIN user ON user.id_user=invoice_bb.id_user JOIN supplier ON invoice_bb.id_supplier=supplier.id_supplier WHERE invoice_bb.id_invoice='" . $id . "';")->row();
        $data['sablon'] = $this->db->query("SELECT * FROM `invoice_bb` JOIN detail_invoicesb ON invoice_bb.id_invoice=detail_invoicesb.id_invoice JOIN sablon ON detail_invoicesb.id_sablon=sablon.id_sablon WHERE invoice_bb.id_invoice='" . $id . "';")->result();
        return $data;
    }

    public function bayar($id, $data)
    {
        $this->db->where('id_invoice', $id);
        $this->db->update('invoice_bb', $data);
    }
}

/* End of file mTransaksiBB.php */
