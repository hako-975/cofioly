<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'aumo');
	}

	public function login()
	{
		redirect('auth');
	}

	public function index()
	{
		// if after login before
		if ($this->session->userdata('username')) {
			redirect('admin');
		}
		// data
		$data['title'] = 'login';

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_landing', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/footer_landing', $data);
			$this->load->view('templates/show_hide_password', $data);
		} else {
		    $this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		
		$user = $this->aumo->getUserByEmailOrUsername($username);

		// if avaible user
		if ($user) {
			// if user is active
			if ($user['is_active'] == 1) {
				// check password
				if (password_verify($password, $user['password'])) {
					$data_session = [
						'username' => $user['username'],
						'email' => $user['email']
					];
					$this->session->set_userdata($data_session);
					if (isset($_GET['link'])) {
						redirect($_GET['link']);
					} else {
						redirect('admin');
					}
				} else {
					$this->session->set_flashdata('message-failed', 'Wrong password');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message-failed', 'This ' . $username . ' has not been activated');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message-failed', $username . ' is not registered');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$email = $this->input->post('email', true);

		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'cofioly1@gmail.com',
			'smtp_pass' => 'demonmycat1',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('cofioly1@gmail.com', 'Cofioly');
		$this->email->to($email);

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href=" ' . base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) .'"> ✔ Actived</a>');
		} elseif ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href=" ' . base_url() . 'auth/resetPassword?email=' . $email . '&token=' . urlencode($token) .'">Reset Password</a>');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email', true);
		$token = $this->input->get('token', true);

		$user = $this->aumo->getUserByEmail($email);
		if ($user) {
			$user_token = $this->aumo->getUserTokenByToken($token);
			if ($user_token) {
				if (time() - $user_token['date_created'] < (600)) {
					$this->aumo->updateIsActiveByEmail($email);
					
					$this->aumo->deleteTokenByEmail($email);

					$this->session->set_flashdata('message-success', $email .' has been activated! Please login');
					redirect('auth');
				} else {
					$this->aumo->deleteUserByEmail($email);
					$this->aumo->deleteTokenByEmail($email);

					$this->session->set_flashdata('message-failed', 'Account Activation Failed! Token Expired. Please Register Again');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message-failed', 'Account activation failed! Wrong token');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Account activation failed! Wrong email');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');
		$this->session->set_flashdata('message-success', 'You has been logout');
		redirect('auth');
	}

	public function forgotPassword()
	{
		// if after login before
		if ($this->session->userdata('username')) {
			redirect('admin');
		}
		// data
		$data['title'] = 'Forgot Password';
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_landing', $data);
			$this->load->view('auth/forgot_password', $data);
			$this->load->view('templates/footer_landing', $data);
		} else {
			$email = $this->input->post('email', true);
			$user = $this->aumo->getUserByEmailAndIsActive($email);

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message-success', 'Please check your email to reset your password');
				redirect('auth/forgotPassword');
			} else {
				$this->session->set_flashdata('message-failed', 'Email is not registered or activated');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email', true);
		$token = $this->input->get('token', true);

		$user = $this->aumo->getUserByEmail($email);

		if ($user) {
			$user_token = $this->aumo->getUserTokenByToken($token);
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message-failed', 'Reset password failed! Wrong token');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Reset password failed! Wrong email');
			redirect('auth');
		}
	}
	
	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		// data
		$data['title'] = 'Change Password';

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password_verify]', [
			'matches' => 'Password does not matches',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password_verify', 'Password Verify', 'required|trim|matches[password]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_landing', $data);
			$this->load->view('auth/change_password', $data);
			$this->load->view('templates/footer_landing', $data);
			$this->load->view('templates/show_hide_password_registration', $data);	
		} else {
			$password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->aumo->updatePasswordByEmail($password, $email);
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message-success', 'Password has been changed! Please login');
			redirect('auth');
		}

	}
}