<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banquedesang_model extends CI_Model
{

    public $table = 'quitt_banquedesang';
    public $id = 'bds_id';
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
        $this->db->like('bds_id', $q);
	$this->db->or_like('bds_desciption', $q);
	$this->db->or_like('bds_somme', $q);
	$this->db->or_like('pat_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('bds_id', $q);
	$this->db->or_like('bds_desciption', $q);
	$this->db->or_like('bds_somme', $q);
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

    public function getBanquedeSangJoinPatient()
    {       
        return $this->db->select("*")
        ->from("quitt_banquedesang")
        ->join(" patient ", " patient.pat_id = quitt_banquedesang.pat_id ")
        ->distinct()
        ->get()
        ->result();
    }
}