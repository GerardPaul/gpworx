<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('admin_model');
        $profile = $this->admin_model->get_admin_details(1);
        $data = array(
            "title" => 'Login',
            "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
            "profile" => $profile
        );
        $this->load->view('login_view', $data);
    }

    public function auth() {
        $this->load->model('admin_model');
        $profile = $this->admin_model->get_admin_details(1);
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('admin_model');
        $result = $this->admin_model->get_admin($username);
        if ($result !== FALSE) {
            $adminId = $result->getId();
            $adminUsername = $result->getUsername();
            $adminPassword = $result->getPassword();
            $adminFullname = $result->getFullname();
            $adminSalt = $result->getSalt();

            $hashPassword = hash('sha256', $adminSalt . $password);

            if ($username == $adminUsername && $hashPassword == $adminPassword) {
                $sess_array = array(
                    'gpworx_id' => $adminId,
                    'gpworx_fullname' => $adminFullname
                );
                $this->session->set_userdata('gpworx_logged_in', $sess_array);
                redirect('gerard/home', 'refresh');
            } else {
                $data = array(
                    "title" => 'Login',
                    "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                    "message" => 'Invalid login credentials!',
                    "profile" => $profile
                );
                $this->load->view('login_view', $data);
            }
        } else {
            $data = array(
                "title" => 'Login',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "message" => 'Invalid login credentials!',
                "profile" => $profile
            );
            $this->load->view('login_view', $data);
        }
    }

//    public function create(){
//        $fullname = 'Gerard Paul Picardal Labitad';
//        $profile1 = 'profile 1';
//        $profile2 = 'profile 2';
//        $username = 'gerardpaul.labitad@outlook.com';
//        $password = '[rEEvE][143]gpworx';
//        
//        $salt1 = md5(uniqid(rand(), true));
//        $salt = substr($salt1, 0, 50);
//        $hashPassword = hash('sha256', $salt . $password);
//        
//        $this->load->model('admin_model');
//        if($this->admin_model->create_admin($fullname, $username, $hashPassword, $salt, $profile1, $profile2)){
//            echo 'Success';
//        }else{
//            echo 'Error';
//        }
//    }
}
