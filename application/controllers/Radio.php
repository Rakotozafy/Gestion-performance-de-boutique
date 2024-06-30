<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Radio extends CI_Controller
{
    protected $_DATA = [];
    function __construct()
    {
        parent::__construct();
        $this->_DATA['module'] = 10;
        $this->load->model('Radio_model');
        $this->load->model('Patient_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));

        if ($q != '') {
            $config['base_url'] =
                base_url() . 'radio/index.html?q=' . urlencode($q);
            $config['first_url'] =
                base_url() . 'radio/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'radio/index.html';
            $config['first_url'] = base_url() . 'radio/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Radio_model->total_rows($q);
        $radio = $this->Radio_model->get_radioJoinPatient();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = [
            'radio_data' => $radio,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        ];
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if($this->session->userdata("type") == 3 || $this->session->userdata("type") == 1){
            $this->load->view('radio/quitt_radio_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function read($id)
    {
        $row = $this->Radio_model->get_by_id($id);
        if ($row) {
            $data = [
                'rd_id' => $row->rd_id,
                'rd_denomination' => $row->rd_denomination,
                'rd_somme' => $row->rd_somme,
                'pat_id' => $row->pat_id,
            ];
            $this->load->view('radio/quitt_radio_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('radio'));
        }
    }

    public function create()
    {
        $data = [
            'button' => 'Create',
            'action' => site_url('radio/create_action'),
            'rd_id' => set_value('rd_id'),
            'rd_denomination' => set_value('rd_denomination'),
            'rd_somme' => set_value('rd_somme'),
            'pat_id' => set_value('pat_id'),
        ];
        // $data['patients'] = $this->Patient_model->get_all();
        $data['patients'] = $this->Patient_model->getPatientConsultation();
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        $this->load->view('radio/quitt_radio_form', $data);
        $this->load->view('com/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'rd_denomination' => $this->input->post(
                    'rd_denomination',
                    true
                ),
                'rd_somme' => $this->input->post('rd_somme', true),
                'pat_id' => $this->input->post('pat_id', true),
            ];

            $this->Radio_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('radio'));
        }
    }

    public function update($id)
    {
        $row = $this->Radio_model->get_by_id($id);

        if ($row) {
            $data = [
                'button' => 'Update',
                'action' => site_url('radio/update_action'),
                'rd_id' => set_value('rd_id', $row->rd_id),
                'rd_denomination' => set_value(
                    'rd_denomination',
                    $row->rd_denomination
                ),
                'rd_somme' => set_value('rd_somme', $row->rd_somme),
                'pat_id' => set_value('pat_id', $row->pat_id),
            ];
            
        $data['patients'] = $this->Patient_model->getPatientConsultation();
                // $data['patients'] = $this->Patient_model->get_all();
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        $this->load->view('radio/quitt_radio_form', $data);
        $this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('radio'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('rd_id', true));
        } else {
            $data = [
                'rd_denomination' => $this->input->post(
                    'rd_denomination',
                    true
                ),
                'rd_somme' => $this->input->post('rd_somme', true),
                'pat_id' => $this->input->post('pat_id', true),
            ];

            $this->Radio_model->update(
                $this->input->post('rd_id', true),
                $data
            );
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('radio'));
        }
    }

    public function delete($id)
    {
        $row = $this->Radio_model->get_by_id($id);

        if ($row) {
            $this->Radio_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('radio'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('radio'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'rd_denomination',
            'rd denomination',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'rd_somme',
            'rd somme',
            'trim|required'
        );
        $this->form_validation->set_rules('pat_id', 'pat id', 'trim|required');

        $this->form_validation->set_rules('rd_id', 'rd_id', 'trim');
        $this->form_validation->set_error_delimiters(
            '<span class="text-danger">',
            '</span>'
        );
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = 'quitt_radio.xls';
        $judul = 'quitt_radio';
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0,pre-check=0');
        header('Content-Type: application/force-download');
        header('Content-Type: application/octet-stream');
        header('Content-Type: application/download');
        header('Content-Disposition: attachment;filename=' . $namaFile . '');
        header('Content-Transfer-Encoding: binary ');

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, 'No');
        xlsWriteLabel($tablehead, $kolomhead++, 'Rd Denomination');
        xlsWriteLabel($tablehead, $kolomhead++, 'Rd Somme');
        xlsWriteLabel($tablehead, $kolomhead++, 'Pat Id');

        foreach ($this->Radio_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->rd_denomination);
            xlsWriteLabel($tablebody, $kolombody++, $data->rd_somme);
            xlsWriteNumber($tablebody, $kolombody++, $data->pat_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}
