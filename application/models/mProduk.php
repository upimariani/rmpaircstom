<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProduk extends CI_Model
{
    public function insertProduk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function selectProduk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function updateProduk($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');

        $this->db->where('id_produk', $id);
        $this->db->delete('size');
    }


    //size
    public function selectSize($id)
    {
        $data['size'] = $this->db->query("SELECT * FROM `size` JOIN produk ON size.id_produk=produk.id_produk WHERE produk.id_produk='" . $id . "'")->result();
        $data['produk'] = $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $id . "'")->row();
        return $data;
    }
    public function insertSize($data)
    {
        $this->db->insert('size', $data);
    }
}

/* End of file mProduk.php */
