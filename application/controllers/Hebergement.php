<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hebergement extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 5;
        $this->load->model('Hebergement_model');
        $this->load->library('form_validation');
        $this->load->model('Patient_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hebergement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hebergement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hebergement/index.html';
            $config['first_url'] = base_url() . 'hebergement/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Hebergement_model->total_rows($q);
        $hebergement = $this->Hebergement_model->getHebergementJoinPatient();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'hebergement_data' => $hebergement,
        );
        $this->load->view( 'com/header');
		$this->load->view( 'com/menu', $this->_DATA);
        if($this->session->userdata("type") == 3 || $this->session->userdata("type") == 1){
            $this->load->view('hebergement/quitt_hebergement_list', $data);
        }else{
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function read($id) 
    {
        $row = $this->Hebergement_model->get_by_id($id);
        if ($row) {
            $data = array(
		'hb_id' => $row->hb_id,
		'hb_numero' => $row->hb_numero,
		'hb_service' => $row->hb_service,
		'hb_dateEntre' => $row->hb_dateEntre,
		'hb_dateSortie' => $row->hb_dateSortie,
		'hb_categorie' => $row->hb_categorie,
		'hb_prix' => $row->hb_prix,
		'hb_somme' => $row->hb_somme,
		'pat_id' => $row->pat_id,
	    );
            $this->load->view('hebergement/quitt_hebergement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hebergement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hebergement/create_action'),
	    'hb_id' => set_value('hb_id'),
	    'hb_numero' => set_value('hb_numero'),
	    'hb_service' => set_value('hb_service'),
	    'hb_dateEntre' => set_value('hb_dateEntre'),
	    'hb_dateSortie' => set_value('hb_dateSortie'),
	    'hb_categorie' => set_value('hb_categorie'),
	    'hb_prix' => set_value('hb_prix'),
	    'hb_somme' => set_value('hb_somme'),
	    'pat_id' => set_value('pat_id'),
	);
    // $data['patients'] = $this->Patient_model->get_all();
    $data['patients'] = $this->Patient_model->getPatientConsultation();
        $this->load->view( 'com/header');
        $this->load->view( 'com/menu', $this->_DATA);
        $this->load->view('hebergement/quitt_hebergement_form', $data);
        $this->load->view('com/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'hb_numero' => $this->input->post('hb_numero',TRUE),
		'hb_service' => $this->input->post('hb_service',TRUE),
		'hb_dateEntre' => $this->input->post('hb_dateEntre',TRUE),
		'hb_dateSortie' => $this->input->post('hb_dateSortie',TRUE),
		'hb_categorie' => $this->input->post('hb_categorie',TRUE),
		'hb_prix' => $this->input->post('hb_prix',TRUE),
		'hb_somme' => $this->input->post('hb_somme',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
	    );

            $this->Hebergement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hebergement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hebergement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hebergement/update_action'),
		'hb_id' => set_value('hb_id', $row->hb_id),
		'hb_numero' => set_value('hb_numero', $row->hb_numero),
		'hb_service' => set_value('hb_service', $row->hb_service),
		'hb_dateEntre' => set_value('hb_dateEntre', $row->hb_dateEntre),
		'hb_dateSortie' => set_value('hb_dateSortie', $row->hb_dateSortie),
		'hb_categorie' => set_value('hb_categorie', $row->hb_categorie),
		'hb_prix' => set_value('hb_prix', $row->hb_prix),
		'hb_somme' => set_value('hb_somme', $row->hb_somme),
		'pat_id' => set_value('pat_id', $row->pat_id),
	    );
        
            $data['patients'] = $this->Patient_model->get_all();
            $this->load->view( 'com/header');
            $this->load->view( 'com/menu', $this->_DATA);
            $this->load->view('hebergement/quitt_hebergement_form', $data);
            $this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hebergement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('hb_id', TRUE));
        } else {
            $data = array(
		'hb_numero' => $this->input->post('hb_numero',TRUE),
		'hb_service' => $this->input->post('hb_service',TRUE),
		'hb_dateEntre' => $this->input->post('hb_dateEntre',TRUE),
		'hb_dateSortie' => $this->input->post('hb_dateSortie',TRUE),
		'hb_categorie' => $this->input->post('hb_categorie',TRUE),
		'hb_prix' => $this->input->post('hb_prix',TRUE),
		'hb_somme' => $this->input->post('hb_somme',TRUE),
		'pat_id' => $this->input->post('pat_id',TRUE),
	    );

            $this->Hebergement_model->update($this->input->post('hb_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hebergement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hebergement_model->get_by_id($id);

        if ($row) {
            $this->Hebergement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hebergement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hebergement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('hb_numero', 'hb numero', 'trim|required');
	$this->form_validation->set_rules('hb_service', 'hb service', 'trim|required');
	$this->form_validation->set_rules('hb_dateEntre', 'hb dateentre', 'trim|required');
	$this->form_validation->set_rules('hb_dateSortie', 'hb datesortie', 'trim|required');
	$this->form_validation->set_rules('hb_categorie', 'hb categorie', 'trim|required');
	$this->form_validation->set_rules('hb_prix', 'hb prix', 'trim|required');
	$this->form_validation->set_rules('hb_somme', 'hb somme', 'trim|required');
	$this->form_validation->set_rules('pat_id', 'pat id', 'trim|required');

	$this->form_validation->set_rules('hb_id', 'hb_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "quitt_hebergement.xls";
        $judul = "quitt_hebergement";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Hb Numero");
	xlsWriteLabel($tablehead, $kolomhead++, "Hb Service");
	xlsWriteLabel($tablehead, $kolomhead++, "Hb DateEntre");
	xlsWriteLabel($tablehead, $kolomhead++, "Hb DateSortie");
	xlsWriteLabel($tablehead, $kolomhead++, "Hb Categorie");
	xlsWriteLabel($tablehead, $kolomhead++, "Hb Prix");
	xlsWriteLabel($tablehead, $kolomhead++, "Hb Somme");
	xlsWriteLabel($tablehead, $kolomhead++, "Pat Id");

	foreach ($this->Hebergement_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hb_numero);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hb_service);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hb_dateEntre);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hb_dateSortie);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hb_categorie);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hb_prix);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hb_somme);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pat_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Hebergement.php */
/* Location: ./application/controllers/Hebergement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-23 10:29:58 */
/* http://harviacode.com */