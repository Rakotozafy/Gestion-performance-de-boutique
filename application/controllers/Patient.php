<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 2;
        $this->load->model('Patient_model');
        $this->load->model('Typedepatient_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'patient/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'patient/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'patient/index.html';
            $config['first_url'] = base_url() . 'patient/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Patient_model->total_rows($q);
        $patient = $this->Patient_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'patient_data' => $patient,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if($this->session->userdata("type") == 2 || $this->session->userdata("type") == 1){
            $this->load->view('patient/patient_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function read($id)
    {
        $row = $this->Patient_model->get_by_id($id);
        if ($row) {
            $data = array(
                'pat_id' => $row->pat_id,
                'pat_nom' => $row->pat_nom,
                'pat_prenom' => $row->pat_prenom,
                'pat_dateNaissance' => $row->pat_dateNaissance,
                'pat_sexe' => $row->pat_sexe,
                'pat_commune' => $row->pat_commune,
                'pat_addresse' => $row->pat_addresse,
                'pat_profession' => $row->pat_profession,
                'tp_id' => $row->tp_id,
                'pat_status' => $row->pat_status,
            );
            $this->load->view('patient/patient_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patient'));
        }
    }

    public function create()
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('patient/create_action'),
            'pat_id' => set_value('pat_id'),
            'pat_nom' => set_value('pat_nom'),
            'pat_prenom' => set_value('pat_prenom'),
            'pat_dateNaissance' => set_value('pat_dateNaissance'),
            'pat_sexe' => set_value('pat_sexe'),
            'pat_commune' => set_value('pat_commune'),
            'pat_addresse' => set_value('pat_addresse'),
            'pat_profession' => set_value('pat_profession'),
            'tp_id' => set_value('tp_id'),
            'pat_status' => set_value('pat_status'),
        );
        $data['typedepatients'] = $this->Typedepatient_model->get_all();
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if($this->session->userdata("type") == 2 || $this->session->userdata("type") == 1){
            $this->load->view('patient/patient_form', $data);
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
                'pat_nom' => $this->input->post('pat_nom', TRUE),
                'pat_prenom' => $this->input->post('pat_prenom', TRUE),
                'pat_dateNaissance' => $this->input->post('pat_dateNaissance', TRUE),
                'pat_sexe' => $this->input->post('pat_sexe', TRUE),
                'pat_commune' => $this->input->post('pat_commune', TRUE),
                'pat_addresse' => $this->input->post('pat_addresse', TRUE),
                'pat_profession' => $this->input->post('pat_profession', TRUE),
                'tp_id' => $this->input->post('tp_id', TRUE),
                'pat_status' => $this->input->post('pat_status', TRUE),
            );
            
            $this->Patient_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('patient'));
        }
    }

    public function update($id)
    {
        $row = $this->Patient_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('patient/update_action'),
                'pat_id' => set_value('pat_id', $row->pat_id),
                'pat_nom' => set_value('pat_nom', $row->pat_nom),
                'pat_prenom' => set_value('pat_prenom', $row->pat_prenom),
                'pat_dateNaissance' => set_value('pat_dateNaissance', $row->pat_dateNaissance),
                'pat_sexe' => set_value('pat_sexe', $row->pat_sexe),
                'pat_commune' => set_value('pat_commune', $row->pat_commune),
                'pat_addresse' => set_value('pat_addresse', $row->pat_addresse),
                'pat_profession' => set_value('pat_profession', $row->pat_profession),
                'tp_id' => set_value('tp_id', $row->tp_id),
                'pat_status' => set_value('pat_status', $row->pat_status),
            );
            $data['typedepatients'] = $this->Typedepatient_model->get_all();
            $this->load->view('com/header');
            $this->load->view('com/menu', $this->_DATA);
            if($this->session->userdata("type") == 2 || $this->session->userdata("type") == 1){
                $this->load->view('patient/patient_form', $data);
            }else{
                $this->load->view('accesrefuse/accesrefuse');
            }
            $this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patient'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pat_id', TRUE));
        } else {
            $data = array(
                'pat_nom' => $this->input->post('pat_nom', TRUE),
                'pat_prenom' => $this->input->post('pat_prenom', TRUE),
                'pat_dateNaissance' => $this->input->post('pat_dateNaissance', TRUE),
                'pat_sexe' => $this->input->post('pat_sexe', TRUE),
                'pat_commune' => $this->input->post('pat_commune', TRUE),
                'pat_addresse' => $this->input->post('pat_addresse', TRUE),
                'pat_profession' => $this->input->post('pat_profession', TRUE),
                'tp_id' => $this->input->post('tp_id', TRUE),
                'pat_status' => $this->input->post('pat_status', TRUE),
            );

            $this->Patient_model->update($this->input->post('pat_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('patient'));
        }
    }

    public function delete($id)
    {
        $row = $this->Patient_model->get_by_id($id);

        if ($row) {
            $this->Patient_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('patient'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patient'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('pat_nom', 'pat nom', 'trim|required');
        $this->form_validation->set_rules('pat_prenom', 'pat prenom', 'trim|required');
        $this->form_validation->set_rules('pat_dateNaissance', 'pat datenaissance', 'trim|required');
        $this->form_validation->set_rules('pat_sexe', 'pat sexe', 'trim|required');
        $this->form_validation->set_rules('pat_commune', 'pat commune', 'trim|required');
        $this->form_validation->set_rules('pat_addresse', 'pat addresse', 'trim|required');
        $this->form_validation->set_rules('pat_profession', 'pat profession', 'trim|required');
        $this->form_validation->set_rules('tp_id', 'tp id', 'trim|required');
        $this->form_validation->set_rules('pat_status', 'pat status', 'trim|required');

        $this->form_validation->set_rules('pat_id', 'pat_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
