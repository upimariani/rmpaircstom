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
            'harga_produk' => $this->mProduk->produk_jadi(),
            'bb_produk' => $this->mProduk->bb_produk()
        );
        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/Manufacturing/vManufacturing', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function insertProduk()
    {

        $config['upload_path']          = './asset/foto-produk';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'produk' => $this->mProduk->bb(),
                'harga_produk' => $this->mProduk->harga_bb()
            );
            $this->load->view('Gudang/Layout/head');
            $this->load->view('Gudang/Layout/aside');
            $this->load->view('Gudang/Manufacturing/vManufacturing', $data);
            $this->load->view('Gudang/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_produk' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'size' => $this->input->post('size'),
                'gambar' => $upload_data['file_name'],
                'price_gudang' => $this->input->post('harga'),
                'stok_gudang' => '0',

            );
            $this->db->insert('produk', $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
            redirect('Gudang/cManufacturing');
        }
    }
    public function delete_produk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!');
        redirect('Gudang/cManufacturing');
    }
    public function editProduk($id)
    {

        $config['upload_path']          = './asset/foto-produk';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'produk' => $this->mProduk->bb(),
                'harga_produk' => $this->mProduk->harga_bb()
            );
            $this->load->view('Gudang/Layout/head');
            $this->load->view('Gudang/Layout/aside');
            $this->load->view('Gudang/Manufacturing/vManufacturing', $data);
            $this->load->view('Gudang/Layout/footer');
        } else {
            $produk = $this->mProduk->bb();
            if ($produk->gambar !== "") {
                unlink('./asset/foto-produk/' . $produk->gambar);
            }
            $upload_data =  $this->upload->data();
            $data = array(
                'nama_produk' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'size' => $this->input->post('size'),
                'gambar' => $upload_data['file_name'],
                'price_gudang' => $this->input->post('harga'),
                'stok_gudang' => '0',

            );
            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
            redirect('Gudang/cManufacturing');
        } //tanpa ganti gambar
        $data = array(
            'nama_produk' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'size' => $this->input->post('size'),
            // 'gambar' => $upload_data['file_name'],
            'price_gudang' => $this->input->post('harga'),
            // 'stok_gudang' => '0',

        );
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
        redirect('Gudang/cManufacturing');
    }


    public function manufactur()
    {
        $data = array(
            'produk' => $this->mProduk->bb(),
            'harga_produk' => $this->mProduk->harga_bb(),
            'bb_produk' => $this->mProduk->bb_produk(),
            'sablon_stok' => $this->mProduk->sablon_stok()
        );

        $this->load->view('Gudang/Layout/head');
        $this->load->view('Gudang/Layout/aside');
        $this->load->view('Gudang/Manufacturing/vManufatur', $data);
        $this->load->view('Gudang/Layout/footer');
    }
    public function add_sablon()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            //price == sisa sablon
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty')
        );
        $this->cart->insert($data);
        redirect('Gudang/cManufacturing/manufactur');
    }
    public function delete($id)
    {
        $this->cart->remove($id);
        redirect('Gudang/cManufacturing/manufactur');
    }
    public function produk_jadi()
    {
        //mengurangi sablon
        foreach ($this->cart->contents() as $key => $value) {
            $sisa_sablon = $value['price'] - $value['qty'];
            $data_sablon_keluar = array(
                'sisa_sablon' => $sisa_sablon
            );
            $this->db->where('id_detail_sb', $value['id']);
            $this->db->update('detail_invoicesb', $data_sablon_keluar);
        }

        //mengurangi bahan baku baju
        $bb = $this->input->post('produk_bb');
        $jml_bb_keluar = $this->input->post('jml_bb');
        $jml_bb_seb = $this->input->post('stok_seb');

        $sisa_bb = $jml_bb_seb - $jml_bb_keluar;
        $data_bb = array(
            'sisa_bb' => $sisa_bb
        );
        $this->db->where('id_detail_invoice', $bb);
        $this->db->update('detail_invoicebb', $data_bb);

        //update stok bahan jadi
        $id_produk = $this->input->post('produk_jadi');
        $stok_produk = $this->input->post('stok_produk');
        $stok_tambah = $this->input->post('jml_produk');

        $update_stok = $stok_produk + $stok_tambah;
        $data_produk = array(
            'stok_gudang' => $update_stok
        );
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data_produk);

        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Manufacturing Produk Selesai!!!');
        redirect('Gudang/cManufacturing');
    }
}

/* End of file cmanufacturing.php */
