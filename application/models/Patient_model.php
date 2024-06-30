<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient_model extends CI_Model
{

    public $table = 'patient';
    public $id = 'pat_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('pat_id', $q);
	$this->db->or_like('pat_nom', $q);
	$this->db->or_like('pat_prenom', $q);
	$this->db->or_like('pat_dateNaissance', $q);
	$this->db->or_like('pat_sexe', $q);
	$this->db->or_like('pat_commune', $q);
	$this->db->or_like('pat_addresse', $q);
	$this->db->or_like('pat_profession', $q);
	$this->db->or_like('tp_id', $q);
	$this->db->or_like('pat_status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('pat_id', $q);
	$this->db->or_like('pat_nom', $q);
	$this->db->or_like('pat_prenom', $q);
	$this->db->or_like('pat_dateNaissance', $q);
	$this->db->or_like('pat_sexe', $q);
	$this->db->or_like('pat_commune', $q);
	$this->db->or_like('pat_addresse', $q);
	$this->db->or_like('pat_profession', $q);
	$this->db->or_like('tp_id', $q);
	$this->db->or_like('pat_status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    public function getPatientConsultation()
    {
        return $this->db->select("*")
        ->from("quitt_consultation")
        ->join(" patient ", " patient.pat_id = quitt_consultation.pat_id ")
        ->distinct()
        ->get()
        ->result();
    }
}
