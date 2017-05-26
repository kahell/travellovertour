<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasca extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->helper('cookie');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        if($this->session->userdata('adminSession')){          
          redirect('Pasca_admin', 'refresh');
        }else{
          $this->load->view('Login'); 
        }
    }
    
    public function selectLogin(){
        $this->form_validation->set_rules('username', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          //Check Berdasarkan Username
          $result = $this->Admin_model->getDataLogin($username,md5($password));
          if($result){
            //Status
            $sess_array = array();      
            foreach($result as $row){
              $sess_array = array(          
                'id'  => $row->id,
                'username' => $row->username,
                'email' => $row->email,
              );
            }
            //SET SESSION
            $this->session->set_userdata('adminSession', $sess_array);
            redirect('Pasca_admin');
          }else{      
            $this->session->set_flashdata('gagalmasuk','Username atau Password anda salah');                   
            redirect(base_url().'Pasca', 'refresh');
          }
        }else{
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          //Check Berdasarkan Email
          $result = $this->Admin_model->getDataLogin($username,md5($password));
          if($result){
            //Status
            $sess_array = array();      
            foreach($result as $row){
              $sess_array = array(          
                'id'  => $row->id,
                'username' => $row->username,
                'email' => $row->email
              );
            }
            //SET SESSION
            $this->session->set_userdata('adminSession', $sess_array);
            redirect('Pasca_admin');
          }else{
              $this->session->set_flashdata('gagalmasuk','Username atau Password anda salah');
              redirect(base_url().'Pasca', 'refresh');
          }
        }
    }
    
  function logout(){
    $this->session->unset_userdata('adminSession');
    session_destroy();
    redirect('Home', 'refresh');
  }
}
