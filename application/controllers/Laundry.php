<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laundry extends CI_Controller
{

	public function __construct()
	{
		parent::__construct(); // manggil konstruktor dari CI_Controller
		$this->load->model("Laundry_model");
		$this->load->library("form_validation");
	}

	public function index()
	{

		$data['judul'] = 'Kaprool-Laundry';
		$data['laundry'] = $this->Laundry_model->getAllLaundry();

		$this->load->view('templates/header', $data);
		$this->load->view('laundry/index', $data);
		$this->load->view('templates/footer');
	}
}
