<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analysegamme extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Analysegamme_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'analysegamme/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'analysegamme/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'analysegamme/index.html';
            $config['first_url'] = base_url() . 'analysegamme/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Analysegamme_model->total_rows($q);
        $analysegamme = $this->Analysegamme_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'analysegamme_data' => $analysegamme,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('analysegamme/analysegamme_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Analysegamme_model->get_by_id($id);
        if ($row) {
            $data = array(
		'alG_id' => $row->alG_id,
		'alG_nom' => $row->alG_nom,
		'alG_description' => $row->alG_description,
	    );
            $this->load->view('analysegamme/analysegamme_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analysegamme'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('analysegamme/create_action'),
	    'alG_id' => set_value('alG_id'),
	    'alG_nom' => set_value('alG_nom'),
	    'alG_description' => set_value('alG_description'),
	);
        $this->load->view('analysegamme/analysegamme_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'alG_nom' => $this->input->post('alG_nom',TRUE),
		'alG_description' => $this->input->post('alG_description',TRUE),
	    );

            $this->Analysegamme_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('analysegamme'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Analysegamme_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('analysegamme/update_action'),
		'alG_id' => set_value('alG_id', $row->alG_id),
		'alG_nom' => set_value('alG_nom', $row->alG_nom),
		'alG_description' => set_value('alG_description', $row->alG_description),
	    );
            $this->load->view('analysegamme/analysegamme_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analysegamme'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('alG_id', TRUE));
        } else {
            $data = array(
		'alG_nom' => $this->input->post('alG_nom',TRUE),
		'alG_description' => $this->input->post('alG_description',TRUE),
	    );

            $this->Analysegamme_model->update($this->input->post('alG_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('analysegamme'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Analysegamme_model->get_by_id($id);

        if ($row) {
            $this->Analysegamme_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('analysegamme'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('analysegamme'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('alG_nom', 'alg nom', 'trim|required');
	$this->form_validation->set_rules('alG_description', 'alg description', 'trim|required');

	$this->form_validation->set_rules('alG_id', 'alG_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Analysegamme.php */
/* Location: ./application/controllers/Analysegamme.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-30 21:48:32 */
/* http://harviacode.com */