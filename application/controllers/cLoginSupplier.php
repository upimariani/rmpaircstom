<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cLoginSupplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->ci = &get_instance();
        $this->load->model('mLogin');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('vLoginSupplier');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->mLogin->auth_supplier($username, $password);
            if ($login) {
                $username = $login->username_supp;
                $id = $login->id_supplier;


                $array = array(
                    'id' => $id
                );

                $this->session->set_userdata($array);


                $this->ci->session->set_userdata('username', $username);
                $this->session->set_flashdata('success', 'Selamat Datang, ', $username);

                redirect(base_url('Supplier/cDashboard'));
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!!!');
                redirect('cLoginSupplier');
            }
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->session->set_flashdata('success', 'Anda Berhasil LogOut!');

        redirect('cLoginSupplier');
    }
    public function protect()
    {
        if ($this->ci->session->username('username') == "") {
            $this->session->set_flashdata('error', 'Anda Belum Melakukan Login');
            redirect('cLoginSupplier');
        }
    }
}
        
    /* End of file  Login.php */
