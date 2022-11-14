<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHalamanUtama extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKatalog');
    }

    public function index()
    {
        $data = array(
            'katalog' => $this->mKatalog->produk()
        );
        $this->load->view('Konsumen/Layout/head');
        $this->load->view('Konsumen/Layout/aside');
        $this->load->view('Konsumen/vHalamanUtama', $data);
        $this->load->view('Konsumen/Layout/footer');
    }
    public function addtocart()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'stok' => $this->input->post('stok')
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('success', 'Produk berhasil disimpan dikeranjang!!!');

        redirect('Konsumen/cHalamanUtama');
    }
    public function delete($id)
    {
        $this->cart->remove($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus dikeranjang!!!');
        redirect('Konsumen/cHalamanUtama');
    }

    public function checkout()
    {
        $data = array(
            'id_konsumen' => $this->session->userdata('id'),
            'tgl_order' => date('Y-m-d'),
            'status_order' => '0',
            'total_order' => $this->cart->total(),
            'bukti_payment' => '0'
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
        redirect('Konsumen/cTransaksiKonsumen');
    }
}

/* End of file cHalamanUtama.php */
