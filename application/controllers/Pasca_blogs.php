<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca_blogs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
		$this->load->helper('form');
		//$this->load->helper("file");
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index() {
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Delete Un Aktif Paket
			$delete_blogs = $this->admin->deleteData('post',"status_post = '0'");
			//nampilin isi blogs
			$blogs = $this->admin->getBlogs();
			$data['blogs'] = $blogs;
			$this->load->view('Admin_blogs' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function addBlogs() {
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];

			//create data
			$data_paket = array(
				'status_post' => 0
				);
			
			$blogs = $this->admin->addBlogs('post', $data_paket);
			$data['blogs'] = $blogs;

			$this->load->view('Admin_addBlogs' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}
	
}
