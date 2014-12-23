<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Files extends CI_Controller {

    var $login = FALSE;

    function __construct() {
        parent::__construct();
    }

    private function checkLogin() {
        if ($this->session->userdata('gpworx_logged_in')) {
            $this->login = TRUE;
        } else {
            $this->login = FALSE;
        }
    }

    public function index() {
        show_404();
    }

    public function getFiles() {
        $this->checkLogin();
        if ($this->login) {
            echo $this->_getAjaxImageFiles($_POST['type']);
        } else {
            redirect('login', 'refresh');
        }
    }

    function _getAjaxImageFiles($type) {
        $this->load->model('file_model');
        $files = $this->file_model->get_image_files($type);
        if ($files != FALSE) {
            $list = '';
            foreach ($files as $file) {
                $list .= '<label><input type="radio" class="' . $type . '_image" name="' . $type . '_image" value="' . $file->getId() . '+' . $file->getFile() . '" /><img class="img img-responsive prof_img" width="130px" src="' . $file->getFile() . '"></label>';
            }
            $result = array('status' => 'ok', 'content' => $list);

            return json_encode($result);
        } else {
            $result = array('status' => 'not', 'content' => '<p>Upload Image...</p>');

            return json_encode($result);
        }
    }

}
