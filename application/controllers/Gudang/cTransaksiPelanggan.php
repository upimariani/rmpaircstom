<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiPelanggan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiKons');
    }

    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksiKons->select()
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vtransaksiPelanggan', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function konfirmasi($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->mTransaksiKons->konfirmasi($id, $data);
        $this->session->set_flashdata('success', 'Transaksi Customer Berhasil di Konfimasi!!');
        redirect('Gudang/cTransaksiPelanggan');
    }
    public function detail_transaksi($id)
    {
        $data = array(
            'detail' => $this->mTransaksiKons->detail_transaksi($id)
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vDetailTransaksiPelanggan', $data);
        $this->load->view('Gudang/Layout/footer');
    }
}

/* End of file cTransaksiPelanggan.php */
