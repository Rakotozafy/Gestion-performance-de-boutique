<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbd_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getNbDocteur()
    {
        $sql = "SELECT COUNT('doc_im')AS nbdocteur FROM docteur";
        $res = $this->db->query($sql)->row();
        return $res->nbdocteur;
    }
    public function getNbPatient()
    {   
        $sql = "SELECT COUNT('pat_id')AS nbpatient FROM patient";
        $res = $this->db->query($sql)->row();
        return $res->nbpatient;
    }
    public function getNbUtilisateur()
    {        
        $sql = "SELECT COUNT('util_id')AS nbutilisateur FROM utilisateur";
        $res = $this->db->query($sql)->row();
        return $res->nbutilisateur;
    }
    public function getRecetteAnalyse()
    {
        $sql = "SELECT SUM(quitt_analyse.al_somme) as recette FROM `quitt_analyse`";
        $res = $this->db->query($sql)->row();
        return $res->recette;
    }
    public function getRecetteBanqueDeSang()
    {
        $sql = "SELECT SUM(quitt_banquedesang.bds_somme) as recette FROM `quitt_banquedesang`";
        $res = $this->db->query($sql)->row();
        return $res->recette;
    }
    public function getRecetteEchographie()
    {
        $sql = "SELECT SUM(quitt_echographie.echo_somme) as recette FROM `quitt_echographie`";
        $res = $this->db->query($sql)->row();
        return $res->recette;
    }
    public function getRecetteRadio()
    {
        $sql = "SELECT SUM(quitt_radio.rd_somme) as recette FROM `quitt_radio`";
        $res = $this->db->query($sql)->row();
        return $res->recette;
    }
    
}