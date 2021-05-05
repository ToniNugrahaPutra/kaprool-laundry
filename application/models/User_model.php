<?php 

class User_model extends CI_Model {

	public function ubahData()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'email' => $this->input->post('email', true),
			'nohp' => $this->input->post('nohp', true)
		];		
		
		$this->db->where('email', $data['email']);
		$this->db->update('user', $data);
	}

}