<?php 

// $this tidak diketahui maka harus buat instansiasi ci

function is_logged_in()
{

	$ci = get_instance(); // memanggil library ci

	if (!$ci->session->userdata ('email')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata("role_id"); // role id
		$menu = $ci->uri->segment(1); // posisi menu

		$query_menu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array(); 
		// mendapatkan row tabel menu : select * from user_menu where menu = $menu

		$menu_id = $query_menu['id'];

		$userAccess = $ci->db->get_where('user_access_menu',
			['role_id' => $role_id,
			'menu_id' => $menu_id]
		); 

		if ($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
		

	}
	
}