<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProduk extends CI_Model
{
    public function insertProduk($data)
    {
        $this->db->insert('bahan_baku', $data);
    }
    public function selectProduk()
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_supplier', $this->session->userdata('id'));

        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_bb', $id);
        return $this->db->get()->row();
    }
    public function updatebahan_baku($id, $data)
    {
        $this->db->where('id_bb', $id);
        $this->db->update('bahan_baku', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_bb', $id);
        $this->db->delete('bahan_baku');
    }





    //gudang
    public function bb()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function bb_produk()
    {
        $this->db->select('*');
        $this->db->from('detail_invoicebb');
        $this->db->join('invoice_bb', 'detail_invoicebb.id_invoice = invoice_bb.id_invoice', 'left');
        $this->db->join('bahan_baku', 'detail_invoicebb.id_bb = bahan_baku.id_bb', 'left');
        $this->db->where('status_pesan=2');
        $this->db->where('sisa_bb!=0');
        return $this->db->get()->result();
    }
    public function sablon_stok()
    {
        $this->db->select('*');
        $this->db->from('detail_invoicesb');
        $this->db->join('invoice_bb', 'detail_invoicesb.id_invoice = invoice_bb.id_invoice', 'left');
        $this->db->join('sablon', 'detail_invoicesb.id_Sablon = sablon.id_Sablon', 'left');
        $this->db->where('status_pesan=2');
        return $this->db->get()->result();
    }
    public function update_harga($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function harga_bb()
    {
        $this->db->select('*');
        $this->db->from('detail_invoicebb');
        $this->db->join('invoice_bb', 'detail_invoicebb.id_invoice = invoice_bb.id_invoice', 'left');
        $this->db->join('bahan_baku', 'detail_invoicebb.id_bb = bahan_baku.id_bb', 'left');
        $this->db->where('status_pesan=2');
        return $this->db->get()->result();
    }
    public function produk_jadi()
    {
        $this->db->select('*');
        $this->db->from('produk');

        return $this->db->get()->result();
    }
}

/* End of file mProduk.php */
