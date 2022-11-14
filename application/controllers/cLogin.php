<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
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

            $this->load->view('vLogin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->mLogin->auth($username, $password);
            if ($login) {
                $username = $login->username;
                $id = $login->id_user;
                $level = $login->tipe_user;


                $array = array(
                    'id' => $id
                );

                $this->session->set_userdata($array);


                if ($level == '1') {
                    $this->ci->session->set_userdata('username', $username);
                    $this->session->set_flashdata('success', 'Selamat Datang, ', $username);

                    redirect(base_url('Admin/cDashboard'));
                } else if ($level == '2') {
                    $this->ci->session->set_userdata('username', $username);
                    $this->session->set_flashdata('success', 'Selamat Datang, ', $username);
                    redirect(base_url('Gudang/cDashboard'));
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!!!');
                redirect('cLogin');
            }
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->session->set_flashdata('success', 'Anda Berhasil LogOut!');

        redirect('cLogin');
    }
    public function protect()
    {
        if ($this->ci->session->username('username') == "") {
            $this->session->set_flashdata('error', 'Anda Belum Melakukan Login');
            redirect('cLogin');
        }
    }
}
        
    /* End of file  Login.php */
