<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiPelanggan extends CI_Controller
{

    public function index()
    {
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vtransaksiPelanggan');
        $this->load->view('Gudang/Layout/footer');
    }
}

/* End of file cTransaksiPelanggan.php */
