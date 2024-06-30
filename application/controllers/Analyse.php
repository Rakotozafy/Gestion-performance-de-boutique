<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analyse extends CI_Controller
{    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 6;
        
        $this->_DATA["styles"]  = array("style.css");
        $this->_DATA["scripts"] = array("scripts.js");

        $this->load->model('Analyse_model');
        $this->load->model('Patient_model');
        $this->load->model('Analysegamme_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'analyse/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'analyse/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'analyse/index.html';
            $config['first_url'] = base_url() . 'analyse/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Analyse_model->total_rows($q);
        $analyse = $this->Analyse_model->getAnalyseJoinPatJoinGammeA();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'analyse_data' => $analyse
        );
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 3 || $this->session->userdata("type") == 1){
            $this->load->view('analyse/quitt_analyse_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function read($id) 
    {
        $row = $this->Analyse_model->get_by_id($id);
        if ($row) {
            $data = array(
		'al_id' => $row->al_id,
		'al_description' => $row->al_description,
		'al_somme' => $row->al_somme,
		'alG_id' => $row->alG_id,
		'pat_id' => $row->pat_id,
		'alG_status' => $row->alG_status,
	    );
            $this->load->view('analyse/quitt_analyse_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analyse'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('analyse/create_action'),
	    'al_id' => set_value('al_id'),
	    'al_description' => set_value('al_description'),
	    'al_somme' => set_value('al_somme'),
	    'alG_id' => set_value('alG_id'),
	    'pat_id' => set_value('pat_id'),
	    'alG_status' => set_value('alG_status'),
	);
    // $data['patients'] = $this->Patient_model->get_all();
    $data['patients'] = $this->Patient_model->getPatientConsultation();
    $data['gammeAnalyse'] = $this->Analysegamme_model->get_all();
    $this->load->view( 'com/header');
    $this->load->view( 'com/menu', $this->_DATA);
        $this->load->view('analyse/quitt_analyse_form', $data);
        $this->load->view('com/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'al_description' => $this->input->post('al_description',TRUE),
		'al_somme' => $this->input->post('al_somme',TRUE),
		'alG_id' => $this->input->post('alG_id',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
		'alG_status' => $this->input->post('alG_status',TRUE),
	    );

            $this->Analyse_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('analyse'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Analyse_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('analyse/update_action'),
		'al_id' => set_value('al_id', $row->al_id),
		'al_description' => set_value('al_description', $row->al_description),
		'al_somme' => set_value('al_somme', $row->al_somme),
		'alG_id' => set_value('alG_id', $row->alG_id),
		'pat_id' => set_value('pat_id', $row->pat_id),
		'alG_status' => set_value('alG_status', $row->alG_status),
	    );
            // $data['patients'] = $this->Patient_model->get_all();
            $data['patients'] = $this->Patient_model->getPatientConsultation();
            $data['gammeAnalyse'] = $this->Analysegamme_model->get_all();
            $this->load->view( 'com/header');
            $this->load->view( 'com/menu', $this->_DATA);
            $this->load->view('analyse/quitt_analyse_form', $data);
            $this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analyse'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('al_id', TRUE));
        } else {
            $data = array(
		'al_description' => $this->input->post('al_description',TRUE),
		'al_somme' => $this->input->post('al_somme',TRUE),
		'alG_id' => $this->input->post('alG_id',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
		'alG_status' => $this->input->post('alG_status',TRUE),
	    );

            $this->Analyse_model->update($this->input->post('al_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('analyse'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Analyse_model->get_by_id($id);

        if ($row) {
            $this->Analyse_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('analyse'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analyse'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('al_description', 'al description', 'trim|required');
	$this->form_validation->set_rules('al_somme', 'al somme', 'trim|required');
	$this->form_validation->set_rules('alG_id', 'alg id', 'trim|required');
	$this->form_validation->set_rules('pat_id', 'pat id', 'trim|required');
	$this->form_validation->set_rules('alG_status', 'alg status', 'trim|required');

	$this->form_validation->set_rules('al_id', 'al_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Analyse.php */
/* Location: ./application/controllers/Analyse.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-23 19:15:54 */
/* http://harviacode.com */