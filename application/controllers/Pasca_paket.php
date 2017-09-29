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
		$this->load->library('upload');
		$this->load->library('image_lib');
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
			$data['paket'] = $this->admin->getData('paket',"WHERE '1' ORDER BY id_paket DESC");
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
			$selectTablePaket = $this->admin->getData('paket', 'where id_paket = '. $id_paket);
			//Delete Foto di dalam folder destinasi
			foreach ($selectTablePaket->result() as $row) {
				unlink($row->pict_paket);
				unlink($row->pictSlider_paket);
				unlink($row->pictThumb_paket);
				unlink($row->pictThumb2_paket);
			}
			//Delete Foto di dalam paket unlink
			foreach ($select_paket->result() as $row) {
				$where = 'id_foto = '.$row->id_foto.' AND id_paket = '.$id_paket;
				$delete_foto = $this->admin->deleteData('foto', $where);
				//Detele From Folder
				if (file_exists($row->foto_paket)) {
					unlink($row->foto_paket);
				}
			}
			$delete = $this->admin->deleteData('paket',"id_paket ='$id_paket'");
			$this->load->view('Admin_paket' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function upload()
	{	
		if (!empty($_FILES)) 
		{	
			//MAKE FOLDER
			if (!file_exists('./assets/images/destinasi/etc')) {
				mkdir('./assets/images/destinasi/etc', 0777, true);
			}

			for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
				$fileName = $this->randomName() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name'][$i]);

				$_FILES['file']['name']     = $this->randomName() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name'][$i]);
				$_FILES['file']['type']     = $_FILES['file']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['file']['error'][$i];
				$_FILES['file']['size']     = $_FILES['file']['size'][$i];

				$targetPath = 'assets/images/destinasi/etc/';
				$targetFile = $targetPath . $fileName ;
				$config["upload_path"]   = "./assets/images/destinasi/etc/";
				$config["allowed_types"] = "gif|jpg|png";
				$config['max_size']= 10000;
				$config['max_width']= 10000;
				$config['max_height']= 10000;
				$config['file_name'] = $fileName;
				$config['overwrite']= TRUE;
				//Insert to database
				$this->upload->initialize($config);
				if (!$this->upload->do_upload("file")) {
					$data = $this->upload->display_errors();
					$data = array(
						'data' => $this->upload->display_errors(),
						'cek' => false,
					);
					echo json_encode($data);
					die;
				}else{
					$data[] = $this->upload->do_upload();
					echo json_encode($data);
				}
				unset($config);
				//Resize
				$insert  = '';
				$conf['image_library'] = 'gd2';
				$conf['source_image'] = "./assets/images/destinasi/etc/".$fileName;
				$conf['create_thumb'] = FALSE;
				$conf['maintain_ratio'] = true;
				$conf['quality'] = '100%';
				$conf['width'] = 1170;
				$conf['height'] = 480;
				$conf['new_image'] = "assets/images/destinasi/etc/";
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
					$data = array(
						'id_paket' => $this->input->post('id_paket'),
						'foto_paket' => $filePath,
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
		$path_foto2 = "./assets/images/destinasi/etc/".$path_foto[8];
		echo $path_foto[7];
		$insert = $this->admin->delete_id($id_foto, 'foto');
		//Detele From Folder
		unlink($path_foto2);
	}

	public function resizeImg($height, $width, $fileName, $path, $ratio, $id_paket){
		$insert  = '';
		$config['image_library'] = 'gd2';
		$config['source_image'] = "./assets/images/destinasi/ori/".$fileName;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = $ratio;
		$config['quality'] = '100%';
		$config['width'] = $width;
		$config['height'] = $height;
		$config['new_image'] = "assets/images/destinasi/$path/";
		$config['overwrite']= TRUE;
		$filePath = $config['new_image'] . $fileName;
		$this->image_lib->initialize($config);
		if (!$this->image_lib->resize())
		{
			$data = $this->image_lib->display_errors();
			echo json_encode($data);
			die;
		}else{
			$image_data = '';
			if ($path == "tours/2x") {
				$image_data = array(
					'pictThumb2_paket' => $filePath
				);
			}elseif ($path == "sliders") {
				$image_data = array(
					'pictSlider_paket' => $filePath
				);
			}elseif($path == "ori"){
				$image_data = array(
					'pict_paket' => $filePath
				);
			}else{
				$image_data = array(
					'pictThumb_paket' => $filePath
				);
			}
			
			$insert = $this->admin->paket_update('paket',"id_paket = '$id_paket'",$image_data);
		}
		$this->image_lib->clear();
		return $insert;
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

    	$id_paket = $this->input->post('id_paket');
    	$targetFile = "";
    	$file2 = $this->input->post('file2');
    	$pictThumb_paket = $this->input->post('pictThumb_paket');
    	$pictThumb2_paket = $this->input->post('pictThumb2_paket');
    	$pictSlider_paket = $this->input->post('pictSlider_paket');

    	if (!empty($_FILES)) 
    	{	
			//MAKE FOLDER
    		if (!file_exists('./assets/images/destinasi/ori')) {
    			mkdir('./assets/images/destinasi/ori', 0777, true);
    		}

    		$tempFile = $_FILES['file']['tmp_name'];
    		$fileName = $this->randomName() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);
    		$fileType = $_FILES['file']['type'];
    		$fileSize = $_FILES['file']['size'];
    		$targetPath = 'assets/images/destinasi/ori/';
    		$targetFile = $targetPath . $fileName ;
    		$config["upload_path"]   = "./assets/images/destinasi/ori/";
    		$config["allowed_types"] = "gif|jpg|png|jpeg";
    		$config['file_name']= $fileName;
    		$config['max_size']= 10000;
    		$config['max_width']= 10000;
    		$config['max_height']= 10000;
    		$config['overwrite']= TRUE;
    		$this->upload->initialize($config);
    		if (!$this->upload->do_upload("file")) {
    			$data = array(
    				'data' => $this->upload->display_errors(),
    				'cek' => false,
    			);
    			echo json_encode($data);
    			die;
    		}else{
    			$data = $this->upload->do_upload();
    			if(!empty($file2) && !empty($pictThumb_paket) && !empty($pictThumb2_paket) && !empty($pictSlider_paket)){
    				unlink($file2);
    				unlink($pictThumb_paket);
    				unlink($pictThumb2_paket);
    				unlink($pictSlider_paket);
    			}
				//Resize
    			$path = 'tours';
    			$resizeThumb = $this->resizeImg(350,480, $fileName, $path,  FALSE, $id_paket);
    			$path2 = 'tours/2x';
    			$resizeThumb = $this->resizeImg(700,960, $fileName, $path2, FALSE, $id_paket);
    			$path3 = 'sliders';
    			$resizeThumb = $this->resizeImg(480,1170, $fileName, $path3, TRUE, $id_paket);
    			$path4 = 'ori';
    			$resizeThumb = $this->resizeImg(720,1280, $fileName, $path4, TRUE, $id_paket);
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
    		'aktif_paket' => 'aktif'
    	);
    	$insert = $this->admin->paket_update('paket',"id_paket = '$id_paket'",$data);
    	echo json_encode($insert);
    }

    public function upload_supernote()
    {	
		//MAKE FOLDER
    	if (!file_exists('./assets/images/supernote')) {
    		mkdir('./assets/images/supernote', 0777, true);
    	}

    	if (!empty($_FILES)) 
    	{	
    		$tempFile = $_FILES['file']['tmp_name'];
    		$fileName = $this->randomName() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);
    		$fileType = $_FILES['file']['type'];
    		$fileSize = $_FILES['file']['size'];
    		$targetPath = 'assets/images/supernote/';
    		$targetFile = $targetPath . $fileName ;
    		$config["upload_path"]   = "./assets/images/supernote";
    		$config["allowed_types"] = "gif|jpg|png";
    		$config['file_name']= $fileName;
    		$config['max_size']= 10000;
    		$config['max_width']= 10000;
    		$config['max_height']= 10000;
    		$config['overwrite']= TRUE;
    		$this->upload->initialize($config);
			//Insert to database
    		if (!$this->upload->do_upload("file")) {
    			$data = array(
    				'data' => $this->upload->display_errors(),
    				'cek' => false,
    			);
    			echo json_encode($data);
    			die;				
    		}else{
    			$data = $this->upload->do_upload();
				//Resize
    			$insert  = '';
    			$conf['image_library'] = 'gd2';
    			$conf['source_image'] = "./assets/images/supernote/".$fileName;
    			$conf['create_thumb'] = FALSE;
    			$conf['maintain_ratio'] = TRUE;
    			$conf['quality'] = '100%';
    			$conf['width'] = 1280;
    			$conf['height'] = 720;
    			$conf['new_image'] = "./assets/images/supernote/";
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
    				$data = array(
    					'id_paket' => $this->input->post('id_paket'),
    					'foto_paket' => $targetFile,
    					'typeFoto_paket' => 'summernote',
    				);
    				$insert = $this->admin->paket_add('foto', $data);
    			}
    		}
    		echo base_url().''.$targetFile;
    	}
    }

    public function remove()
    {
    	$file = $this->input->post("file");
    	if ($file && file_exists("./assets/images/destinasi/etc/". $file)) {
    		unlink("./assets/images/destinasi/etc/" . $file);
    		$delete = $this->admin->fotoDelete('foto', "./assets/images/destinasi/etc/" . $file);
    		echo json_encode($delete);
    	}
    }
}
