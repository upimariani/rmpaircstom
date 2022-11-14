<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiKonsumen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKatalog');
    }


    public function index()
    {
        $data = array(
            'transaksi' => $this->mKatalog->transaksi()
        );
        $this->load->view('Konsumen/Layout/head');
        $this->load->view('Konsumen/Layout/aside');
        $this->load->view('Konsumen/vTransaksiKonsumen', $data);
        $this->load->view('Konsumen/Layout/footer');
    }
    public function bayar($id)
    {
        $config['upload_path']          = './asset/bukti';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'transaksi' => $this->mKatalog->transaksi()
            );
            $this->load->view('Konsumen/Layout/head');
            $this->load->view('Konsumen/Layout/aside');
            $this->load->view('Konsumen/vTransaksiKonsumen', $data);
            $this->load->view('Konsumen/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'status_order' => '1',
                'bukti_payment' => $upload_data['file_name']

            );
            $this->mKatalog->bayar($id, $data);
            $this->session->set_flashdata('success', 'Data Pembayaran Berhasil Diupload!');
            redirect('Konsumen/cTransaksiKonsumen');
        }
    }
    public function detail($id)
    {
        $data = array(
            'detail' => $this->mKatalog->view_detail($id)
        );
        $this->load->view('Konsumen/Layout/head');
        $this->load->view('Konsumen/Layout/aside');
        $this->load->view('Konsumen/vDetailTransKons', $data);
        $this->load->view('Konsumen/Layout/footer');
    }
}

/* End of file cTransaksiKonsumen.php */
