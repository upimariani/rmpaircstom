<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mProduk');
    }


    public function index()
    {
        $data = array(
            'produk' => $this->mProduk->selectProduk()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/Produk/vProduk', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function insertProduk()
    {
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
        $this->form_validation->set_rules('size', 'Size Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required');
        $this->form_validation->set_rules('stok', 'Stok Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/aside');
            $this->load->view('Supplier/Produk/vCreateProduk');
            $this->load->view('Supplier/Layout/footer');
        } else {
            $config['upload_path']          = './asset/foto-produk';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('Supplier/Layout/head');
                $this->load->view('Supplier/Layout/aside');
                $this->load->view('Supplier/Produk/vCreateProduk', $error);
                $this->load->view('Supplier/Layout/footer');
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'id_supplier' => $this->session->userdata('id'),
                    'nama_produk' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name'],
                    'size' => $this->input->post('size'),
                    'price_supp' => $this->input->post('harga'),
                    'stok_supp' => $this->input->post('stok'),

                );
                $this->mProduk->insertProduk($data);
                $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
                redirect('Supplier/cProduk');
            }
        }
    }
    public function editProduk($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/foto-produk';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'produk' => $this->mProduk->edit($id)
                );
                $this->load->view('Supplier/Layout/head');
                $this->load->view('Supplier/Layout/aside');
                $this->load->view('Supplier/Produk/vUpdateProduk', $data);
                $this->load->view('Supplier/Layout/footer');
            } else {
                $produk = $this->mProduk->selectProduk();
                if ($produk->gambar !== "") {
                    unlink('./asset/foto-produk/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'nama_produk' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name'],
                    'size' => $this->input->post('size'),
                    'price_supp' => $this->input->post('harga'),
                    'stok_supp' => $this->input->post('stok')
                );
                $this->mProduk->updateProduk($id, $data);
                $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
                redirect('Supplier/cProduk');
            } //tanpa ganti gambar
            $data = array(
                'nama_produk' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'size' => $this->input->post('size'),
                'price_supp' => $this->input->post('harga'),
                'stok_supp' => $this->input->post('stok')
            );
            $this->mProduk->updateProduk($id, $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
            redirect('Supplier/cProduk');
        }
        $data = array(
            'produk' => $this->mProduk->edit($id)
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/Produk/vUpdateProduk', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function delete($id)
    {
        $this->mProduk->delete($id);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
        redirect('Supplier/cProduk');
    }

    //size
    public function selectSize($id)
    {
        $data = array(
            'id' => $id,
            'size' => $this->mProduk->selectSize($id)
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/Produk/vSize', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function insertSize($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Size', 'required');
        $this->form_validation->set_rules('harga', 'Harga Size', 'required');
        $this->form_validation->set_rules('stok', 'Stok Produk Size', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'id' => $id,
                'size' => $this->mProduk->selectSize($id)
            );
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/aside');
            $this->load->view('Supplier/Produk/vCreateSize', $data);
            $this->load->view('Supplier/Layout/footer');
        } else {
            $data = array(
                'id_produk' => $id,
                'nama_size' => $this->input->post('nama'),
                'price_supp' => $this->input->post('harga'),
                'stok_supp' => $this->input->post('stok'),
            );
            $this->mProduk->insertSize($data);
            $this->session->set_flashdata('success', 'Data Size Produk Berhasil Ditambahkan !!!');
            redirect('Supplier/cProduk/selectSize/' . $id);
        }
    }
    public function editSize($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Size', 'required');
        $this->form_validation->set_rules('harga', 'Harga Size', 'required');
        $this->form_validation->set_rules('stok', 'Stok Produk Size', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'size' => $this->mProduk->editSize($id)
            );
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/aside');
            $this->load->view('Supplier/Produk/vUpdateSize', $data);
            $this->load->view('Supplier/Layout/footer');
        } else {
            $id_produk = $this->input->post('id_produk');
            $data = array(
                'nama_size' => $this->input->post('nama'),
                'price_supp' => $this->input->post('harga'),
                'stok_supp' => $this->input->post('stok'),
            );
            $this->mProduk->updateSize($id, $data);
            $this->session->set_flashdata('success', 'Data Size Produk Berhasil Diperbaharui !!!');
            redirect('Supplier/cProduk/selectSize/' . $id_produk);
        }
    }
    public function deleteSize($id, $id_produk)
    {
        $this->mProduk->deleteSize($id);
        $this->session->set_flashdata('success', 'Data Size Produk Berhasil Dihapus !!!');
        redirect('Supplier/cProduk/selectSize/' . $id_produk);
    }
}

/* End of file cProduk.php */
