<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Docteur_model extends CI_Model
{

    public $table = 'docteur';
    public $id = 'doc_im';
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
        $this->db->like('doc_im', $q);
	$this->db->or_like('doc_nom', $q);
	$this->db->or_like('doc_prenom', $q);
	$this->db->or_like('doc_service', $q);
	$this->db->or_like('doc_type', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('doc_im', $q);
	$this->db->or_like('doc_nom', $q);
	$this->db->or_like('doc_prenom', $q);
	$this->db->or_like('doc_service', $q);
	$this->db->or_like('doc_type', $q);
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

    public function getRecap()
    {
        $sql="SELECT  docteur.doc_nom,docteur.doc_im,docteur.doc_prenom,SUM(cm_somme*60/100)as pourcentage FROM quitt_certificatmedical
        JOIN docteur ON docteur.doc_im = quitt_certificatmedical.doc_im
        GROUP BY docteur.doc_im";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}
