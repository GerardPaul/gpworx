<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portfolio extends CI_Controller {

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
                "title" => 'Manage Portfolio',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname
            );
            $this->load->gerard('portfolio', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

}
