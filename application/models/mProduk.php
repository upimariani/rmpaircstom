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
    public function editSize($id)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('size.id_size', $id);
        return $this->db->get()->row();
    }
    public function updateSize($id, $data)
    {
        $this->db->where('id_size', $id);
        $this->db->update('size', $data);
    }
    public function deleteSize($id)
    {
        $this->db->where('id_size', $id);
        $this->db->delete('size');
    }


    //gudang
    public function bb()
    {
        $this->db->select('*');
        $this->db->from('produk');

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
        $this->db->from('produk');
        $this->db->where('price_gudang!=0');
        return $this->db->get()->result();
    }
}

/* End of file mProduk.php */
