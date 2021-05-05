<?php 

class Laundry_model extends CI_Model {

	public function getAllLaundry()
	{
		$query = $this->db->get("laundry");
		return $query->result_array();
	}

	public function getAllLaundryByName()
	{
		$query = $this->db->get_where("laundry", ['nama' => 
		$this->session->userdata("nama")]);
		return $query->result_array();
	}

	public function getAllLaundryById($id)
	{
		$query = $this->db->get_where("laundry", ['id' => $id]);
		return $query->row_array();
	}

	public function tambahData()
	{

		$data = [
			'kode_transaksi' => $this->input->post('kode_transaksi', true),
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'patokan' => $this->input->post('patokan', true),
			'nohp' => $this->input->post('nohp', true),
			'berat' => $this->input->post('berat', true),
			'status_cucian' => $this->input->post('status_cucian', true),
			'status_pembayaran' => $this->input->post('status_pembayaran', true),
			'ulasan' => $this->input->post('ulasan', true)
		];		

		$this->db->insert('laundry', $data);
	}

	public function ubahDataProfile()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true), 	
			'email' => $this->input->post('email', true),
			'nohp' => $this->input->post('nohp', true)
		];
		
		$this->db->where('email', $data['email']);
		$this->db->update('user', $data);

		// UPDATE user SET name,alamat,email,nohp WHERE email = email
	}

	public function ubahStatusbyKurir() {
		$data = [
			'status_cucian' => $this->input->post('status_cucian', true)
		];		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry', $data);
	}

	public function paymentByKurir() {
		$data = [
			'status_pembayaran' => $this->input->post('status_pembayaran', true)
		];		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry', $data);
	}

	public function ubahStatusbyAdmin() {
		$data = [
			'status_cucian' => $this->input->post('status_cucian', true)
		];		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry', $data);
	}

	public function konfirmasi() {
		$data = [
			'status_cucian' => $this->input->post('konfirmasi', true),
			'ulasan' => $this->input->post('ulasan', true)
		];		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry', $data);
	}

	public function ubah_pesanan() {
		$data = [
			'alamat' => $this->input->post('alamat', true),
			'patokan' => $this->input->post('patokan', true),
			'nohp' => $this->input->post('nohp', true),
			'berat' => $this->input->post('berat', true)
		];		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry', $data);
	}

}