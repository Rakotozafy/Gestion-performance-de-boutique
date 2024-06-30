<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DocteurRecap extends CI_Controller
{
    protected $_DATA            = array();    
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 12;
        $this->load->model('Patient_model');
        $this->load->model('Docteur_model');
    }
    public function index()
    {
        $data['recapdocteurs'] = $this->Docteur_model->getRecap();
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 4 || $this->session->userdata("type") == 1){
            $this->load->view('docteur/docteur_recap', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
		$this->load->view('com/footer');
    }
 }