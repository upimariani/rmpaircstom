<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSablon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mSablon');
    }


    public function index()
    {
        $data = array(

            'sablon' => $this->mSablon->selectsablon()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/Sablon/vSablon', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function create()
    {
        $data = array(
            'id_supplier' => $this->session->userdata('id'),
            'jenis_sablon' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'warna' => $this->input->post('warna'),
            'stok' => $this->input->post('jumlah')
        );
        $this->mSablon->insertsablon($data);
        $this->session->set_flashdata('success', 'data Sablon Berhasil Disimpan!!!');
        redirect('Supplier/cSablon');
    }
    public function update($id)
    {
        $data = array(
            'id_supplier' => $this->session->userdata('id'),
            'jenis_sablon' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'warna' => $this->input->post('warna'),
            'stok' => $this->input->post('jumlah')
        );
        $this->mSablon->updatesablon($id, $data);
        $this->session->set_flashdata('success', 'Data Sablon Berhasil Diperbaharui!!!');
        redirect('Supplier/cSablon');
    }
    public function delete($id)
    {
        $this->mSablon->delete($id);
        $this->session->set_flashdata('success', 'Data Sablon Berhasil Dihapus!!!');
        redirect('Supplier/cSablon');
    }
}

/* End of file cSablon.php */
