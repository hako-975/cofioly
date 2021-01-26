<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller 
{
	public function addImage()
	{
		$img_gallery = $_FILES['img_gallery']['name'];
		if ($img_gallery) {
			$config['upload_path'] = './assets/img/img_galleries/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('img_gallery')) {
				$new_img_gallery = $this->upload->data('file_name');
				$this->db->set('img_gallery', $new_img_gallery);
			} else {
				$this->session->set_flashdata('message-failed', ' Your image failed to upload! let\'s try again');
				redirect('admin/gallery');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Your image failed to upload! choose file first! let\'s try again');
			redirect('admin/gallery');
		}
		$this->db->insert('gallery');
		$this->session->set_flashdata('message-success', 'Your image has been added');
		redirect('admin/gallery');
	}

	public function deleteImage($id)
	{
		$this->db->delete('gallery', ['id_gallery' => $id]);
		$this->session->set_flashdata('message-success', 'Image has been deleted');
		redirect('admin/gallery');
	}

	public function editImage($id)
	{
		$img_gallery = $_FILES['img_gallery']['name'];
		if ($img_gallery) {
			$config['upload_path'] = './assets/img/img_galleries/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('img_gallery')) {
				$new_img_gallery = $this->upload->data('file_name');
				$this->db->set('img_gallery', $new_img_gallery);
			} else {
				$this->session->set_flashdata('message-failed', ' Your image failed to upload! let\'s try again');
				redirect('admin/gallery');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Your image failed to upload! choose file first! let\'s try again');
			redirect('admin/gallery');
		}
		$this->db->update('gallery', ['id_gallery' => $id]);
		$this->session->set_flashdata('message-success', 'Your image has been changed');
		redirect('admin/gallery');
	}
}