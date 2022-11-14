<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAuthKonsumen');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Konsumen/vLogin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->mAuthKonsumen->login($username, $password);
            if ($login) {
                $id = $login->id_konsumen;


                $array = array(
                    'id' => $id
                );

                $this->session->set_userdata($array);

                redirect(base_url('Konsumen/cHalamanUtama'));
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!!!');
                redirect('Konsumen/cAuth');
            }
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama Konsumen', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Konsumen', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Konsumen/vRegister');
        } else {
            $data = array(
                'nama_konsumen' => $this->input->post('nama'),
                'alamat_konsumen' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            $this->mAuthKonsumen->register($data);
            $this->session->set_flashdata('success', 'Anda Berhasil Registrasi!! Silahkan Login!!!');
            redirect('Konsumen/cAuth');
        }
    }
    public function logout()
    {
        $this->cart->destroy();
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('success', 'Anda Berhasil LogOut!');
        redirect('Konsumen/cAuth');
    }
}

/* End of file cAuth.php */
