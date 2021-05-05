<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{

  public function __construct()
  {
    parent::__construct(); // manggil konstruktor dari CI_Controller
    $this->load->model("Laundry_model");
    $this->load->model("Kurir_model");
    $this->load->library("form_validation");

    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
    //is_logged_in(); // cek session dan cek hak akses
  }

  public function index()
  {

    $data['judul'] = 'Dirty-Clothes';
    $data['laundry'] = $this->Laundry_model->getAllLaundry();

    $this->load->view('templates/header', $data);
    $this->load->view('laundry/index', $data);
    $this->load->view('templates/footer');
  }

  public function transaksi()
  {
    $data['judul'] = 'Dirty-Clothes';
    $data['laundry'] = $this->Laundry_model->getAllLaundry();

    $this->load->view("templates/header_dashboard", $data);
    $this->load->view("templates/sidebar_dashboard", $data);
    $this->load->view("templates/topbar_dashboard", $data);
    $this->load->view("kurir/index", $data);
    $this->load->view("templates/footer_dashboard", $data);
  }

  public function edit_status($id)
  {
    $data["title"] = "Edit Status by Kurir";

    $data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();

    // $data["welcome"] = $data["user"]["nama"];

    $data['laundry'] = $this->Laundry_model->getAllLaundryById($id);

    $this->form_validation->set_rules('status', 'Nama', 'require');

    if ($this->form_validation->run() == FALSE) {
      //GAGAL

      $this->load->view("templates/header_dashboard", $data);
      $this->load->view("templates/sidebar_dashboard", $data);
      $this->load->view("templates/topbar_dashboard", $data);
      $this->load->view("kurir/edit_status", $data);
      $this->load->view("templates/footer_dashboard", $data);
    } else {
      //BERHASIL
      $this->Laundry_model->ubahStatusbyKurir();
      $this->session->set_flashdata('message', 'Ubah Data berhasil');
      redirect('kurir/transaksi');
    }
  }

  public function payment($id)
  {
    $data["title"] = "Payment by Kurir";

    $data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();

    // $data["welcome"] = $data["user"]["nama"];

    $data['laundry'] = $this->Laundry_model->getAllLaundryById($id);

    $this->form_validation->set_rules('status', 'Nama', 'require');

    if ($this->form_validation->run() == FALSE) {
      //GAGAL

      $this->load->view("templates/header_dashboard", $data);
      $this->load->view("templates/sidebar_dashboard", $data);
      $this->load->view("templates/topbar_dashboard", $data);
      $this->load->view("kurir/payment", $data);
      $this->load->view("templates/footer_dashboard", $data);
    } else {
      //BERHASIL
      $this->Laundry_model->paymentByKurir();
      $this->session->set_flashdata('message', 'Ubah Data berhasil');
      redirect('kurir/transaksi');
    }
  }

  // public function profile() 
  // {
  //   $data["title"] = "Profile";
  //   $data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
  //   $data["welcome"] = $data["user"]["nama"];


  //   $this->load->view("templates/header_dashboard", $data);
  //   $this->load->view("templates/sidebar_dashboard", $data);
  //   $this->load->view("templates/topbar_dashboard", $data);
  //   $this->load->view("kurir/profile", $data);
  //   $this->load->view("templates/footer_dashboard", $data);

  // }

  // public function edit() 
  // {

  //   $data["title"] = "Edit Profile";
  //   $data["user"] = $this->db->get_where('user', ['email' => $this->session->userdata("email")])->row_array();
  //   $data["welcome"] = $data["user"]["nama"];

  //   $this->form_validation->set_rules('nama', 'Nama','max_length[50]');
  //   $this->form_validation->set_rules('alamat', 'Alamat','max_length[50]');
  //   $this->form_validation->set_rules('email', 'Email','max_length[50]');
  //   $this->form_validation->set_rules('nohp', 'No Hp','max_length[15]|min_length[10]');

  //   if ($this->form_validation->run() == FALSE) {
  //     //GAGAL

  //     $this->load->view("templates/header_dashboard", $data);
  //     $this->load->view("templates/sidebar_dashboard", $data);
  //     $this->load->view("templates/topbar_dashboard", $data);
  //     $this->load->view("kurir/edit", $data);
  //     $this->load->view("templates/footer_dashboard", $data);

  //   } else {
  //     //BERHASIL
  //     $this->Kurir_model->ubahDataProfile();
  //     $this->session->set_flashdata('message', 'Data Berhasil Diubah');
  //     redirect('kurir/profile');
  //   }

  // }

}
