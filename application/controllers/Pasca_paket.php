<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca_paket extends CI_Controller {
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
	private $upload_path = "./assets/images/destinasi";

	public function index()
	{
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Delete Un Aktif Paket
			$delete_paket = $this->admin->deleteData('paket',"aktif_paket = 'belum_aktif'");

			//Nampilin Paket
			$data['paket'] = $this->admin->getData('paket','');

			$this->load->view('Admin_paket' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function edit_paket2(){
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			$this->load->view('Admin_paket' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function edit_paket($id){
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Nampilin Paket
			$data['paket'] = $this->admin->getData('paket','where id_paket = '.$id);
			$data['foto'] = $this->admin->getData('foto', "where id_paket = ".$id . " AND typeFoto_paket = 'destinasi'");
			$this->load->view('Admin_editPaket' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function add_paket(){
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];

			//create data
			$data_paket = array(
				'aktif_paket' => 'belum_aktif',
				'popular_paket' => 0,
				'slider_paket' => 0,
				);
			$paket = $this->admin->paket_add('paket', $data_paket);

			//Get Paket Untuk ambil id_paket
			$data['paket'] = $this->admin->getData('paket',"where aktif_paket = 'belum_aktif' order by id_paket desc limit 1");

			//View
			$this->load->view('Admin_addPaket' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}
	public function delete_paket(){
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Nampilin Paket
			$data['paket'] = $this->admin->getData('paket','');
			//Delete Paket
			$id_paket = $this->input->post('id_paket');
			$select_paket = $this->admin->getData('foto', 'where id_paket = '. $id_paket);
			//Delete Foto di dalam paket unlink
			foreach ($select_paket->result() as $row) {
				$where = 'id_foto = '.$row->id_foto.' AND id_paket = '.$id_paket;
				$delete_foto = $this->admin->deleteData('foto', $where);
				//Detele From Folder
				if (file_exists($row->foto_paket)) {
					unlink($row->foto_paket);
				}
			}
			$delete = $this->admin->deleteData('paket','id_paket = '.$id_paket);
			$this->load->view('Admin_paket' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function upload()
	{	
		if (!empty($_FILES)) 
		{	
			for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
				$tempFile = $_FILES['file']['tmp_name'][$i];
				$fileName = str_replace(' ', '', $_FILES['file']['name'][$i]);
				$fileType = $_FILES['file']['type'][$i];
				$fileSize = $_FILES['file']['size'][$i];

				$targetPath = './assets/images/destinasi/';
				$targetFile = $targetPath . $fileName ;
				$config["upload_path"]   = "./assets/images/destinasi";
				$config["allowed_types"] = "gif|jpg|png";
				$config['max_size']= 1000;
				$config['max_width']= 1024;
				$config['max_height']= 768;
				$config['overwrite']= TRUE;

				$this->load->library('upload', $config);
				//Insert to database
				//MAKE FOLDER
				if (!file_exists('./assets/images/destinasi')) {
					mkdir('./assets/images/destinasi', 0777, true);
				}
				//Mindah foto ke folder
				if (!empty($_FILES['file']["name"][$i])) {
					move_uploaded_file($tempFile,"./assets/images/destinasi/$fileName");
				}
				if (!$this->upload->do_upload("file")) {
					$data = array(
						'id_paket' => $this->input->post('id_paket'),
						'foto_paket' => $targetFile,
						'typeFoto_paket' => 'destinasi',
						);
					$insert = $this->admin->paket_add('foto', $data);
				}
			}
		}
	}

	public function delete_foto()
	{	
		$id_foto = $this->input->post('id_foto');
		$path_foto = explode('/', $this->input->post('path_foto'));
		$path_foto2 = "./assets/images/destinasi/".$path_foto[7];
		echo $path_foto[7];
		$insert = $this->admin->delete_id($id_foto, 'foto');
		//Detele From Folder
		unlink($path_foto2);
	}

	public function upload_data()
	{	
		$id_paket = $this->input->post('id_paket');
		$targetFile = '';
		$file2 = $this->input->post('file2');
		if (!empty($_FILES)) 
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = str_replace(' ', '', $_FILES['file']['name']);
			$fileType = $_FILES['file']['type'];
			$fileSize = $_FILES['file']['size'];
			$targetPath = './assets/images/destinasi/';
			$targetFile = $targetPath . $fileName ;
			$config["upload_path"]   = "./assets/images/destinasi";
			$config["allowed_types"] = "gif|jpg|png";
			$config['max_size']= 1000;
			$config['max_width']= 1024;
			$config['max_height']= 768;
			$config['overwrite']= TRUE;
			$this->load->library('upload', $config);
			//Insert to database
			if (!$this->upload->do_upload("file")) {
				//MAKE FOLDER
				if (!file_exists('./assets/images/destinasi')) {
					mkdir('./assets/images/destinasi', 0777, true);
				}
				//Mindah foto ke folder
				if (!empty($_FILES['file']["name"])) {
					move_uploaded_file($tempFile,"./assets/images/destinasi/$fileName");
					unlink($file2);
				}
				
			}
		}else{
			$targetFile = $this->input->post('file2');
		}

		$data = array(
			'nama_paket' => $this->input->post('nama_paket'),
			'typeTrip_paket' => $this->input->post('typeTrip_paket'),
			'lokasi_paket' => $this->input->post('lokasi_paket'),
			'pict_paket' => $targetFile,
			'harga_paket' => $this->input->post('harga_paket'),
			'deskripsi_paket' => $this->input->post('deskripsi_paket'),
			'itenary_paket' => $this->input->post('itenary'),
			'syarat_paket' => $this->input->post('syarat'),
			'aktif_paket' => 'aktif',
			);
		$insert = $this->admin->paket_update('paket', 'id_paket = '.$id_paket , $data);

		redirect('Pasca_paket', 'refresh'); 
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
				}
				
				$data = array(
					'id_paket' => $this->input->post('id_paket'),
					'foto_paket' => $targetFile,
					'typeFoto_paket' => 'summernote',
					);
				$insert = $this->admin->paket_add('foto', $data);
			}
			echo base_url().''.$targetFile;
		}
	}

	public function remove()
	{
		$file = $this->input->post("file");
		if ($file && file_exists("./assets/images/destinasi/". $file)) {
			unlink("./assets/images/destinasi/" . $file);
			$delete = $this->admin->fotoDelete('foto', "./assets/images/destinasi/" . $file);
		}
	}
}
