<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Echographie extends CI_Controller
{
    protected $_DATA = [];
    function __construct()
    {
        parent::__construct();
        $this->_DATA['module'] = 8;
        $this->load->model('Echographie_model');
        $this->load->model('Patient_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));

        if ($q != '') {
            $config['base_url'] =
                base_url() . 'echographie/index.html?q=' . urlencode($q);
            $config['first_url'] =
                base_url() . 'echographie/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'echographie/index.html';
            $config['first_url'] = base_url() . 'echographie/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Echographie_model->total_rows($q);
        $echographie = $this->Echographie_model->getEchoJOinPAtien();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = [
            'echographie_data' => $echographie,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        ];
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if($this->session->userdata("type") == 3 || $this->session->userdata("type") == 1){
            $this->load->view('echographie/quitt_echographie_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function read($id)
    {
        $row = $this->Echographie_model->get_by_id($id);
        if ($row) {
            $data = [
                'echo_id' => $row->echo_id,
                'echo_designation' => $row->echo_designation,
                'echo_somme' => $row->echo_somme,
                'pat_id' => $row->pat_id,
            ];
            $this->load->view('echographie/quitt_echographie_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('echographie'));
        }
    }

    public function create()
    {
        $data = [
            'button' => 'Create',
            'action' => site_url('echographie/create_action'),
            'echo_id' => set_value('echo_id'),
            'echo_designation' => set_value('echo_designation'),
            'echo_somme' => set_value('echo_somme'),
            'pat_id' => set_value('pat_id'),
        ];
        // $data['patients'] = $this->Patient_model->get_all();
        $data['patients'] = $this->Patient_model->getPatientConsultation();
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        $this->load->view('echographie/quitt_echographie_form', $data);
        $this->load->view('com/footer');

        // $this->load->view('echographie/quitt_echographie_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'echo_designation' => $this->input->post(
                    'echo_designation',
                    true
                ),
                'echo_somme' => $this->input->post('echo_somme', true),
                'pat_id' => $this->input->post('pat_id', true),
            ];

            $this->Echographie_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('echographie'));
        }
    }

    public function update($id)
    {
        $row = $this->Echographie_model->get_by_id($id);

        if ($row) {
            $data = [
                'button' => 'Update',
                'action' => site_url('echographie/update_action'),
                'echo_id' => set_value('echo_id', $row->echo_id),
                'echo_designation' => set_value(
                    'echo_designation',
                    $row->echo_designation
                ),
                'echo_somme' => set_value('echo_somme', $row->echo_somme),
                'pat_id' => set_value('pat_id', $row->pat_id),
            ];
            // $data['patients'] = $this->Patient_model->get_all();
            $data['patients'] = $this->Patient_model->getPatientConsultation();
            $this->load->view('com/header');
            $this->load->view('com/menu', $this->_DATA);
            $this->load->view('echographie/quitt_echographie_form', $data);
            $this->load->view('com/footer');

            // $this->load->view('echographie/quitt_echographie_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('echographie'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('echo_id', true));
        } else {
            $data = [
                'echo_designation' => $this->input->post(
                    'echo_designation',
                    true
                ),
                'echo_somme' => $this->input->post('echo_somme', true),
                'pat_id' => $this->input->post('pat_id', true),
            ];

            $this->Echographie_model->update(
                $this->input->post('echo_id', true),
                $data
            );
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('echographie'));
        }
    }

    public function delete($id)
    {
        $row = $this->Echographie_model->get_by_id($id);

        if ($row) {
            $this->Echographie_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('echographie'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('echographie'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'echo_designation',
            'echo designation',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'echo_somme',
            'echo somme',
            'trim|required'
        );
        $this->form_validation->set_rules('pat_id', 'pat id', 'trim|required');

        $this->form_validation->set_rules('echo_id', 'echo_id', 'trim');
        $this->form_validation->set_error_delimiters(
            '<span class="text-danger">',
            '</span>'
        );
    }
}

/* End of file Echographie.php */
/* Location: ./application/controllers/Echographie.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-23 20:58:43 */
/* http://harviacode.com */
