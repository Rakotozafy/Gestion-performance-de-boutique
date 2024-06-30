<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->_DATA["module"]  = 11;
        $this->load->model('Utilisateur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $utilisateur = $this->Utilisateur_model->get_utilisateurJoinType();
        // var_dump($utilisateur);die;

        $this->load->library('pagination');

        $data = array(
            'utilisateur_data' => $utilisateur
        );
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if ($this->session->userdata("type") == 1) {
            $this->load->view('utilisateur/utilisateur_list', $data);
        } else {
            $this->load->view('accesrefuse/accesrefuse');
        }
        $this->load->view('com/footer');
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('utilisateur/create_action'),
            'util_id' => set_value('util_id'),
            'util_nom' => set_value('util_nom'),
            'util_prenom' => set_value('util_prenom'),
            'util_mail' => set_value('util_mail'),
            'util_login' => set_value('util_login'),
            'util_mdp' => set_value('util_mdp'),
            'util_photo' => set_value('util_photo'),
            'type' => set_value('type'),
        );
        $this->load->view('com/header');
        $this->load->view('com/menu', $this->_DATA);
        if ($this->session->userdata("type") == 1) {
            $this->load->view('utilisateur/utilisateur_form', $data);
        } else {
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
                'util_nom' => $this->input->post('util_nom', TRUE),
                'util_prenom' => $this->input->post('util_prenom', TRUE),
                'util_mail' => $this->input->post('util_mail', TRUE),
                'util_login' => $this->input->post('util_login', TRUE),
                'util_mdp' => sha1($this->input->post('util_mdp', TRUE)),
                'util_photo' => $this->input->post('util_photo', TRUE),
                'type' => $this->input->post('type', TRUE),
            );

            $this->Utilisateur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('utilisateur'));
        }
    }

    public function update($id)
    {
        $row = $this->Utilisateur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('utilisateur/update_action'),
                'util_id' => set_value('util_id', $row->util_id),
                'util_nom' => set_value('util_nom', $row->util_nom),
                'util_prenom' => set_value('util_prenom', $row->util_prenom),
                'util_mail' => set_value('util_mail', $row->util_mail),
                'util_login' => set_value('util_login', $row->util_login),
                'util_mdp' => set_value('util_mdp', $row->util_mdp),
                'type' => set_value('type', $row->type),
            );
            $this->load->view('com/header');
            $this->load->view('com/menu', $this->_DATA);
            if ($this->session->userdata("type") == 1) {
                $this->load->view('utilisateur/utilisateur_form', $data);
            } else {
                $this->load->view('accesrefuse/accesrefuse');
            }
            $this->load->view('com/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('util_id', TRUE));
        } else {
            $data = array(
                'util_nom' => $this->input->post('util_nom', TRUE),
                'util_prenom' => $this->input->post('util_prenom', TRUE),
                'util_mail' => $this->input->post('util_mail', TRUE),
                'util_login' => $this->input->post('util_login', TRUE),
                'util_mdp' => sha1($this->input->post('util_mdp', TRUE)),
                'type' => $this->input->post('type', TRUE),
            );

            $this->Utilisateur_model->update($this->input->post('util_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('utilisateur'));
        }
    }

    public function delete($id)
    {
        $row = $this->Utilisateur_model->get_by_id($id);

        if ($row) {
            $this->Utilisateur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('utilisateur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('util_mail', 'util mail', 'trim|required');
        $this->form_validation->set_rules('util_login', 'util login', 'trim|required');
        $this->form_validation->set_rules('util_mdp', 'util mdp', 'trim|required');
        $this->form_validation->set_rules('type', 'type', 'trim|required');

        $this->form_validation->set_rules('util_id', 'util_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
