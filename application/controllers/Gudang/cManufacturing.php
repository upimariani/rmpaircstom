<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cManufacturing extends CI_Controller
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
        $this->load->view('Gudang/Manufacturing/vManufacturing', $data);
        $this->load->view('Gudang/Layout/footer');
    }
}

/* End of file cmanufacturing.php */
