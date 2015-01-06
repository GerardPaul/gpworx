<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

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

    private function cleanString($string) {
        $detagged = strip_tags($string);
        if (get_magic_quotes_gpc()) {
            $stripped = stripslashes($detagged);
            $escaped = mysql_real_escape_string($stripped);
        } else {
            $escaped = mysql_real_escape_string($detagged);
        }

        return addslashes($escaped);
    }

    public function index() {
        $this->checkLogin();
        if ($this->login) {
            $this->load->model('about_model');
            $info = $this->about_model->get_info();
            $contact = $this->about_model->get_contact();

            $this->load->model('skill_model');
            $skills = $this->skill_model->get_skills();

            $data = array(
                "title" => 'Manage About',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname,
                "info" => $info,
                "contact" => $contact,
                "skills" => $skills
            );
            $this->load->gerard('about', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function addInfo() {
        $this->checkLogin();
        if ($this->login) {
            $info_label = $this->cleanString($_POST['info_label']);
            $info_value = $this->cleanString($_POST['info_value']);

            $this->load->model('about_model');
            if ($this->about_model->set_about($info_label, $info_value, 'info')) {
                redirect('gerard/about', 'refresh');
            }else{
                echo 'Failed';
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function addContact() {
        $this->checkLogin();
        if ($this->login) {
            $contact_label = $this->cleanString($_POST['contact_label']);
            $contact_value = $this->cleanString($_POST['contact_value']);

            $this->load->model('about_model');
            if ($this->about_model->set_about($contact_label, $contact_value, 'contact')) {
                redirect('gerard/about', 'refresh');
            }else{
                echo 'Failed';
            }
        } else {
            redirect('login', 'refresh');
        }
    }

}
