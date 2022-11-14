<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiBB extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiBB');
        $this->load->model('mDataSupplier');
    }


    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksiBB->transaksi(),
            'supplier' => $this->mDataSupplier->select()
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vTransaksiBB', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function create()
    {
        $jenis = $this->input->post('jenis');
        $supplier = $this->input->post('supplier');
        if ($jenis == '1') {
            $jenis_produk = $this->mTransaksiBB->produk($supplier);
        } else {
            $jenis_produk = $this->mTransaksiBB->sablon($supplier);
        }

        $data = array(
            'supplier' => $this->input->post('supplier'),
            'jenis_produk' => $jenis_produk,
            'jenis' => $jenis
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vCreateTransaksiBB', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function addtocart()
    {
        $data = array(
            'id' => $this->input->post('pil_jenis'),
            'name' => $this->input->post('nama'),
            'price' => $this->input->post('harga'),
            'qty' => $this->input->post('qty'),
            'stok' => $this->input->post('stok'),
        );
        $this->cart->insert($data);


        $jenis = $this->input->post('jenis');
        $supplier = $this->input->post('supplier');
        if ($jenis == '1') {
            $jenis_produk = $this->mTransaksiBB->produk($supplier);
        } else {
            $jenis_produk = $this->mTransaksiBB->sablon($supplier);
        }

        $data = array(
            'supplier' => $this->input->post('supplier'),
            'jenis_produk' => $jenis_produk,
            'jenis' => $this->input->post('jenis')
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vCreateTransaksiBB', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function delete($id)
    {
        $this->cart->remove($id);

        $jenis = $this->input->post('jenis');
        $supplier = $this->input->post('supplier');
        if ($jenis == '1') {
            $jenis_produk = $this->mTransaksiBB->produk($supplier);
        } else {
            $jenis_produk = $this->mTransaksiBB->sablon($supplier);
        }

        $data = array(
            'supplier' => $this->input->post('supplier'),
            'jenis_produk' => $jenis_produk,
            'jenis' => $jenis
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/vCreateTransaksiBB', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function checkout($jenis, $supplier)
    {
        //produk
        if ($jenis == '1') {
            $data = array(
                'id_supplier' => $supplier,
                'id_user' => $this->session->userdata['id'],
                'tgl_invoice' => date('Y-m-d'),
                'total_invoice' => $this->cart->total(),
                'status_pesan' => '0',
                'bukti_bayar' => '0',
                'type_transaksi' => '1'
            );
            $this->mTransaksiBB->insert_transaksi($data);
            $this->session->set_flashdata('success', 'Data Transaksi Produk Berhasil Dikirim!!!');



            $max = $this->mTransaksiBB->max_id_transaksi();
            foreach ($this->cart->contents() as $key => $value) {
                $data_detail = array(
                    'id_produk' => $value['id'],
                    'id_invoice' => $max->max,
                    'qty_bb' => $value['qty']
                );
                $this->mTransaksiBB->insert_detail_produk($data_detail);
            }
        } else {
            $data = array(
                'id_supplier' => $supplier,
                'id_user' => $this->session->userdata['id'],
                'tgl_invoice' => date('Y-m-d'),
                'total_invoice' => $this->cart->total(),
                'status_pesan' => '0',
                'bukti_bayar' => '0',
                'type_transaksi' => '2'
            );
            $this->mTransaksiBB->insert_transaksi($data);
            $this->session->set_flashdata('success', 'Data Transaksi Sablon Berhasil Dikirim!!!');



            $max = $this->mTransaksiBB->max_id_transaksi();
            foreach ($this->cart->contents() as $key => $value) {
                $data_detail = array(
                    'id_sablon' => $value['id'],
                    'id_invoice' => $max->max,
                    'qty_sablon' => $value['qty']
                );
                $this->mTransaksiBB->insert_detail_sablon($data_detail);
            }
        }
        $this->cart->destroy();
        redirect('Gudang/cTransaksiBB');
    }


    //detail
    public function detail_transaksi($id, $type)
    {
        if ($type == '1') {
            $data = array(
                'detail' => $this->mTransaksiBB->detail_transaksi_produk($id)
            );
            $this->load->view('Gudang/Layout/head');
            $this->load->view('Gudang/Layout/aside');
            $this->load->view('Gudang/vDetailTransaksiP', $data);
            $this->load->view('Gudang/Layout/footer');
        } else {
            $data = array(
                'detail' => $this->mTransaksiBB->detail_transaksi_sablon($id)
            );
            $this->load->view('Gudang/Layout/head');
            $this->load->view('Gudang/Layout/aside');
            $this->load->view('Gudang/vDetailTransaksiS', $data);
            $this->load->view('Gudang/Layout/footer');
        }
    }

    public function bayar($id)
    {
        $config['upload_path']          = './asset/bukti';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'transaksi' => $this->mTransaksiBB->transaksi(),
                'supplier' => $this->mDataSupplier->select()
            );
            $this->load->view('Gudang/Layout/head');
            $this->load->view('Gudang/Layout/aside');
            $this->load->view('Gudang/vTransaksiBB', $data);
            $this->load->view('Gudang/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'status_pesan' => '1',
                'bukti_bayar' => $upload_data['file_name']

            );
            $this->mTransaksiBB->bayar($id, $data);
            $this->session->set_flashdata('success', 'Data Pembayaran Berhasil Diupload!');
            redirect('Gudang/cTransaksiBB');
        }
    }
}

/* End of file cTransaksiBB.php */
