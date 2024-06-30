<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Soinsexterne extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Certificatmedical_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('soinsexternes/menu');
    }   
}     