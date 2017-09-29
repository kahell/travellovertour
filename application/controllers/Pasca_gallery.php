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
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index()
	{
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Nampilin Paket
			$data['gallery'] = $this->admin->getData('gallery',"WHERE '1' ORDER BY id_gallery DESC");

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
		$path_foto3 = "./assets/images/gallery/thumb/".$path_foto[4];
		//Delete from dB
		$insert = $this->admin->deleteData('gallery', "id_gallery = '$id_gallery'");
		//Detele From Folder
		unlink($path_foto2);
		unlink($path_foto3);
		echo json_encode($insert);
	}

	public function randomName() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	    	$n = rand(0, $alphaLength);
	    	$pass[] = $alphabet[$n];
	    }
    	return implode($pass); //turn the array into a string
    }

	public function upload_data()
	{	
		//MAKE FOLDER
		if (!file_exists('./assets/images/gallery')) {
			mkdir('./assets/images/gallery', 0777, true);
		}
		$targetFile = '';
		if (!empty($_FILES)) 
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $this->randomName() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];
			$targetPath = 'assets/images/gallery/';
			$targetFile = $targetPath . $fileName ;
			$config['file_name'] = $fileName;
			$config["upload_path"]   = "./assets/images/gallery";
			$config["allowed_types"] = "gif|jpg|png";
			$config['max_size']= 10000;
			$config['max_width']= 10000;
			$config['max_height']= 10000;
			$config['overwrite']= TRUE;
			$this->upload->initialize($config);
			//Insert to database
			if (!$this->upload->do_upload("file")) {
				$data = $this->upload->display_errors();
				$data = array(
					'data' => $this->upload->display_errors(),
					'cek' => false,
				);
				echo json_encode($data);
				die;
			}else{
				$data = $this->upload->do_upload();
				echo json_encode($data);
			}
			unset($config);
			//Add
			$title_gallery = $this->input->post('title_gallery');
			$data_gallery = array(
				'title_gallery' => $title_gallery,
				'pict_gallery' => $targetFile,
			);
			$insert = $this->admin->gallery_add('gallery', $data_gallery);
			//Resize
			$path1 = 'thumb/';
			$resize = $this->resizeImg(285,285, $fileName, $path1,  FALSE, $insert);
			$path1 = '';
			$resize = $this->resizeImg(570,1160, $fileName, $path1, TRUE, $insert);
		}
	}

	public function resizeImg($height,$width, $fileName, $path,  $ratio, $id_gallery){
		//Resize
		$data_gallery = '';
		$insert  = '';
		$conf['image_library'] = 'gd2';
		$conf['source_image'] = "./assets/images/gallery/".$fileName;
		$conf['create_thumb'] = FALSE;
		$conf['maintain_ratio'] = $ratio;
		$conf['quality'] = '100%';
		$conf['width'] = $width;
		$conf['height'] = $height;
		$conf['new_image'] = "assets/images/gallery/$path";
		$conf['overwrite']= TRUE;
		$filePath = $conf['new_image'] . $fileName;
		$this->image_lib->clear();
		$this->image_lib->initialize($conf);
		if (!$this->image_lib->resize())
		{
			$data = $this->image_lib->display_errors();
			echo json_encode($data);
			die;
		}else{
			if($path == "thumb/"){
				$data_gallery = array(
					'pictThumb_gallery' => $filePath,
				);
			}else{
				$data_gallery = array(
					'pict_gallery' => $filePath,
				);
			}
			$insert = $this->admin->gallery_update('gallery', $data_gallery, "id_gallery = '$id_gallery'");
		}
	}
}
