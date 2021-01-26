<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_model extends CI_Model
{
	public function getLanding() 
	{
		return $this->db->get('landing')->row_array();
	}

	public function sendMessage()
	{
		$name = $this->input->post('name', true);
		$email = $this->input->post('email', true);
		$no_whatsapp = $this->input->post('no_whatsapp', true);
		$message = $this->input->post('message', true);
		
		$data = [
			'name' => $name,
			'email' => $email,
			'no_whatsapp' => $no_whatsapp,
			'message' => $message
		];
		
		$this->db->insert('send_message', $data);

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

		$this->email->from($email, $name);
		$this->email->to('cofioly1@gmail.com');

		$this->email->subject($email . ' | ' . $no_whatsapp);
		$this->email->message($message);
	
		if ($this->email->send()) {
			$this->session->set_flashdata('message-success', 'Your message has been send, Thank you!! :D');
			redirect('landing');
		} else {
			$this->session->set_flashdata('message-failed', 'Your message failed to send, Please try again!!');
			redirect('landing');
			echo $this->email->print_debugger();
			die;
		}
	}
}