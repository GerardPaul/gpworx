<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

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
            $this->load->model('admin_model');
            $admin = $this->admin_model->get_admin_details($this->userId);
            $data = array(
                "title" => 'Manage Admin',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname,
                "id" => $this->userId,
                "admin" => $admin
            );
            $this->load->gerard('admin', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function upload() {
        $this->checkLogin();
        if ($this->login) {
            $attachment_path = 'No File.';
            $filename = 'profile-gerardpaullabitad_gpplworx_gpworx-' . $_FILES['new_file']['name'];
            $config = array(
                'upload_path' => './application/mysite/assets/upload/',
                'file_name' => $filename,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => 2048,
            );
            $this->load->library('upload', $config);
            $err = false;
            if (!$this->upload->do_upload('new_file')) {
                $error = $this->upload->display_errors();
                echo $error;
                $err = true;
            } else {
                $upload_data = $this->upload->data();
                if (isset($upload_data['full_path'])) {
                    $attachment_path = $upload_data['full_path'];
                } else {
                    $attachment_path = "No File.";
                }
            }
            if ($err) {
                echo "Upload failed!";
            } else {
                $attachment = strstr($attachment_path, 'application');
                $path = base_url() . $attachment;
                $this->load->model('file_model');
                if ($this->file_model->add_file($path)) {
                    echo "Upload successful!";
                } else {
                    echo "Upload failed!";
                }
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function update() {
        $this->checkLogin();
        if ($this->login) {
            $id = $this->input->post('id');
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $profile1 = $this->input->post('profile1');
            $profile2 = $this->input->post('profile2');

            $salt = '';
            if ($password != 'password!') {
                $salt1 = md5(uniqid(rand(), true));
                $salt = substr($salt1, 0, 50);
                $password = hash('sha256', $salt . $password);
            }

            $this->load->model('admin_model');
            $this->admin_model->update_admin($id, $fullname, $username, $password, $salt, $profile1, $profile2);

            redirect('gerard/admin', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

}
