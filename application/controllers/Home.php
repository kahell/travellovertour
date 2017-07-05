<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        //Slider
        $data['slider'] = $this->Home_model->getData('home', '');
        //
        //End of slider
       $this->load->view('Home' , $data);
    }
}
