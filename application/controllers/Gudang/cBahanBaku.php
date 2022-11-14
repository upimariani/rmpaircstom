<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBaku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mProduk');
    }


    public function index()
    {
        $data = array(
            'produk' => $this->mProduk->bb(),
            'harga_produk' => $this->mProduk->harga_bb()
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vBahanBaku', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function create()
    {
        $produk = $this->input->post('produk');
        $data = array(
            'price_gudang' => $this->input->post('harga')
        );
        $this->mProduk->update_harga($produk, $data);
        $this->session->set_flashdata('success', 'Data Harga Produk Berhasil Disimpan!!!');
        redirect('Gudang/cBahanBaku');
    }
}

/* End of file cBahanBaku.php */
