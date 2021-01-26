<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admo');
		$this->load->model('Landing_model', 'lamo');
		$this->load->model('Gallery_model', 'gamo');
	}

	public function index()
	{
		$this->admo->checkStatusLogin();
		$data['landing'] = $this->lamo->getLanding();
		$data['DATA_USER'] = $this->admo->getDATAUSER();
		$data['title'] = 'Administrator';
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer_admin', $data);
	}

	public function landing()
	{
		$this->admo->checkStatusLogin();
		$data['landing'] = $this->lamo->getLanding();
		$data['gallery'] = $this->gamo->getGallery();
		$data['DATA_USER'] = $this->admo->getDATAUSER();
		$data['title'] = 'Landing - Edit';
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/landing', $data);
		$this->load->view('templates/footer_admin', $data);
	}

	public function gallery()
	{
		$this->admo->checkStatusLogin();
		$data['gallery'] = $this->gamo->getGallery();
		$data['landing'] = $this->lamo->getLanding();
		$data['DATA_USER'] = $this->admo->getDATAUSER();
		$data['title'] = 'Gallery - Edit';
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/gallery', $data);
		$this->load->view('templates/footer_admin', $data);
	}
}