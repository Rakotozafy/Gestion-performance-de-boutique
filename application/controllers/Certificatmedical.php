<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificatmedical extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 4;
        $this->load->model('Certificatmedical_model');
        $this->load->model('Patient_model');
        $this->load->model('Docteur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'certificatmedical/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'certificatmedical/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'certificatmedical/index.html';
            $config['first_url'] = base_url() . 'certificatmedical/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Certificatmedical_model->total_rows($q);
        $certificatmedical = $this->Certificatmedical_model->getCertificatMedJoinPatJoinDoc();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'certificatmedical_data' => $certificatmedical,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 3 || $this->session->userdata("type") == 1){
            $this->load->view('certificatmedical/quitt_certificatmedical_list', $data);   
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
		$this->load->view('com/footer');
    }

    public function read($id) 
    {
        $row = $this->Certificatmedical_model->get_by_id($id);
        if ($row) {
            $data = array(
		'cm_id' => $row->cm_id,
		'cm_designation' => $row->cm_designation,
		'cm_somme' => $row->cm_somme,
		'pat_id' => $row->pat_id,
		'doc_im' => $row->doc_im,
	    );
            $this->load->view('certificatmedical/quitt_certificatmedical_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('certificatmedical'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('certificatmedical/create_action'),
	    'cm_id' => set_value('cm_id'),
	    'cm_designation' => set_value('cm_designation'),
	    'cm_somme' => set_value('cm_somme'),
	    'pat_id' => set_value('pat_id'),
	    'doc_im' => set_value('doc_im'),
	);
    $data['patients'] = $this->Patient_model->get_all();
    $data['docteurs'] = $this->Docteur_model->get_all();
    $this->load->view( 'com/header');
    $this->load->view( 'com/menu', $this->_DATA);
        $this->load->view('certificatmedical/quitt_certificatmedical_form', $data);
        $this->load->view('com/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'cm_designation' => $this->input->post('cm_designation',TRUE),
		'cm_somme' => $this->input->post('cm_somme',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
		'doc_im' => $this->input->post('doc_im',TRUE),
	    );

            $this->Certificatmedical_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('certificatmedical'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Certificatmedical_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('certificatmedical/update_action'),
		'cm_id' => set_value('cm_id', $row->cm_id),
		'cm_designation' => set_value('cm_designation', $row->cm_designation),
		'cm_somme' => set_value('cm_somme', $row->cm_somme),
		'pat_id' => set_value('pat_id', $row->pat_id),
		'doc_im' => set_value('doc_im', $row->doc_im),
	    );
             
            $data['patients'] = $this->Patient_model->get_all();
            $data['docteurs'] = $this->Docteur_model->get_all();   
            $this->load->view( 'com/header');
            $this->load->view( 'com/menu', $this->_DATA);
            $this->load->view('certificatmedical/quitt_certificatmedical_form', $data);
            $this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('certificatmedical'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('cm_id', TRUE));
        } else {
            $data = array(
		'cm_designation' => $this->input->post('cm_designation',TRUE),
		'cm_somme' => $this->input->post('cm_somme',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
		'doc_im' => $this->input->post('doc_im',TRUE),
	    );

            $this->Certificatmedical_model->update($this->input->post('cm_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('certificatmedical'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Certificatmedical_model->get_by_id($id);

        if ($row) {
            $this->Certificatmedical_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('certificatmedical'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('certificatmedical'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('cm_designation', 'cm designation', 'trim|required');
	$this->form_validation->set_rules('cm_somme', 'cm somme', 'trim|required');
	$this->form_validation->set_rules('pat_id', 'pat id', 'trim|required');
	$this->form_validation->set_rules('doc_im', 'doc im', 'trim|required');

	$this->form_validation->set_rules('cm_id', 'cm_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=quitt_certificatmedical.doc");

        $data = array(
            'quitt_certificatmedical_data' => $this->Certificatmedical_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('certificatmedical/quitt_certificatmedical_doc',$data);
    }

}