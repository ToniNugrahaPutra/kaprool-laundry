<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct(); // manggil konstruktor dari CI_Controller
		$this->load->model("Admin_model");
		$this->load->library("form_validation");

		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		//is_logged_in(); // cek session dan cek hak akses
	}

	public function index()
	{
		$data["title"] = "Dashboard Admin";

		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
		$data["welcome"] = $data["user"]["nama"];

		$data['users_list'] = $this->Admin_model->getAllUser();

		$this->load->view("templates/header_dashboard", $data);
		$this->load->view("templates/sidebar_dashboard", $data);
		$this->load->view("templates/topbar_dashboard", $data);
		$this->load->view("admin/index", $data);
		$this->load->view("templates/footer_dashboard", $data);
	}

	public function transaksi()
	{
		$data["title"] = "Dashboard Admin";

		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
		$data["welcome"] = $data["user"]["nama"];

		$data['laundry'] = $this->Admin_model->getAllLaundry();

		$this->load->view("templates/header_dashboard", $data);
		$this->load->view("templates/sidebar_dashboard", $data);
		$this->load->view("templates/topbar_dashboard", $data);
		$this->load->view("admin/transaksi", $data);
		$this->load->view("templates/footer_dashboard", $data);
	}

	public function edit_status($id = null)
	{
		$data["title"] = "Edit Status by Admin";

		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();

		$data["welcome"] = $data["user"]["nama"];

		$data['laundry'] = $this->Admin_model->getAllLaundryById($id);

		$this->form_validation->set_rules('status', 'Status Cucian', 'max_length[20]');

		if ($this->form_validation->run() == FALSE) {
			//GAGAL

			$this->load->view("templates/header_dashboard", $data);
			$this->load->view("templates/sidebar_dashboard", $data);
			$this->load->view("templates/topbar_dashboard", $data);
			$this->load->view("admin/edit_status", $data);
			$this->load->view("templates/footer_dashboard", $data);
		} else {
			//BERHASIL
			$this->Admin_model->ubahStatusbyAdmin();
			$this->session->set_flashdata('message', 'Ubah Data Berhasil');
			redirect('admin/transaksi');
		}
	}

	public function edit_user($id = null)
	{
		$data["title"] = "Edit User by Admin";

		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();

		$data['idUser'] = $this->Admin_model->getAllUserById($id);

		$this->form_validation->set_rules('role', 'Role', 'required|max_length[1]');
		// $this->form_validation->set_rules('aktifasi', 'Aktifasi', 'required|max_length[1]');

		if ($this->form_validation->run() == FALSE) {
			//GAGAL

			$this->load->view("templates/header_dashboard", $data);
			$this->load->view("templates/sidebar_dashboard", $data);
			$this->load->view("templates/topbar_dashboard", $data);
			$this->load->view("admin/edit_user", $data);
			$this->load->view("templates/footer_dashboard", $data);
		} else {
			//BERHASIL
			$this->Admin_model->ubahUserbyAdmin();
			$this->session->set_flashdata('message', 'Ubah User Berhasil');
			redirect('admin');
		}
	}

	public function hapus($id)
	{
		$data["title"] = "Hapus by Admin";

		$this->Admin_model->hapusDataOrder($id);
		$this->session->set_flashdata('message', 'Hapus Data berhasil');
		redirect('admin/transaksi');
	}

	public function hapus_user($id)
	{
		$data["title"] = "Hapus User by Admin";

		$this->Admin_model->hapusDataUser($id);
		$this->session->set_flashdata('message', 'Hapus User berhasil');
		redirect('admin');
	}

	// public function profile() 
	// {
	// 	$data["title"] = "Profile";
	// 	$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
	// 	$data["welcome"] = $data["user"]["nama"];


	// 	$this->load->view("templates/header_dashboard", $data);
	// 	$this->load->view("templates/sidebar_dashboard", $data);
	// 	$this->load->view("templates/topbar_dashboard", $data);
	// 	$this->load->view("admin/profile", $data);
	// 	$this->load->view("templates/footer_dashboard", $data);

	// }

	// public function edit() 
	// {

	// 	$data["title"] = "Edit Profile";
	// 	$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
	// 	$data["welcome"] = $data["user"]["nama"];

	// 	$this->form_validation->set_rules('nama', 'Nama','max_length[50]');
	// 	$this->form_validation->set_rules('alamat', 'Alamat','max_length[50]');
	// 	$this->form_validation->set_rules('email', 'Email','max_length[50]');
	// 	$this->form_validation->set_rules('nohp', 'No Hp','max_length[15]|min_length[10]');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		//GAGAL

	// 		$this->load->view("templates/header_dashboard", $data);
	// 		$this->load->view("templates/sidebar_dashboard", $data);
	// 		$this->load->view("templates/topbar_dashboard", $data);
	// 		$this->load->view("admin/edit", $data);
	// 		$this->load->view("templates/footer_dashboard", $data);

	// 	} else {
	// 		//BERHASIL
	// 		$this->Admin_model->ubahDataProfile();
	// 		$this->session->set_flashdata('message', 'Data Berhasil Diubah');
	// 		redirect('admin/profile');
	// 	}

	// }

}
