<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Radio_model extends CI_Model
{

    public $table = 'quitt_radio';
    public $id = 'rd_id';
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
        $this->db->like('rd_id', $q);
	$this->db->or_like('rd_denomination', $q);
	$this->db->or_like('rd_somme', $q);
	$this->db->or_like('pat_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('rd_id', $q);
	$this->db->or_like('rd_denomination', $q);
	$this->db->or_like('rd_somme', $q);
	$this->db->or_like('pat_id', $q);
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

    public function get_radioJoinPatient()
    {
        return $this->db->select("*")
        ->from("quitt_radio")
        ->join(" patient ", " patient.pat_id = quitt_radio.pat_id ")
        ->distinct()
        ->get()
        ->result();
    }
}
