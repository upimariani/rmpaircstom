<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiKons');
        $this->load->model('mKatalog');
    }


    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksiKons->transaksi_langsung()
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vTransaksiLangsung', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function detail_transaksi($id)
    {
        $data = array(
            'detail' => $this->mTransaksiKons->detail_transaksi_langsung($id)
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vDetailTransaksiLangsung', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function createtran()
    {
        $data = array(
            'produk' => $this->mKatalog->produk()
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vCreateTransaksiLangsung', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('produk'),
            'name'  => $this->input->post('nama'),
            'price'  => $this->input->post('harga'),
            'qty'  => $this->input->post('qty'),
            'stok'  => $this->input->post('stok'),
        );
        $this->cart->insert($data);
        redirect('Gudang/cTransaksiLangsung/createtran');
    }
    public function checkout()
    {
        $data = array(
            'id_konsumen' => '0',
            'tgl_order' => date('Y-m-d'),
            'status_order' => '2',
            'total_order' => $this->cart->total(),
            'bukti_payment' => '1',
            'type_transaksi' => '2'
        );
        $this->mKatalog->insert_transaksi($data);

        $max_id = $this->mKatalog->max_id_transaksi();

        foreach ($this->cart->contents() as $key => $value) {
            $data_detail = array(
                'id_transaksi' => $max_id->max,
                'id_produk' => $value['id'],
                'gambar_sablon' => '0',
                'qty' => $value['qty']
            );
            $this->mKatalog->detail_transaksi($data_detail);
        }
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Disimpan');
        $this->cart->destroy();
        redirect('Gudang/cTransaksiLangsung');
    }
    public function delete($id)
    {
        $this->cart->remove($id);
        redirect('Gudang/cTransaksiLangsung/createtran');
    }
}

/* End of file cTransaksiLangsung.php */
