<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reg_radio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reg_radio_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'reg_radio/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'reg_radio/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'reg_radio/index.html';
            $config['first_url'] = base_url() . 'reg_radio/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Reg_radio_model->total_rows($q);
        $reg_radio = $this->Reg_radio_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'reg_radio_data' => $reg_radio,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('reg_radio/reg_radio_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Reg_radio_model->get_by_id($id);
        if ($row) {
            $data = array(
		'rgRd_id' => $row->rgRd_id,
		'rgRd_date' => $row->rgRd_date,
		'rgRd_nomPatient' => $row->rgRd_nomPatient,
		'rgRd_numQuittance' => $row->rgRd_numQuittance,
		'rgRd_status' => $row->rgRd_status,
	    );
            $this->load->view('reg_radio/reg_radio_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reg_radio'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('reg_radio/create_action'),
	    'rgRd_id' => set_value('rgRd_id'),
	    'rgRd_date' => set_value('rgRd_date'),
	    'rgRd_nomPatient' => set_value('rgRd_nomPatient'),
	    'rgRd_numQuittance' => set_value('rgRd_numQuittance'),
	    'rgRd_status' => set_value('rgRd_status'),
	);
        $this->load->view('reg_radio/reg_radio_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'rgRd_date' => $this->input->post('rgRd_date',TRUE),
		'rgRd_nomPatient' => $this->input->post('rgRd_nomPatient',TRUE),
		'rgRd_numQuittance' => $this->input->post('rgRd_numQuittance',TRUE),
		'rgRd_status' => $this->input->post('rgRd_status',TRUE),
	    );

            $this->Reg_radio_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('reg_radio'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Reg_radio_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('reg_radio/update_action'),
		'rgRd_id' => set_value('rgRd_id', $row->rgRd_id),
		'rgRd_date' => set_value('rgRd_date', $row->rgRd_date),
		'rgRd_nomPatient' => set_value('rgRd_nomPatient', $row->rgRd_nomPatient),
		'rgRd_numQuittance' => set_value('rgRd_numQuittance', $row->rgRd_numQuittance),
		'rgRd_status' => set_value('rgRd_status', $row->rgRd_status),
	    );
            $this->load->view('reg_radio/reg_radio_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reg_radio'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('rgRd_id', TRUE));
        } else {
            $data = array(
		'rgRd_date' => $this->input->post('rgRd_date',TRUE),
		'rgRd_nomPatient' => $this->input->post('rgRd_nomPatient',TRUE),
		'rgRd_numQuittance' => $this->input->post('rgRd_numQuittance',TRUE),
		'rgRd_status' => $this->input->post('rgRd_status',TRUE),
	    );

            $this->Reg_radio_model->update($this->input->post('rgRd_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('reg_radio'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Reg_radio_model->get_by_id($id);

        if ($row) {
            $this->Reg_radio_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('reg_radio'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reg_radio'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('rgRd_date', 'rgrd date', 'trim|required');
	$this->form_validation->set_rules('rgRd_nomPatient', 'rgrd nompatient', 'trim|required');
	$this->form_validation->set_rules('rgRd_numQuittance', 'rgrd numquittance', 'trim|required');
	$this->form_validation->set_rules('rgRd_status', 'rgrd status', 'trim|required');

	$this->form_validation->set_rules('rgRd_id', 'rgRd_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Reg_radio.php */
/* Location: ./application/controllers/Reg_radio.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-22 09:43:26 */
/* http://harviacode.com */