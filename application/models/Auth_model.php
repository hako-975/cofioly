<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
// ----------------------------------- GET -----------------------------------
	public function getUserByEmailOrUsername($keyword)
	{
		$sql = "SELECT * FROM user WHERE user.username = '$keyword' OR user.email = '$keyword'";
		return $this->db->query($sql)->row_array();
	}

	public function getUserByEmail($email)
	{
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}

	public function getUserTokenByToken($token)
	{
		return $this->db->get_where('user_token', ['token' => $token])->row_array();
	}

	public function getUserByEmailAndIsActive($email)
	{
		$sql = "SELECT * FROM user WHERE user.email = '$email' AND user.is_active = '1'";
		return $this->db->query($sql)->row_array();
	}
// ----------------------------------- GET -----------------------------------

// ----------------------------------- UPDATE -----------------------------------
public function updateIsActiveByEmail($email)
{
	$this->db->set('is_active', 1);
	$this->db->where('email', $email);
	return $this->db->update('user');
}

public function updatePasswordByEmail($password, $email)
{
	$this->db->set('password', $password);
	$this->db->where('email', $email);
	return $this->db->update('user');
}
// ----------------------------------- UPDATE -----------------------------------

// ----------------------------------- DELETE -----------------------------------
	public function deleteTokenByEmail($email)
	{
		return $this->db->delete('user_token', ['email' => $email]);
	}

	public function deleteUserByEmail($email)
	{
		return $this->db->delete('user', ['email' => $email]);
	}
// ----------------------------------- DELETE -----------------------------------

}