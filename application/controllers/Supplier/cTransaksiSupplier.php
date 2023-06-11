<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiSupplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiSupplier');
        $this->load->model('mTransaksiBB');
    }


    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksiSupplier->transaksi()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/vTransaksiSupplier', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function detail_transaksi($id, $type)
    {
        if ($type == '1') {
            $data = array(
                'detail' => $this->mTransaksiBB->detail_transaksi_produk($id)
            );
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/aside');
            $this->load->view('Supplier/vDetailTransaksiP', $data);
            $this->load->view('Supplier/Layout/footer');
        } else {
            $data = array(
                'detail' => $this->mTransaksiBB->detail_transaksi_sablon($id)
            );
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/aside');
            $this->load->view('Supplier/vDetailTransaksiS', $data);
            $this->load->view('Supplier/Layout/footer');
        }
    }
    public function konfirmasi($id, $type)
    {
        $data = array(
            'status_pesan' => '2'
        );
        $this->mTransaksiSupplier->status_konfirmasi($id, $data);

        // //update stok gudang
        // if ($type == '1') {
        //     $detail = $this->mTransaksiBB->detail_transaksi_produk($id);
        //     $stok = 0;
        //     foreach ($detail['produk'] as $key => $value) {
        //         $produk = $this->mTransaksiSupplier->produk($value->id_produk);
        //         $stok = $value->qty_bb + $produk->stok_gudang;
        //         $data_stok = array(

        //             'stok_gudang' => $stok
        //         );
        //         $this->db->where('id_produk', $value->id_produk);
        //         $this->db->update('produk', $data_stok);
        //     }
        // } else {
        //     $detail = $this->mTransaksiBB->detail_transaksi_sablon($id);
        //     $stok = 0;
        //     foreach ($detail['sablon'] as $key => $value) {
        //         $sablon = $this->mTransaksiSupplier->sablon($value->id_sablon);
        //         $stok = $value->qty_sablon + $sablon->stok_gudang;

        //         $data_stok_sablon = array(
        //             'stok_gudang' => $stok
        //         );
        //         $this->db->where('id_sablon', $value->id_sablon);
        //         $this->db->update('sablon', $data_stok_sablon);
        //     }
        // }
        $this->session->set_flashdata('success', 'Transaksi Berhasil Di Konfirmasi!!!');
        redirect('Supplier/cTransaksiSupplier');
    }
}

/* End of file cTransaksiSupplier.php */
