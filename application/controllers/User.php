<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct(); // manggil konstruktor dari CI_Controller
		$this->load->model("Laundry_model");
		$this->load->model("User_model");
		$this->load->library("form_validation");
		
		if (!$this->session->userdata ('email')) {
			redirect('auth');
		}
		//is_logged_in(); // cek session dan cek hak akses
	}

	public function index()
	{
		$data["title"] = "Dashboard";
		
		$data["user"] = $this->db->get_where('user', ['email' => 
		$this->session->userdata("email")])->row_array();

		//$user = ['nama', $this->session->userdata("nama")];
		$data["welcome"] = $data["user"]["nama"];

		$data['laundry'] = $this->Laundry_model->getAllLaundryByName();

		$this->load->view("templates/header_dashboard", $data);
		$this->load->view("templates/sidebar_dashboard", $data);
		$this->load->view("templates/topbar_dashboard", $data);
		$this->load->view("user/index", $data);
		$this->load->view("templates/footer_dashboard", $data);

	}

	public function order() 
	{
		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();

		//$this->form_validation->set_rules('nama', 'Nama','required|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('patokan', 'Patokan','required');
		$this->form_validation->set_rules('nohp', 'No Hp','required|max_length[15]|min_length[10]');
		$this->form_validation->set_rules('berat', 'Berat','required');

		if ($this->form_validation->run() == FALSE) {
			//GAGAL
			
			$this->load->view("templates/header_dashboard", $data);
			$this->load->view("templates/sidebar_dashboard", $data);
			$this->load->view("templates/topbar_dashboard", $data);
			$this->load->view("user/order", $data);
			$this->load->view("templates/footer_dashboard", $data);
			
		} else {
			//BERHASIL
			$this->Laundry_model->tambahData();
			$this->session->set_flashdata('message', 'Pemesanan Berhasil, di tunggu ya');
			redirect('user');
		}
	}

	public function profile() 
	{
		$data["title"] = "Profile";
		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
		$data["welcome"] = $data["user"]["nama"];


		$this->load->view("templates/header_dashboard", $data);
		$this->load->view("templates/sidebar_dashboard", $data);
		$this->load->view("templates/topbar_dashboard", $data);
		$this->load->view("user/profile", $data);
		$this->load->view("templates/footer_dashboard", $data);

	}

	public function edit() 
	{
		
		$data["title"] = "Edit Profile";
		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
		$data["welcome"] = $data["user"]["nama"];

		$this->form_validation->set_rules('nama', 'Nama','max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat','max_length[50]');
		$this->form_validation->set_rules('email', 'Email','max_length[50]');
		$this->form_validation->set_rules('nohp', 'No Hp','max_length[15]|min_length[10]');

		if ($this->form_validation->run() == FALSE) {
			//GAGAL
			
			$this->load->view("templates/header_dashboard", $data);
			$this->load->view("templates/sidebar_dashboard", $data);
			$this->load->view("templates/topbar_dashboard", $data);
			$this->load->view("user/edit", $data);
			$this->load->view("templates/footer_dashboard", $data);

		} else {
			//BERHASIL
			$this->Laundry_model->ubahDataProfile();
			$this->session->set_flashdata('message', 'Data Berhasil Diubah');
			redirect('user/edit');
		}

	}

	public function konfirmasi($id) 
	{
		
		$data["title"] = "Konfirmasi";

		$data["user"] = $this->db->get_where('user', 
		['email' => $this->session->userdata("email")])->row_array();

		$data['laundry'] = $this->Laundry_model->getAllLaundryById($id);

		$this->form_validation->set_rules('konfirmasi', 'Konfimasi','max_length[20]');
		$this->form_validation->set_rules('ulasan', 'Ulasan','max_length[30]');

		if ($this->form_validation->run() == FALSE) {

			//GAGAL
			$this->load->view("templates/header_dashboard", $data);
			$this->load->view("templates/sidebar_dashboard", $data);
			$this->load->view("templates/topbar_dashboard", $data);
			$this->load->view("user/konfirmasi", $data);
			$this->load->view("templates/footer_dashboard", $data);

		} else {

			//BERHASIL
			$this->Laundry_model->konfirmasi();
			$this->session->set_flashdata('message', 'Konfirmasi telah Berhasil');
			redirect('user');
			
		}

	}

	public function cancel($id){
		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();

		$this->db->where('id', $id);
		$this->db->update('laundry', ['status_cucian' => 'Cancel']);
		redirect("user");
	}

	public function ubah_pesanan($id) 
	{
		
		$data["title"] = "Ubah Pesanan";

		$data["user"] = $this->db->get_where('user', 
		['email' => $this->session->userdata("email")])->row_array();

		$data['laundry'] = $this->Laundry_model->getAllLaundryById($id);

		$this->form_validation->set_rules('alamat', 'Alamat','required|max_length[30]');
		$this->form_validation->set_rules('patokan', 'Patokan','required|max_length[20]');
		$this->form_validation->set_rules('nohp', 'No Hp','required|max_length[15]');
		$this->form_validation->set_rules('berat', 'Berat','required|max_length[5]');

		if ($this->form_validation->run() == FALSE) {

			//GAGAL
			$this->load->view("templates/header_dashboard", $data);
			$this->load->view("templates/sidebar_dashboard", $data);
			$this->load->view("templates/topbar_dashboard", $data);
			$this->load->view("user/ubah_pesanan", $data);
			$this->load->view("templates/footer_dashboard", $data);

		} else {

			//BERHASIL
			$this->Laundry_model->ubah_pesanan();
			$this->session->set_flashdata('message', 'Mengubah Pesanan telah Berhasil');
			redirect('user');
			
		}

	}


}