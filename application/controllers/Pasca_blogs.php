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

	public function upload_supernote()
	{	
		if (!empty($_FILES)) 
		{	
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = str_replace(' ', '', $_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];
			$targetPath = './assets/images/supernote/';
			$targetFile = $targetPath . $fileName ;
			$config["upload_path"]   = "./assets/images/supernote";
			$config["allowed_types"] = "gif|jpg|png";
			$config['max_size']= 1000;
			$config['max_width']= 1024;
			$config['max_height']= 768;
			$config['overwrite']= TRUE;
			$this->load->library('upload', $config);
			//Insert to database
			if (!$this->upload->do_upload("file")) {
				//MAKE FOLDER
				if (!file_exists('./assets/images/supernote')) {
					mkdir('./assets/images/supernote', 0777, true);
				}
				//Mindah foto ke folder
				if (!empty($_FILES['file']["name"])) {
					move_uploaded_file($tempFile,"./assets/images/supernote/$fileName");
				}else{
					move_uploaded_file($tempFile,"./assets/images/supernote/$fileName");
				}
				
				$data = array(
					'id_post' => NULL,
					'id_post' => $this->input->post('id_post'),
					'foto_paket' => $targetFile,
					'typeFoto_paket' => 'summernote'
					);
				$insert = $this->admin->paket_add('foto', $data);
			}
			echo base_url().''.$targetFile;
		}
	}

	public function upload_data()
	{	
		$inputNamePicadmin = $this->session->userdata('adminSession');
		$data['namaAdmin']  = $inputNamePicadmin['username'];

		$id_post = $this->input->post('id_post');
		$targetFile = '';
		$file2 = $this->input->post('file2');
		if (!empty($_FILES)) 
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = str_replace(' ', '', $_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];
			$targetPath = './assets/images/blogs/';
			$targetFile = $targetPath . $fileName ;
			$config["upload_path"]   = "./assets/images/blogs";
			$config["allowed_types"] = "gif|jpg|png";
			$config['max_size']= 1000;
			$config['max_width']= 1024;
			$config['max_height']= 768;
			$config['overwrite']= TRUE;
			$this->load->library('upload', $config);
			//Insert to database
			if (!$this->upload->do_upload("file")) {
				//MAKE FOLDER
				if (!file_exists('./assets/images/blogs')) {
					mkdir('./assets/images/blogs', 0777, true);
				}
				//Mindah foto ke folder
				if (!empty($_FILES['file']["name"])) {
					move_uploaded_file($tempFile,"./assets/images/blogs/$fileName");
					unlink($file2);
				}
				
			}
		}else{
			$targetFile = $this->input->post('file2');
		}

		$data = array(
			'title_post' => $this->input->post('title_post'),
			'pict_post' => $targetFile,
			'postedBy_post' => $data['namaAdmin'],
			'date_post' => date('D, M Y'),
			'body_post' => $this->input->post('body_post'),
			'status_post' => 1
			);
		$insert = $this->admin->updateBlogs('post',$data,'id_post = '.$id_post );

		redirect('Pasca_blogs', 'refresh'); 
	}
	
	public function upload_data() {
		$id_post = $this->input->post('id_post');
		$targetFile = '';
		$file2 = $this->input->post('file2');
		if (!empty($_FILES)) 
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = str_replace(' ', '', $_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];
			$targetPath = './assets/images/blogs/';
			$targetFile = $targetPath . $fileName ;
			$config["upload_path"]   = "./assets/images/blogs";
			$config["allowed_types"] = "gif|jpg|png";
			$config['max_size']= 1000;
			$config['max_width']= 1024;
			$config['max_height']= 768;
			$config['overwrite']= TRUE;
			$this->load->library('upload', $config);
			//Insert to database
			if (!$this->upload->do_upload("file")) {
				//MAKE FOLDER
				if (!file_exists('./assets/images/blogs')) {
					mkdir('./assets/images/blogs', 0777, true);
				}
				//Mindah foto ke folder
				if (!empty($_FILES['file']["name"])) {
					move_uploaded_file($tempFile,"./assets/images/blogs/$fileName");
					unlink($file2);
				}
			}
		}else{
			$targetFile = $this->input->post('file2');
		}

		$data = array(
			'id_post' => $id_post,
			'pict_post' => $targetFile,
			'body_post' => $this->input->post('body_post'),
			'aktif_paket' => 'aktif',
			);
		$insert = $this->admin->updateBlogs('post', 'id_post = '.$id_post , $data);

		//Insert tags
		$insertTags = $this->admin->addBlogs('tags', $this->input->post('tags_post'));

		//Insert Category
		$data2 = array(
			'id_post' => $id_post,
			);

		$insert = $this->admin->updateBlogs('post', 'id_post = '.$id_post , $data2);
		redirect('Pasca_paket', 'refresh'); 
	}
}
