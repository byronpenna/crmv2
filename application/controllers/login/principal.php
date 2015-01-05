<?php

if (!defined('BASEPATH'))
    exit('no direct script allowed');

class Principal extends CI_Controller {

    function Principal() {
        parent::__construct();
        session_start();
        $this->load->library('LemString');
        $this->load->helper('session');
        no_cache();
    }

    function index() {
        

        $Data['titulo'] = "Inicio";
        $this->load->view('estructura/header', $Data);
        $this->load->view('estructura/top_bar', $Data);
        $this->load->view('estructura/global_container_index');
        $this->load->view('general/principal/index.php');
        $this->load->view('estructura/footer');
    }
}
?>