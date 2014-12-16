<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Background extends CI_Controller {

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
            $this->load->model('background_model');
            $home = $this->background_model->get_home_bg();
            $portfolio = $this->background_model->get_portfolio_bg();
            $contact = $this->background_model->get_contact_bg();
            $about = $this->background_model->get_about_bg();

            $data = array(
                "title" => 'Manage Background',
                "description" => 'This site is a project of Gerard Paul Picardal Labitad.',
                "fullname" => $this->fullname,
                "home" => $home,
                "portfolio" => $portfolio,
                "contact" => $contact,
                "about" => $about
            );
            $this->load->gerard('background', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function ajaxSetBGImage() {
        $this->checkLogin();
        if ($this->login) {
            $id = $_POST['image_id'];
            $for_bg = $_POST['for_bg'];

            $this->load->model('background_model');
            if ($this->background_model->set_bg($for_bg, $id)) {
                $result = array('status' => 'ok');

                echo json_encode($result);
            } else {
                $result = array('status' => 'failed');

                echo json_encode($result);
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function upload() {
        $this->checkLogin();
        if ($this->login) {
            $attachment_path = 'No File.';
            $filename = 'bg-gerardpaullabitad_gpplworx_gpworx-' . $_FILES['new_file']['name'];
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

}
