<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mSablon extends CI_Model
{
    public function insertsablon($data)
    {
        $this->db->insert('sablon', $data);
    }
    public function selectsablon()
    {
        $this->db->select('*');
        $this->db->from('sablon');
        $this->db->where('id_supplier', $this->session->userdata('id'));

        return $this->db->get()->result();
    }

    public function updatesablon($id, $data)
    {
        $this->db->where('id_sablon', $id);
        $this->db->update('sablon', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_sablon', $id);
        $this->db->delete('sablon');
    }
}

/* End of file mSablon.php */
