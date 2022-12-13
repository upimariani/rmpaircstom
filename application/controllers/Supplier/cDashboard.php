<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
    }
    public function index()
    {
        $data = array(
            'jml' => $this->mDashboard->jml_dashboard(),
            'stok_bb' => $this->mDashboard->stok_bb_supplier()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/vDashboard', $data);
        $this->load->view('Supplier/Layout/footer');
    }
}

/* End of file cDashboard.php */
