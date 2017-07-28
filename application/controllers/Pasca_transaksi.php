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
			$data['transaksi'] = $this->admin->getDataTransaksi();
			$this->load->view('Admin_transaksi' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	function getView($id){
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//ambil data tamu
			$data['dataTamu']= $this->admin->getDataTamu($id);
			$data['transaksi'] = $this->admin->getDataTransaksiById($id);
			//die(var_dump($data['transaksi']->result()));
			$this->load->view('Admin_editTransaksi' , $data); 
		}else{
			$this->load->view('Login'); 
		}
	}

	function getSaveDataTamu(){
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//ambil data tamu
			$gender = $this->input->post('gender');
			$id_dataTamu = $this->input->post('id_dataTamu');
			$data_tamu = array(
				'gender_tamu' => $gender,
				);
			$update = $this->admin->dataTamu_update('id_dataTamu = ' . $id_dataTamu, $data_tamu);
			echo json_encode($update);
		}else{
			$this->load->view('Login'); 
		}
	}

	function getSave(){
		if($this->session->userdata('adminSession')){
			$inputNamePicadmin = $this->session->userdata('adminSession');
			$data['namaAdmin']  = $inputNamePicadmin['username'];
			//ambil data tamu
			$atribut = $this->input->post('atribut');
			$id_transaksi = $this->input->post('id_transaksi');
			$data_save = $this->input->post('data_save');
			$transaksi='';
			if ($atribut == 'nama_pemesan') {
				$data_transaksi = array(
					'nama_pemesan' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'gender_pemesan'){
				$data_transaksi = array(
					'gender_pemesan' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'telpon_pemesan'){
				$data_transaksi = array(
					'telpon_pemesan' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'email_pemesan'){
				$data_transaksi = array(
					'email_pemesan' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'total_harga'){
				$data_transaksi = array(
					'total_harga' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'caraBayar'){
				$data_transaksi = array(
					'caraBayar' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'status_transaksi'){
				$data_transaksi = array(
					'status_transaksi' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'time_transaksi'){
				$data_transaksi = array(
					'time_transaksi' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'time_order'){
				$data_transaksi = array(
					'time_order' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}else if($atribut == 'catatan_transaksi'){
				$data_transaksi = array(
					'catatan_transaksi' => $data_save,
					);
				$transaksi = $this->admin->transaksi_update('id_transaksi ='.$id_transaksi, $data_transaksi);
			}
			echo json_encode($transaksi);
		}else{
			$this->load->view('Login'); 
		}
	}
}
