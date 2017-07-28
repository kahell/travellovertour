<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Home_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        //Slider
        $data['slider'] = $this->admin->getDataSlider();
        $data['sliderNews'] = $this->admin->getPaketNews();
        //Popular post
        $data['popular_post'] = $this->admin->getPopularPost();
        //Select Testimonial
        $data['blogs'] = $this->admin->getBlogsHome();
        //Popular post
        $data['testimonial_post'] = $this->admin->getDataTesti();
        //End of slider
       $this->load->view('Home' , $data);
    }
}
