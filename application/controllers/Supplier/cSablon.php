<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSablon extends CI_Controller
{

    public function index()
    {
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/Sablon/vSablon');
        $this->load->view('Supplier/Layout/footer');
    }
}

/* End of file cSablon.php */
