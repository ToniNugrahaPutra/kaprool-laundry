<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() 
	{
		parent::__construct(); // manggil konstruktor dari CI_Controller
		$this->load->library("form_validation");
	}

	public function index(){

		$this->form_validation->set_rules('email', 'Email','required|valid_email|trim');

		$this->form_validation->set_rules('password', 'Password','required|trim');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
		
	}

	private function _login() {
		// menangkap inputan user
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		// mencocokan $email dengan $user
		$user = $this->db->get_where("user", ["email" => $email])->row_array();

		// jika user ada
		if ($user) {
			#  jika user aktif
			//if ($user["is_active"] == 1) {
				# cek password
				if (password_verify($password, $user['password'])) {
					# berhasil
					$data = [
						'nama' => $user['nama'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);

					// cek role id
					if ($user["role_id"] == 1) {
						# code...
						redirect('admin');
					} else if ($user["role_id"] == 2) {
						# code...
						redirect('user');
					} else {
						redirect('kurir/transaksi');
					}
					
				} else {
					# password salah
					$this->session->set_flashdata('message', 'Password Salah');
					redirect('auth');
				}
				
			// } else {
			// 	$this->session->set_flashdata('message', 'Email belum di aktifasi');
			// 	redirect('auth');
			// }
			
		} else {
			# code...
			$this->session->set_flashdata('message', 'Login Gagal, Mohon Coba lagi');
			redirect('auth');
		}
		
	} // METHOD _LOGIN()

	public function register(){

		// RULE

		// wajib, no spacing, max char 50
		$this->form_validation->set_rules('nama', 'Full Name','required|max_length[50]|trim');

		// wajib, no spacing, valid email (@ & .com), unik(tabel.atribut)
		$this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]');

		// wajib, no spacing, max char 8, min char 3, kecocokan dengan password 2
		$this->form_validation->set_rules('password1', 'Password','required|trim|max_length[10]|min_length[8]|matches[password2]');

		// wajib, no spacing, max char 8, min char 3, kecocokan dengan password 2
		$this->form_validation->set_rules('password2', 'Repeat Password','required|trim|max_length[10]|min_length[8]|matches[password1]');


		if ($this->form_validation->run() == FALSE) {
			// GAGAL
			
			$this->load->view('auth/register');		
		} else {
			// BERHASIL

			$data = [
				'nama' => $this->input->post('nama', true),
				'email' => $this->input->post('email', true),
				'image' => "default.jpg", 
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), //enskripsi hash
				'role_id' => 2, //mamber
				//'is_active' => 0, //tidak aktif
				'date_created' => date("d/m/Y")
			];	

			$this->db->insert('user', $data);

			// AKTIVASI EMAIL
			//$this->_sendEmail();

			$this->session->set_flashdata('register_success', 'Success');
			redirect('auth/register');

		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', 'Logout Berhasil');
			redirect('auth');
	}

	public function blocked() {

		$data["title"] = "Dashboard";

		$data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
		$data["welcome"] = $data["user"]["nama"];

		$this->load->view("templates/header_dashboard", $data);
		$this->load->view("templates/sidebar_dashboard", $data);
		$this->load->view("templates/topbar_dashboard", $data);
		$this->load->view("auth/blocked");
		$this->load->view("templates/footer_dashboard", $data);
		
	}

	// private function _sendEmail(){
	// 	$config = [
	// 		'protocol' => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googlemail.com',
	// 		'smtp_user' => 'itprenuer.unsika@gmail.com',
	// 		'smtp_pass' => '1234567890',
	// 		'smtp_port' => 465,
	// 		'mailtype' => 'html',
	// 		'charset' => 'utf-8',
	// 		'newline' => "\r\n"
	// 	];

	// 	$this->load->library('email', $config);
	// 	$this->email->initialize($config);

	// 	$this->email->from('itprenuer.unsika@gmail.com', 'ITPreneur Unsika');
	// 	$this->email->to('muhammadbudhil00@gmail.com'); // post email
	// 	$this->email->subject('Aktivasi');
	// 	$this->email->message('Silahkan aktivasi akun disini');

	// 	if ($this->email->send()) {
	// 		return true;
	// 	} else {
	// 		echo $this->email->print_debugger();
	// 		die;
	// 	}
		
	// }


}