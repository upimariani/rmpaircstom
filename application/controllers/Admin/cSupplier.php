<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSupplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDataSupplier');
	}

	public function index()
	{
		$data = array(
			'supplier' => $this->mDataSupplier->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/DataSupplier/vSupplier', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createSupplier()
	{
		$this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/DataSupplier/vCreateSupplier');
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_supplier' => $this->input->post('nama'),
				'alamat_supplier' => $this->input->post('alamat'),
				'nama_toko' => $this->input->post('nama_toko'),
				'no_hp_supplier' => $this->input->post('no_hp'),
				'username_supp' => $this->input->post('username'),
				'pass_supp' => $this->input->post('password')
			);
			$this->mDataSupplier->insert($data);
			$this->session->set_flashdata('success', 'Data Supplier Berhasil Disimpan!');
			redirect('Admin/cSupplier', 'refresh');
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'supplier' => $this->mDataSupplier->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/DataSupplier/vUpdateSupplier', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_supplier' => $this->input->post('nama'),
				'alamat_supplier' => $this->input->post('alamat'),
				'nama_toko' => $this->input->post('nama_toko'),
				'no_hp_supplier' => $this->input->post('no_hp'),
				'username_supp' => $this->input->post('username'),
				'pass_supp' => $this->input->post('password')
			);
			$this->mDataSupplier->update($id, $data);
			$this->session->set_flashdata('success', 'Data Supplier Berhasil Diperbaharui!');
			redirect('Admin/cSupplier', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->mDataSupplier->delete($id);
		$this->session->set_flashdata('success', 'Data Supplier Berhasil Dihapus!');
		redirect('Admin/cSupplier', 'refresh');
	}
}

/* End of file cSupplier.php */
