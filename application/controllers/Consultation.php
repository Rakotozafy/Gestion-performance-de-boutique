<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultation extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 3;
        $this->load->model('Consultation_model');
        $this->load->model('Patient_model');
        $this->load->model('Docteur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'consultation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'consultation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'consultation/index.html';
            $config['first_url'] = base_url() . 'consultation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Consultation_model->total_rows($q);
        $consultation = $this->Consultation_model->getConsultationJoinPatAndMed();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'consultation_data' => $consultation,
        );
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 2 || $this->session->userdata("type") == 1|| $this->session->userdata("type") == 3){
            $this->load->view('consultation/quitt_consultation_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
		$this->load->view('com/footer');
    }

    public function read($id) 
    {
        $row = $this->Consultation_model->get_by_id($id);
        if ($row) {
            $data = array(
		'cons_id' => $row->cons_id,
		'cons_numero' => $row->cons_numero,
		'cons_dateConsultation' => $row->cons_dateConsultation,
		'cons_cout' => $row->cons_cout,
		'con_validation' => $row->con_validation,
		'pat_id' => $row->pat_id,
		'doc_im' => $row->doc_im,
	    );
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        
            $this->load->view('consultation/quitt_consultation_read', $data);
            		$this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('consultation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('consultation/create_action'),
	    'cons_id' => set_value('cons_id'),
	    'cons_numero' => set_value('cons_numero'),
	    'cons_dateConsultation' => set_value('cons_dateConsultation'),
	    'cons_cout' => set_value('cons_cout'),
	    'con_validation' => set_value('con_validation'),
	    'pat_id' => set_value('pat_id'),
	    'doc_im' => set_value('doc_im'),
	);
    
    $data['patients'] = $this->Patient_model->get_all();
    $data['docteurs'] = $this->Docteur_model->get_all();
    $this->load->view( 'com/header');
    $this->load->view( 'com/menu', $this->_DATA);
        $this->load->view('consultation/quitt_consultation_form', $data);
    $this->load->view( 'com/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'cons_numero' => $this->input->post('cons_numero',TRUE),
		'cons_dateConsultation' => $this->input->post('cons_dateConsultation',TRUE),
		'cons_cout' => $this->input->post('cons_cout',TRUE),
		'con_validation' => $this->input->post('con_validation',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
		'doc_im' => $this->input->post('doc_im',TRUE),
	    );
            $this->Consultation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('consultation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Consultation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('consultation/update_action'),
		'cons_id' => set_value('cons_id', $row->cons_id),
		'cons_numero' => set_value('cons_numero', $row->cons_numero),
		'cons_dateConsultation' => set_value('cons_dateConsultation', $row->cons_dateConsultation),
		'cons_cout' => set_value('cons_cout', $row->cons_cout),
		'con_validation' => set_value('con_validation', $row->con_validation),
		'pat_id' => set_value('pat_id', $row->pat_id),
		'doc_im' => set_value('doc_im', $row->doc_im),
	    );
        $data['patients'] = $this->Patient_model->get_all();
        $data['docteurs'] = $this->Docteur_model->get_all();
        $this->load->view( 'com/header');
        $this->load->view( 'com/menu', $this->_DATA);
            
            $this->load->view('consultation/quitt_consultation_form', $data);
            
        $this->load->view( 'com/footer');    
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('consultation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('cons_id', TRUE));
        } else {
            $data = array(
		'cons_numero' => $this->input->post('cons_numero',TRUE),
		'cons_dateConsultation' => $this->input->post('cons_dateConsultation',TRUE),
		'cons_cout' => $this->input->post('cons_cout',TRUE),
		'con_validation' => $this->input->post('con_validation',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
		'doc_im' => $this->input->post('doc_im',TRUE),
	    );

            $this->Consultation_model->update($this->input->post('cons_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('consultation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Consultation_model->get_by_id($id);

        if ($row) {
            $this->Consultation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('consultation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('consultation'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('cons_numero', 'cons numero', 'trim|required');
	$this->form_validation->set_rules('cons_dateConsultation', 'cons dateconsultation', 'trim|required');
	$this->form_validation->set_rules('cons_cout', 'cons cout', 'trim|required');
	$this->form_validation->set_rules('doc_im', 'doc im', 'trim|required');

	$this->form_validation->set_rules('cons_id', 'cons_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "quitt_consultation.xls";
        $judul = "quitt_consultation";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Cons Numero");
	xlsWriteLabel($tablehead, $kolomhead++, "Cons DateConsultation");
	xlsWriteLabel($tablehead, $kolomhead++, "Cons Cout");
	xlsWriteLabel($tablehead, $kolomhead++, "Con Validation");
	xlsWriteLabel($tablehead, $kolomhead++, "Pat Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Doc Im");

	foreach ($this->Consultation_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cons_numero);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cons_dateConsultation);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cons_cout);
	    xlsWriteNumber($tablebody, $kolombody++, $data->con_validation);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pat_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->doc_im);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
      public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Liste consultation.doc");

        $data = array(
            'consultation_data' => $this->Consultation_model->get_all_x(),
            'start' => 0
        );
        
        $this->load->view('consultation/quitt_consultation_doc',$data);
    }

}
