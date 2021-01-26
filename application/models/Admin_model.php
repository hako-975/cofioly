<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
// ----------------------------------- CHECK -----------------------------------
	public function checkStatusLogin()
	{
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
	}
// ----------------------------------- CHECK -----------------------------------


// ----------------------------------- GET -----------------------------------
	public function getDATAUSER() {
		return $this->db->get_where('user', ['user.username' => $this->session->userdata('username')])->row_array();
	}

	
	public function getIdByUsername($username)
	{
		return $this->db->get_where('user', ['username' => $username])->row_array()['id_user'];
	}
}