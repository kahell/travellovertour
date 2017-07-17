<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca_transaksi extends CI_Controller {

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
			//nampilin isi blogs
			$data['transaksi'] = $this->admin->getBlogs();
			$this->load->view('Admin_transaksi' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}
}
