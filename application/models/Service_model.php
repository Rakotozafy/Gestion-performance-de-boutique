<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service_model extends CI_Model
{
    public $table = 'utilisateur';
    public $id = 'util_id';
    public $order = 'DESC';

    function get_by_id($login, $mdp)
    {
        return $this->db->select("*")
        ->from("utilisateur")
        ->where("util_login", $login)
        ->where("util_mdp", $mdp)
        ->distinct()
        ->get()
        ->row();
    }
}