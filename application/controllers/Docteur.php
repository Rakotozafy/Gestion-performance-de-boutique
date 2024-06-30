<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Docteur extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 1;
        $this->load->model('Docteur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'docteur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'docteur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'docteur/index.html';
            $config['first_url'] = base_url() . 'docteur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Docteur_model->total_rows($q);
        $docteur = $this->Docteur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'docteur_data' => $docteur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 4 || $this->session->userdata("type") == 1){
            $this->load->view('docteur/docteur_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
		$this->load->view('com/footer');
    }

    public function read($id) 
    {
        $row = $this->Docteur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'doc_im' => $row->doc_im,
		'doc_nom' => $row->doc_nom,
		'doc_prenom' => $row->doc_prenom,
		'doc_service' => $row->doc_service,
		'doc_type' => $row->doc_type,
	    );
            $this->load->view('docteur/docteur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('docteur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('docteur/create_action'),
	    'doc_im' => set_value('doc_im'),
	    'doc_nom' => set_value('doc_nom'),
	    'doc_prenom' => set_value('doc_prenom'),
	    'doc_service' => set_value('doc_service'),
	    'doc_type' => set_value('doc_type'),
	);
        $this->load->view( 'com/header');
        $this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 4 || $this->session->userdata("type") == 1){       
        $this->load->view('docteur/docteur_form', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
		$this->load->view('com/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'doc_im' => $this->input->post('doc_im',TRUE),
		'doc_nom' => $this->input->post('doc_nom',TRUE),
		'doc_prenom' => $this->input->post('doc_prenom',TRUE),
		'doc_service' => $this->input->post('doc_service',TRUE),
		'doc_type' => $this->input->post('doc_type',TRUE),
	    );

            $this->Docteur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('docteur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Docteur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('docteur/update_action'),
		'doc_im' => set_value('doc_im', $row->doc_im),
		'doc_nom' => set_value('doc_nom', $row->doc_nom),
		'doc_prenom' => set_value('doc_prenom', $row->doc_prenom),
		'doc_service' => set_value('doc_service', $row->doc_service),
		'doc_type' => set_value('doc_type', $row->doc_type),
	    );
        $this->load->view( 'com/header');
        $this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 4 || $this->session->userdata("type") == 1){
            $this->load->view('docteur/docteur_form', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
		$this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('docteur'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('doc_im', TRUE));
        } else {
            $data = array(
		'doc_nom' => $this->input->post('doc_nom',TRUE),
		'doc_prenom' => $this->input->post('doc_prenom',TRUE),
		'doc_service' => $this->input->post('doc_service',TRUE),
		'doc_type' => $this->input->post('doc_type',TRUE),
	    );

            $this->Docteur_model->update($this->input->post('doc_im', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('docteur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Docteur_model->get_by_id($id);

        if ($row) {
            $this->Docteur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('docteur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('docteur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('doc_nom', 'doc nom', 'trim|required');
	$this->form_validation->set_rules('doc_prenom', 'doc prenom', 'trim|required');
	$this->form_validation->set_rules('doc_service', 'doc service', 'trim|required');
	$this->form_validation->set_rules('doc_type', 'doc type', 'trim|required');

	$this->form_validation->set_rules('doc_im', 'doc_im', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
