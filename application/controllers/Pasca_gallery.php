<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca_gallery extends CI_Controller {
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

	public function index()
	{
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Nampilin Paket
			$data['gallery'] = $this->admin->getData('gallery','');

			$this->load->view('Admin_gallery' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function delete_foto($id_gallery)
	{	
		//get foto from id_gallery
		$getPictGallery = $this->admin->getGalleryById($id_gallery);
		$path_foto = explode('/', $getPictGallery);
		$path_foto2 = "./assets/images/gallery/".$path_foto[4];
		//Delete from dB
		$insert = $this->admin->deleteData('gallery', "id_gallery = '$id_gallery'");
		//Detele From Folder
		unlink($path_foto2);
		echo json_encode($insert);
	}

	public function upload_data()
	{	
		$targetFile = '';
		if (!empty($_FILES)) 
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = str_replace(' ', '', $_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];
			$targetPath = './assets/images/gallery/';
			$targetFile = $targetPath . $fileName ;
			$config["upload_path"]   = "./assets/images/gallery";
			$config["allowed_types"] = "gif|jpg|png";
			$config['max_size']= 1000;
			$config['max_width']= 1024;
			$config['max_height']= 768;
			$config['overwrite']= TRUE;
			$this->load->library('upload', $config);
			//Insert to database
			if (!$this->upload->do_upload("file")) {
				//MAKE FOLDER
				if (!file_exists('./assets/images/gallery')) {
					mkdir('./assets/images/gallery', 0777, true);
				}
				//Mindah foto ke folder
				if (!empty($_FILES['file']["name"])) {
					move_uploaded_file($tempFile,"./assets/images/gallery/$fileName");
				}
				
			}
		}
		$data = array(
			'title_gallery' => $this->input->post('title_gallery'),
			'pict_gallery' => $targetFile,
			);
		$insert = $this->admin->gallery_add('gallery', $data);
		redirect('Pasca_gallery', 'refresh'); 
	}
}
