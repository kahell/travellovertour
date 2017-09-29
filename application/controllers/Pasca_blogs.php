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
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index() {
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Delete Un Aktif post
			//$delete_blogs = $this->admin->deleteData('post',"status_post = '0'");
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
			$data_post = array(
				'status_post' => 0
			);
			
			$blogs = $this->admin->addBlogs('post', $data_post);
			$data['blogs'] = $blogs;

			$this->load->view('Admin_addBlogs' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function edit_post($id){
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Nampilin Post
			$data['blogs'] = $this->admin->getData('post','where id_post = '.$id);
			$data['tags'] = $this->admin->getTagJoin($id);
			$data['category'] = $this->admin->getCategoryJoin($id);
			//die(var_dump($data['tags']->result()));
			$this->load->view('Admin_editBlogs' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	public function deletePost(){
		if($this->session->userdata('adminSession')){                 
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//Nampilin post
			$data['blogs'] = $this->admin->getData('post','');
			//Delete post
			$id_post = $this->input->post('id_post');
			$select_post = $this->admin->getData('foto', 'where id_post = '. $id_post);
			$selectTablePost = $this->admin->getData('post', 'where id_post = '. $id_post);
			//Delete Foto di dalam folder destinasi
			foreach ($selectTablePost->result() as $row) {
				unlink($row->pict_post);
				unlink($row->pictThumb_post);
			}
			//Delete Foto di dalam post unlink
			if (!empty($select_post->result())) {
				foreach ($select_post->result() as $row) {
					$where = 'id_foto = '.$row->id_foto.' AND id_post = '.$id_post;
					$delete_foto = $this->admin->deleteData('foto', $where);
				//Detele From Folder
					if (file_exists($row->foto_post)) {
						unlink($row->foto_post);
					}
				}
			}
			$delete = $this->admin->deleteData('post','id_post = '.$id_post);
			echo json_encode($delete);
		}else{
			$this->load->view('Login'); 
		}
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
						'id_post' => $this->input->post('id_post'),
						'foto_post' => $targetFile,
						'typeFoto_post' => 'summernote',
					);
					$insert = $this->admin->paket_add('foto', $data);
				}
			}
			echo base_url().''.$targetFile;
		}
	}

	public function resizeImg($height, $width, $fileName, $path, $ratio, $id_post){
		$insert  = '';
		$config['image_library'] = 'gd2';
		$config['source_image'] = "./assets/images/blogs/".$fileName;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = $ratio;
		$config['quality'] = '100%';
		$config['width'] = $width;
		$config['height'] = $height;
		$config['new_image'] = "assets/images/blogs/$path";
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
			if ($path == "thumb/") {
				$image_data = array(
					'pictThumb_post' => $filePath
				);
			}else{
				$image_data = array(
					'pict_post' => $filePath
				);
			}
			
			$insert = $this->admin->updateBlogs('post',"id_post = '$id_post'",$image_data);
		}
		$this->image_lib->clear();
		return $insert;
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
			//MAKE FOLDER
			if (!file_exists('./assets/images/blogs')) {
				mkdir('./assets/images/blogs', 0777, true);
			}
			$fileName = $this->randomName() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);
			$targetPath = 'assets/images/blogs/';
			$targetFile = $targetPath . $fileName ;
			$config['file_name'] = $fileName;
			$config["upload_path"]   = "./assets/images/blogs";
			$config["allowed_types"] = "gif|jpg|png";
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
				if(!empty($file2) && !empty($pictThumb_blogs)){
					unlink($file2);
					unlink($pictThumb_blogs);
				}
			}
			//Resize
			$path = 'thumb/';
			$resizeThumb = $this->resizeImg(240,770, $fileName, $path,  FALSE, $id_post);
			$path2 = '';
			$resizeThumb = $this->resizeImg(720,1280, $fileName, $path2, TRUE, $id_post);
		}else{
			$targetFile = $this->input->post('file2');
		}

		$data = array(
			'title_post' => $this->input->post('title_post'),
			'pict_post' => $targetFile,
			'postedBy_post' => $data['namaAdmin'],
			'date_post' => date('d M Y'),
			'deskripsi_post' => $this->input->post('deskripsi_post'),
			'body_post' => $this->input->post('body_post'),
			'status_post' => $this->input->post('status_post')
		);
		$insert = $this->admin->updateBlogs('post','id_post = '.$id_post,$data);

		echo json_encode($insert);
	}

	public function upload_tags(){
		$nama_tags = $this->input->post('tags_post');
		$id_post = $this->input->post('id_post');
		//Cek nama_tags di tags
		$cekTags = $this->admin->getTags($nama_tags);

		if (empty($cekTags->result())) {
			$nameTags = array(
				'name' => $nama_tags
			);
			$insertTags = $this->admin->addTags('tags',$nameTags);
			$dataTags = array(
				'id_tag_post' => $insertTags,
				'id_post' => $this->input->post('id_post')
			);
			$addRelationTags = $this->admin->addTags('tag_post', $dataTags);
		}else{
			//tambah di relationshipnya aja
			$getId_tags = $this->admin->getId('tags',$nama_tags);
			//Pengeceken id_post
			$cekIdPost = $this->admin->getIdPost('tag_post', $getId_tags, $id_post);
			if (empty($cekIdPost->result())) {
				$dataTags = array(
					'id_tag_post' => $getId_tags,
					'id_post' => $id_post
				);
				$addRelationTags = $this->admin->addTags('tag_post', $dataTags);
			}
		}
		echo json_encode($cekTags->result());
	}

	public function remove_tags(){
		$name_tags = $this->input->post('tags_post');
		$id_post = $this->input->post('id_post');

		$getId_tags = $this->admin->getId('tags',$name_tags);
		$deleteRelation_tags = $this->admin->deleteTagsRel('tag_post',$getId_tags, $id_post);
		echo json_encode($deleteRelation_tags);
	}

	public function upload_categories(){
		$nama_category = $this->input->post('categories_post');
		$id_post = $this->input->post('id_post');
		//Cek nama_tags di tags
		$cekCategory = $this->admin->getCategory($nama_category);

		if (empty($cekCategory->result())) {
			$nameTags = array(
				'name' => $nama_category
			);
			$insertTags = $this->admin->addCategories('categories',$nameTags);
			$dataTags = array(
				'id_category_post' => $insertTags,
				'id_post' => $id_post
			);
			$addRelationTags = $this->admin->addCategories('category_post', $dataTags);
		}else{
			//tambah di relationshipnya aja
			$getId_tags = $this->admin->getIdCategory('categories',$nama_category);
			//Pengeceken id_post
			$cekIdPost = $this->admin->getIdPostCategory('category_post', $getId_tags, $id_post);
			if (empty($cekIdPost->result())) {
				$dataTags = array(
					'id_category_post' => $getId_tags,
					'id_post' => $id_post
				);
				$addRelationTags = $this->admin->addCategories('category_post', $dataTags);
			}
			//echo json_encode($getId_tags);
		}

		echo json_encode($cekCategory->result());
	}

	public function remove_categories(){
		$nama_category = $this->input->post('categories_post');
		$id_post = $this->input->post('id_post');
		$getId_tags = $this->admin->getIdCategory('categories',$nama_category);
		$deleteRelation_tags = $this->admin->deleteCategoryRel('category_post',$getId_tags, $id_post);
		echo json_encode($deleteRelation_tags);
	}

}
