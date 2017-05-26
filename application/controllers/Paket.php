<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

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
    }

    public function pesan($id) {
        $data['paket'] = $this->Home_model->getData('paket', 'where id_paket = ' .$id ." AND aktif_paket = 'aktif'");
        $data['foto'] = $this->Home_model->getData('foto', 'where id_paket = ' .$id);
        $data['popular_paket'] = $this->Home_model->getData('paket', 'where id_paket != ' .$id ." AND aktif_paket = 'aktif'");
        $data['fotoPopular_paket'] = $this->Home_model->getData('foto', 'where id_paket != ' .$id." AND typeFoto_paket = 'destinasi'");
        $this->load->view('pesanPaket', $data);
    }

    public function konfirmasi() {
        $total_harga = $this->input->post('total_harga');
        $id_paket =  $this->input->post('id_paket');
        $jumlah_orang =  $this->input->post('jumlah_orang');
        if ($total_harga == null && $id_paket == null && $jumlah_orang==null) {
            //$this->load->view('error');
            redirect('Error', 'refresh');
        }else{
            $data['paket'] = $this->Home_model->getData('paket', 'where id_paket = '.$id_paket." AND aktif_paket = 'aktif'");
            $data['foto'] = $this->Home_model->getData('foto', 'where id_paket = '.$id_paket);
            $data['jumlah_orang'] = $jumlah_orang;
            $data['total_harga'] = $total_harga;
            $this->load->view('konfirmasi', $data);
        }        
    }

    public function checkOut() {
        $total_harga = $this->input->post('total_harga'); 
        $jumlah_orang =  $this->input->post('jumlah_orang');
        //Data Pemesan
        $genderPemesan = $this->input->post('contact_title');
        $namaDepanPemesan = $this->input->post('namaDepanPemesan');
        $namaBelakangPemesan = $this->input->post('namaBelakangPemesan');
        $namaPemesan = $namaDepanPemesan . " " . $namaBelakangPemesan;
        $teleponPemesan = $this->input->post('teleponPemesan');
        $emailPemesan = $this->input->post('emailPemesan');
        //Input data pemesan
        $dataPemesan = array(
                        'id_paket' => $this->input->post('id_paket'),
                        'nama_pemesan' => $namaPemesan,
                        'gender_pemesan' => $genderPemesan,
                        'telpon_pemesan' => $teleponPemesan,
                        'email_pemesan' => $emailPemesan,
                        'total_harga' => $total_harga,
                        'caraBayar' => $this->input->post('caraBayar')
                    );
        $insert = $this->Home_model->insertData('transaksi', $dataPemesan); //Get id_transaksi terbaru

        //Data Tamu
        for ($i=0; $i < $jumlah_orang; $i++) { 
            $genderTamu = $this->input->post('title'.$i);
            $namaDepan = $this->input->post('namaDepan'.$i);
            $namaBelakang = $this->input->post('namaBelakang'.$i);
            $namaTamu = $namaDepanPemesan . " " . $namaBelakangPemesan;
            $dataPemesan = array(
                    'id_transaksi' => $insert,
                    'nama_tamu' => $namaTamu,
                    'gender_tamu' => $genderTamu
                );

            $insertTamu = $this->Home_model->insertData('datatamu', $dataPemesan); //Get id_transaksi terbaru
        }

        redirect('Home', 'refresh');
    }
}