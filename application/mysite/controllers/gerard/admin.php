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
        if ($this->session->userdata('logged_in')) {
            $this->login = TRUE;
            $session_data = $this->session->userdata('logged_in');
            $this->userId = $session_data['id'];
            $this->fullname = $session_data['fullname'];
        } else {
            $this->login = FALSE;
        }
    }

    public function index() {
        $this->checkLogin();
        if ($this->login) {
            $data = array(
                "title" => 'Manage Admin',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname,
                "id" => $this->userId
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
            $filename = 'profile_gerardpaullabitad_gpplworx-' . $_FILES['new_file']['name'];
            $config = array(
                'upload_path' => './application/mysite/assets/upload/',
                'file_name' => $filename,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => 2048,
            );
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('new_file')) {
                $error = $this->upload->display_errors();
                echo $error;
            } else {
                $upload_data = $this->upload->data();
                if (isset($upload_data['full_path'])) {
                    $attachment_path = $upload_data['full_path'];
                } else {
                    $attachment_path = "No File.";
                }
            }
            $attachment = strstr($attachment_path, 'application');
            $path = base_url() . $attachment;
            $this->load->model('file_model');
            if ($this->file_model->add_file($path)) {
                echo "Upload successful!";
            }else{
                echo "Upload failed!";
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

            $salt1 = md5(uniqid(rand(), true));
            $salt = substr($salt1, 0, 50);
            $hashPassword = hash('sha256', $salt . $password);

            $this->load->model('admin_model');
            $data = array(
                "title" => 'Manage Admin',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname,
                "id" => $this->userId
            );
            if ($this->admin_model->update_admin($id, $fullname, $username, $hashPassword, $salt, $profile1, $profile2)) {
                $data['alert'] = 'alert alert-success';
                $data['message'] = 'Successfully updated!';
                $this->load->gerard('admin', $data);
            } else {
                $data['alert'] = 'alert alert-danger';
                $data['message'] = 'There was an error updating!';
                $this->load->gerard('admin', $data);
            }
        } else {
            redirect('login', 'refresh');
        }
    }

}
