<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service extends CI_Controller
{
    protected $_DATA            = array();
    function __construct()
    {
        parent::__construct();
        $this->load->model('Service_model');
    }
    public function index()
    {
        redirect("Service/login");
    }
    public function login($erno = 0)
    {
        $err_message = "";
        switch ($erno) {
            case 1:
                $err_message = "Indetifiant ou mot de passe incorrect";
                break;
            case 2:
                $err_message = "Session expirée, vous devez vous authentifier";
                break;
            case 3:
                $err_message = "Vous vous êtes deconnecté";
                break;
            case 4:
                $err_message = "Authentification requise, vous devez vous authentifier";
                break;
        }
        $this->load->view("service/login", array("err_message" => $err_message));
    }
    public function identification()
    {
        if ($_POST) {
            $login  = isset($_POST["loginU"])  ? $_POST["loginU"]        : "";
            $passwd = isset($_POST["passwdU"]) ? $_POST["passwdU"]  : "";
            if ($login != "" && $passwd != "") {
                $mdp = sha1($passwd);
                $userAuth = $this->Service_model->get_by_id($login, $mdp);
                if ($userAuth) {
                    $userLog = array(
                        "util_id"          => $userAuth->util_id,
                        "util_nom"         => $userAuth->util_nom,
                        "util_login"       => $userAuth->util_login,
                        "util_mdp"          => $userAuth->util_mdp,
                        "type"              => $userAuth->type
                    );
                    // var_dump($userLog);die;
                    $this->session->set_userdata($userLog);
                    redirect("Tbd");
                } else {
                    redirect("Service/login/1");
                }
            } else {
                redirect("Service/login/1");
            }
        } else {
            redirect("Service/login/4");
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect("service/login");
    }
}
