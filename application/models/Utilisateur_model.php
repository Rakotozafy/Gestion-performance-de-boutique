<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilisateur_model extends CI_Model
{

    public $table = 'utilisateur';
    public $id = 'util_id';
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
        $this->db->like('util_id', $q);
	$this->db->or_like('util_nom', $q);
	$this->db->or_like('util_prenom', $q);
	$this->db->or_like('util_mail', $q);
	$this->db->or_like('util_login', $q);
	$this->db->or_like('util_mdp', $q);
	$this->db->or_like('util_photo', $q);
	$this->db->or_like('type', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('util_id', $q);
	$this->db->or_like('util_nom', $q);
	$this->db->or_like('util_prenom', $q);
	$this->db->or_like('util_mail', $q);
	$this->db->or_like('util_login', $q);
	$this->db->or_like('util_mdp', $q);
	$this->db->or_like('util_photo', $q);
	$this->db->or_like('type', $q);
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

    public function get_utilisateurJoinType()
    {        
        return $this->db->select("*")
        ->from("utilisateur")
        ->join(" typeutilisateur ", "typeutilisateur.tutil_id = utilisateur.type ")
        ->distinct()
        ->get()
        ->result();
    }
}
