<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

    var $login = FALSE;
    var $userId = '';
    var $fullname = '';

    function __construct() {
        parent::__construct();
    }

    private function checkLogin() {
        if ($this->session->userdata('gpworx_logged_in')) {
            $this->login = TRUE;
            $session_data = $this->session->userdata('gpworx_logged_in');
            $this->userId = $session_data['gpworx_id'];
            $this->fullname = $session_data['gpworx_fullname'];
        } else {
            $this->login = FALSE;
        }
    }

    public function index() {
        $this->checkLogin();
        if ($this->login) {
            $data = array(
                "title" => 'Home',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname
            );
            $this->load->gerard('index', $data);
        }else{
            redirect('login', 'refresh');
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('gpworx_logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
