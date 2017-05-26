<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca_admin extends CI_Controller {

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
		//Select Slider
		$data['slider'] = $this->admin->getDataSlider();

		$this->load->view('Admin' , $data); 
	}else{
		$this->load->view('Login'); 
	}
}

public function ajax_edit($id)
{
$data = $this->admin->get_by_id($id);
echo json_encode($data);
}

private function do_upload()
{	
	$inputNamePic = $this->input->post('namePic');
	$inputPricePic = $this->input->post('pricePic');
	if ($_FILES  != null && $inputNamePic != null && $inputPricePic != null){
		//POST
		$inputNamePic = $this->input->post('namePic');
		$file1 = $_FILES['file']['name'];
		$temp = $_FILES["file"]["tmp_name"];
		//Taro hanya untuk di folder itu
		$foto = "assets/images/slider/".$file1;

		$config['upload_path'] = "./assets/images/slider";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']= 1000;
		$config['max_width']= 1024;
		$config['max_height']= 768;
		$config['overwrite']= TRUE;
				
		$library = $this->load->library('upload', $config);

		if (!$this->upload->do_upload("file")) {
			//MAKE FOLDER
			if (!file_exists('./assets/images/slider')) {
			    mkdir('./assets/images/slider', 0777, true);
			}
			//Mindah foto ke folder
			if (!empty($_FILES['file']["name"])) {
			    move_uploaded_file($temp,"./assets/images/slider/$file1");
			}
			$data = array(
				'namePic' => $inputNamePic,
				'pic' => $foto,
				'pricePic' => $this->input->post('pricePic'),
			);
			$insert = $this->admin->slider_add($data);
			
		}
	}
	
}
public function sliderAdd()
{	
    $this->do_upload();
}

public function sliderUpdate()
{	
	//POST
	$inputNamePic = $this->input->post('namePic');
	$inputPicSebelum = $this->input->post('picSebelum');
	$foto = "";
	$foto1 = explode('/', $inputPicSebelum);
	$file1 = $_FILES['file']['name'];

	$config['upload_path'] = "./assets/images/slider";
	$config['allowed_types'] = 'gif|jpg|png|mp4|ogv';
	$config['max_size']= 1000;
	$config['max_width']= 1024;
	$config['max_height']= 768;
	$config['overwrite']= TRUE;

	if(!empty($_FILES)){
        if ($foto1[3] == $_FILES["file"]["name"]) {
	        $foto1 = "assets/images/slider/".$foto1[3];
	        $foto = str_replace(' ', '-', $foto1);
        }else{
	        $foto1 = "assets/images/slider/".$_FILES["file"]["name"];
	        $foto = str_replace(' ', '-', $foto1);
	        $temp = $_FILES["file"]["tmp_name"];
	        $type = $_FILES["file"]["type"];
        }
	}else{
	    //$foto1[4] = Karena dia index ke 4 hitung index dari 0
	    $foto = "assets/images/slider/".$foto1[3];
	}
			
	$this->load->library('upload', $config);

	if (!$this->upload->do_upload("file")) {
		//MAKE FOLDER
		if (!file_exists('./assets/images/slider')) {
		    mkdir('./assets/images/slider', 0777, true);
		}
		//Mindah foto ke folder
		if (!empty($_FILES['file']["name"])) {
		    move_uploaded_file($temp,"assets/images/slider/$file1");
		}
		$data = array(
			'namePic' => $inputNamePic,
			'pic' => $foto,
			'pricePic' => $this->input->post('pricePic'),
		);
		$this->admin->slider_update(array('id' => $this->input->post('id')), $data);
	}
}

public function slider_delete($id)
{
	//manggil nama file gambar
	$file = $this->admin->get_by_id($id);
	

	//Hapus Gambar dari FOLDER
	if (file_exists($file->pic)) {
		$this->admin->delete_by_id($id);
		unlink('./'.$file->pic);
		echo json_encode(array("status" => TRUE));
	}else{
		echo json_encode(array("status" => FALSE));
	}
}

}
