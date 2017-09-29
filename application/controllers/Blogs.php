<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {
    
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
        //Nampilin Paket
        $paket = $this->Home_model->getData('paket', '');
        //Nampilin Foto Paket
        $foto = $this->Home_model->getData('foto', "where typeFoto_paket = 'destinasi'");
        //Pagination with ajax
        $limit = 8;
        $query = $this->Home_model->all('paket',$limit);
        $total_rows = $this->Home_model->count('paket');

        $config['total_rows']  = $total_rows;
        $config['uri_segment'] = 3;
        $config['per_page']    = $limit;
        $config['base_url']    = site_url('Paket/index');

        $this->load->helper('app');
        $pagination_links = pagination($total_rows, $limit);
        //View
        if (!$this->input->is_ajax_request())$this->load->view('header');
        $this->load->view('paket', compact("paket","foto",'query', 'pagination_links'));
        if (!$this->input->is_ajax_request())$this->load->view('footer');
        
        $this->load->view('Blogs' , $data);
    }
}
