<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Files extends CI_Controller {

    var $login = FALSE;

    function __construct() {
        parent::__construct();
    }

    private function checkLogin() {
        if ($this->session->userdata('logged_in')) {
            $this->login = TRUE;
        } else {
            $this->login = FALSE;
        }
    }
    
    public function index() {
        show_404();
    }
    
    public function getFiles(){
        $this->checkLogin();
        if ($this->login) {
            echo $this->_getAjaxFiles();
        } else {
            redirect('login', 'refresh');
        }
    }
    
    function _getAjaxFiles() {
        $this->load->model('file_model');
        $files = $this->file_model->get_files();
        if($files != FALSE){
            $list = '';
            foreach ($files as $file) {
                $list .= '<label><input type="radio" class="profile_image" name="profile_image" value="'.$file->getId().'+'.$file->getFile().'" /><img class="img img-responsive prof_img" width="130px" src="'.$file->getFile().'"></label>';
            }
            $result = array('status' => 'ok', 'content' => $list);
            
            return json_encode($result);
        }else{
            $result = array('status' => 'not', 'content' => '<p>Upload Image...</p>');
            
            return json_encode($result);
        }
    }
}