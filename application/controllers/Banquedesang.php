<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Banquedesang extends CI_Controller
{
    protected $_DATA = [];
    function __construct()
    {
        parent::__construct();
        $this->_DATA['module'] = 7;
        $this->load->model('Banquedesang_model');
        $this->load->model('Patient_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));

        if ($q != '') {
            $config['base_url'] =
                base_url() . 'banquedesang/index.html?q=' . urlencode($q);
            $config['first_url'] =
                base_url() . 'banquedesang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'banquedesang/index.html';
            $config['first_url'] = base_url() . 'banquedesang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Banquedesang_model->total_rows($q);
        $banquedesang = $this->Banquedesang_model->getBanquedeSangJoinPatient();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = [
            'banquedesang_data' => $banquedesang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        ];
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if($this->session->userdata("type") == 3 || $this->session->userdata("type") == 1){
            $this->load->view('banquedesang/quitt_banquedesang_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function read($id)
    {
        $row = $this->Banquedesang_model->get_by_id($id);
        if ($row) {
            $data = [
                'bds_id' => $row->bds_id,
                'bds_desciption' => $row->bds_desciption,
                'bds_somme' => $row->bds_somme,
                'pat_id' => $row->pat_id,
            ];
            $this->load->view('banquedesang/quitt_banquedesang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banquedesang'));
        }
    }

    public function create()
    {
        $data = [
            'button' => 'Create',
            'action' => site_url('banquedesang/create_action'),
            'bds_id' => set_value('bds_id'),
            'bds_desciption' => set_value('bds_desciption'),
            'bds_somme' => set_value('bds_somme'),
            'pat_id' => set_value('pat_id'),
        ];
        // $data['patients'] = $this->Patient_model->get_all();  
        $data['patients'] = $this->Patient_model->getPatientConsultation();
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        $this->load->view('banquedesang/quitt_banquedesang_form', $data);
        $this->load->view('com/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'bds_desciption' => $this->input->post('bds_desciption', true),
                'bds_somme' => $this->input->post('bds_somme', true),
                'pat_id' => $this->input->post('pat_id', true),
            ];

            $this->Banquedesang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('banquedesang'));
        }
    }

    public function update($id)
    {
        $row = $this->Banquedesang_model->get_by_id($id);

        if ($row) {
            $data = [
                'button' => 'Update',
                'action' => site_url('banquedesang/update_action'),
                'bds_id' => set_value('bds_id', $row->bds_id),
                'bds_desciption' => set_value(
                    'bds_desciption',
                    $row->bds_desciption
                ),
                'bds_somme' => set_value('bds_somme', $row->bds_somme),
                'pat_id' => set_value('pat_id', $row->pat_id),
            ];
            // $data['patients'] = $this->Patient_model->get_all();
            $data['patients'] = $this->Patient_model->getPatientConsultation();
            
            $this->load->view('com/header');
            $this->load->view('com/menu', $this->_DATA);
            $this->load->view('banquedesang/quitt_banquedesang_form', $data);
            $this->load->view('com/footer');

            $this->load->view('banquedesang/quitt_banquedesang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banquedesang'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('bds_id', true));
        } else {
            $data = [
                'bds_desciption' => $this->input->post('bds_desciption', true),
                'bds_somme' => $this->input->post('bds_somme', true),
                'pat_id' => $this->input->post('pat_id', true),
            ];

            $this->Banquedesang_model->update(
                $this->input->post('bds_id', true),
                $data
            );
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('banquedesang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Banquedesang_model->get_by_id($id);

        if ($row) {
            $this->Banquedesang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('banquedesang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banquedesang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'bds_desciption',
            'bds desciption',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'bds_somme',
            'bds somme',
            'trim|required'
        );
        $this->form_validation->set_rules('pat_id', 'pat id', 'trim|required');

        $this->form_validation->set_rules('bds_id', 'bds_id', 'trim');
        $this->form_validation->set_error_delimiters(
            '<span class="text-danger">',
            '</span>'
        );
    }
}

/* End of file Banquedesang.php */
/* Location: ./application/controllers/Banquedesang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-23 20:32:02 */
/* http://harviacode.com */
