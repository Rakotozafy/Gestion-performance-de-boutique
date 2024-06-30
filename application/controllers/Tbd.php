<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbd extends CI_Controller
{    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 0;
        
        $this->_DATA["styles"]  = array("style.css");
        $this->_DATA["scripts"] = array("scripts.js");

        $this->load->model('Tbd_model');
        $this->load->library('form_validation');
    }
    public function index()
    {   
        $data['nbdocteurs'] = $this->Tbd_model->getNbDocteur();
        $data['nbpatients'] = $this->Tbd_model->getNbPatient();
        $data['nbutilisateurs'] = $this->Tbd_model->getNbUtilisateur();
        $data['recetteAnalyse'] =  $this->Tbd_model->getRecetteAnalyse();
        $data['banqueSang'] =  $this->Tbd_model->getRecetteBanqueDeSang();
        $data['recetteEchographie'] =  $this->Tbd_model->getRecetteEchographie();
        $data['recetteradio'] =  $this->Tbd_model->getRecetteRadio();

        $data['totalSoins'] =  $data['recetteAnalyse']+$data['banqueSang']+$data['recetteEchographie']+$data['recetteradio'];
        
        // pourcentage analyse
        $data['pourcentageAnalyse'] = intval($data['recetteAnalyse'])*100/intval($data['totalSoins']);
        
        // pourcentage analyse
        $data['pourcentagebanqueSang'] =intval($data['banqueSang'])*100/intval($data['totalSoins']);
        // pourcentage recetteEchographie
        $data['pourcentageEcho'] = intval($data['recetteEchographie'])*100/intval($data['totalSoins']);
        // pourcentage recetteradio
        $data['pourcentageRadio'] = intval($data['recetteradio'])*100/intval($data['totalSoins']);
        // var_dump(floatval($data['pourcentageAnalyse']));
        // var_dump(floatval($data['pourcentagebanqueSang']));
        // var_dump(floatval($data['pourcentageEcho']));
        // var_dump(floatval($data['pourcentageRadio']));
        // die;
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        $this->load->view('tbd/index', $data);
        $this->load->view('com/footer', $data);
    }
}