<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultation_model extends CI_Model
{

    public $table = 'quitt_consultation';
    public $id = 'cons_id';
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
        $this->db->like('cons_id', $q);
	$this->db->or_like('cons_numero', $q);
	$this->db->or_like('cons_dateConsultation', $q);
	$this->db->or_like('cons_cout', $q);
	$this->db->or_like('con_validation', $q);
	$this->db->or_like('pat_id', $q);
	$this->db->or_like('doc_im', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('cons_id', $q);
	$this->db->or_like('cons_numero', $q);
	$this->db->or_like('cons_dateConsultation', $q);
	$this->db->or_like('cons_cout', $q);
	$this->db->or_like('con_validation', $q);
	$this->db->or_like('pat_id', $q);
	$this->db->or_like('doc_im', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    public function getConsultationJoinPatAndMed()
    {
                return $this->db->select("*")
                ->from("quitt_consultation")
                ->join(" patient ", " patient.pat_id = quitt_consultation.pat_id ")
                ->join(" docteur ", " docteur.doc_im = quitt_consultation.doc_im ")
                ->distinct()
                ->get()
                ->result();
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
function get_all_x(){
      return $this->db->select("*")
        ->from("quitt_consultation")
        ->join(" patient ", " patient.pat_id = quitt_consultation.pat_id ")
        ->join(" docteur ", " docteur.doc_im = quitt_consultation.doc_im ")
        ->distinct()
        ->get()
        ->result();
}
 // get data by id
    function get_one($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}

/* End of file Consultation_model.php */
/* Location: ./application/models/Consultation_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-23 09:45:06 */
/* http://harviacode.com */