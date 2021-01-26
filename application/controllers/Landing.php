<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Landing_model', 'lamo');
		$this->load->model('Gallery_model', 'gamo');
	}

	public function index()
	{
		$data['landing'] = $this->lamo->getLanding();
		$data['gallery'] = $this->gamo->getGallery();
		$data['title'] = $data['landing']['title'];
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('no_whatsapp', 'No. WhatsApp', 'required|trim|numeric');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header_landing', $data);
			$this->load->view('landing/index', $data);
			$this->load->view('templates/footer_landing', $data);
		} else {
			$this->lamo->sendMessage();
		}
	}

	public function editTitle()
	{
		$title = $_POST['title'];
		$this->db->set('title', $title);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}

	public function editNavbarBrand()
	{
		$landing = $this->lamo->getLanding();

		$navbar_brand = $_FILES['img_navbar_brand']['name'];
		if ($navbar_brand) {
			$config['upload_path'] = './assets/img/img_navbar_brands/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img_navbar_brand')) {
				$old_navbar_brand = $landing['navbar_brand'];
				if ($old_navbar_brand != 'default.png') {
					unlink(FCPATH . 'assets/img/img_navbar_brands/' . $old_navbar_brand);
				}
				$new_navbar_brand = $this->upload->data('file_name');
				$this->db->set('navbar_brand', $new_navbar_brand);
			} else {
				$this->session->set_flashdata('message-failed', ' Your profile Navbar Brand failed changed! let\'s try again');
				redirect('admin/landing');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Your profile Navbar Brand failed changed! choose file first! let\'s try again');
			redirect('admin/landing');
		}
		$this->db->update('landing');
		$this->session->set_flashdata('message-success', 'Your Profile Navbar Brand has been saved');
		redirect('admin/landing');
	}

	public function editJumbotron()
	{
		$landing = $this->lamo->getLanding();

		$jumbotron = $_FILES['img_jumbotron']['name'];
		if ($jumbotron) {
			$config['upload_path'] = './assets/img/img_jumbotrons/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img_jumbotron')) {
				$old_jumbotron = $landing['img_jumbotron'];
				if ($old_jumbotron != 'default.png') {
					unlink(FCPATH . 'assets/img/img_jumbotrons/' . $old_jumbotron);
				}
				$new_jumbotron = $this->upload->data('file_name');
				$this->db->set('img_jumbotron', $new_jumbotron);
			} else {
				$this->session->set_flashdata('message-failed', ' Your profile Jumbotron failed changed! let\'s try again');
				redirect('admin/landing');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Your profile Jumbotron failed changed! choose file first! let\'s try again');
			redirect('admin/landing');
		}
		$this->db->update('landing');
		$this->session->set_flashdata('message-success', 'Your Profile Jumbotron has been saved');
		redirect('admin/landing');
	}

	public function editProfile()
	{
		$landing = $this->lamo->getLanding();

		$profile = $_FILES['img_profile']['name'];
		if ($profile) {
			$config['upload_path'] = './assets/img/img_profiles/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img_profile')) {
				$old_profile = $landing['img_profile'];
				if ($old_profile != 'default.png') {
					unlink(FCPATH . 'assets/img/img_profiles/' . $old_profile);
				}
				$new_profile = $this->upload->data('file_name');
				$this->db->set('img_profile', $new_profile);
			} else {
				$this->session->set_flashdata('message-failed', ' Your Profile failed changed! let\'s try again');
				redirect('admin/landing');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Your Profile failed changed! choose file first! let\'s try again');
			redirect('admin/landing');
		}
		$this->db->update('landing');
		$this->session->set_flashdata('message-success', 'Your Profile has been saved');
		redirect('admin/landing');
	}

	public function editNamaBrand()
	{
		$nama_brand = $_POST['nama_brand'];
		$this->db->set('nama_brand', $nama_brand);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}

	public function editTextInovatif()
	{
		$text_inovatif = $_POST['text_inovatif'];
		$this->db->set('text_inovatif', $text_inovatif);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}

	public function editTextBox1()
	{
		$text_box_1 = $_POST['text_box_1'];
		$this->db->set('text_box_1', $text_box_1);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}

	public function editTextBox2()
	{
		$text_box_2 = $_POST['text_box_2'];
		$this->db->set('text_box_2', $text_box_2);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}

	public function editChannelIdYt()
	{
		$channel_id_yt = $_POST['channel_id_yt'];
		$this->db->set('channel_id_yt', $channel_id_yt);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}
	
	public function editSocial()
	{
		$data = [
			'fb_link' => $this->input->post('fb_link', true),
			'ig_link' => $this->input->post('ig_link', true),
			'twitter_link' => $this->input->post('twitter_link', true),
			'whatsapp_number' => $this->input->post('whatsapp_number', true)
		];
		$this->db->set($data);
		$this->db->update('landing');
		$this->session->set_flashdata('message-success', 'Your Social has been saved');
		redirect('admin/landing');
	}	

	public function editContact()
	{
		$data = [
			'contact_header' => $this->input->post('contact_header'),
			'my_location' => $this->input->post('my_location'),
			'to_email' => $this->input->post('to_email', true)
		];

		$this->db->set($data);
		$this->db->update('landing');
		$this->session->set_flashdata('message-success', 'Your Contact has been saved');
		redirect('admin/landing');
	}	

	public function editFooter()
	{
		$footer = $_POST['footer'];
		$this->db->set('footer', $footer);
		$result = $this->db->update('landing');
		echo json_encode($result);
		redirect('admin/landing');
	}
}