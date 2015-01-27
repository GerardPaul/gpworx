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
    
    public function addSkill() {
        $this->checkLogin();
        if ($this->login) {
            $skill_name = $this->cleanString($_POST['skill_name']);
            $skill_image = $this->cleanString($_POST['skill_image']);

            $this->load->model('skill_model');
            if ($this->skill_model->set_skill($skill_name, $skill_image)) {
                redirect('gerard/about', 'refresh');
            }else{
                echo 'Failed';
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    public function updateContact(){
        $this->checkLogin();
        if ($this->login) {
            $contact_id = $this->cleanString($_POST['contact_edit_id']);
            $contact_label = $this->cleanString($_POST['contact_edit_label']);
            $contact_value = $this->cleanString($_POST['contact_edit_value']);
            $contact_order = $this->cleanString($_POST['contact_edit_order']);
            $contact_order_original = $this->cleanString($_POST['contact_order_original']);
            
            $this->load->model('about_model');
            if($this->about_model->update_about($contact_id, $contact_label, $contact_value, $contact_order, $contact_order_original, 'contact')){
                redirect('gerard/about', 'refresh');
            }else{
                echo "Failed";
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function updateInfo(){
        $this->checkLogin();
        if ($this->login) {
            $info_id = $this->cleanString($_POST['info_edit_id']);
            $info_label = $this->cleanString($_POST['info_edit_label']);
            $info_value = $this->cleanString($_POST['info_edit_value']);
            $info_order = $this->cleanString($_POST['info_edit_order']);
            $info_order_original = $this->cleanString($_POST['info_order_original']);
            
            $this->load->model('about_model');
            if($this->about_model->update_about($info_id, $info_label, $info_value, $info_order, $info_order_original, 'info')){
                redirect('gerard/about', 'refresh');
            }else{
                echo "Failed";
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function getContact(){
        $this->checkLogin();
        if ($this->login) {
            $id = $_POST['id'];
            $this->load->model('about_model');
            
            $contact = $this->about_model->get_1_contact($id);
            
            if($contact){
                $contact_label = $contact->getLabel();
                $contact_value = $contact->getValue();
                $contact_order = $contact->getOrder();
                
                $lastOrder = (int) $this->about_model->get_last_order('contact');
                $options = '';
                $selected = FALSE;
                for($i = 0; $i < $lastOrder; $i++){
                    $value = $i + 1;
                    
                    if($value == $contact_order){
                        $selected = TRUE;
                    }
                    
                    if($selected)
                        $options .= '<option value="'. $value .'" selected="selected">'.$value.'</option>';
                    else
                        $options .= '<option value="'. $value .'">'.$value.'</option>';
                    $selected = FALSE;
                }
                
                $content = '<form id="contact_edit_form" method="post" class="form-horizontal" action="'. base_url() .'gerard/about/updateContact">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="contact_edit_label" class="col-sm-2 control-label">Label</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="contact_edit_label" name="contact_edit_label" value="'.$contact_label.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_edit_value" class="col-sm-2 control-label">Value</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="contact_edit_value" name="contact_edit_value" value="'.$contact_value.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_edit_order" class="col-sm-2 control-label">Order</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="contact_edit_order" id="contact_edit_order">
                                                '.$options.'
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="contact_edit_id" id="contact_edit_id" value="'.$id.'">
                                    <input type="hidden" name="contact_order_original" id="contact_order_original" value="'.$contact_order.'">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" >Update</button>
                                </div>
                            </form>';
                
                $result = array('status' => 'ok', 'content' => $content);
            
                echo json_encode($result);
                exit();
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function getInfo(){
        $this->checkLogin();
        if ($this->login) {
            $id = $_POST['id'];
            $this->load->model('about_model');
            
            $info = $this->about_model->get_1_info($id);
            
            if($info){
                $info_label = $info->getLabel();
                $info_value = $info->getValue();
                $info_order = $info->getOrder();
                
                $lastOrder = (int) $this->about_model->get_last_order('info');
                $options = '';
                $selected = FALSE;
                for($i = 0; $i < $lastOrder; $i++){
                    $value = $i + 1;
                    
                    if($value == $info_order){
                        $selected = TRUE;
                    }
                    
                    if($selected)
                        $options .= '<option value="'. $value .'" selected="selected">'.$value.'</option>';
                    else
                        $options .= '<option value="'. $value .'">'.$value.'</option>';
                    $selected = FALSE;
                }
                
                $content = '<form id="info_edit_form" method="post" class="form-horizontal" action="'. base_url() .'gerard/about/updateInfo">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="info_edit_label" class="col-sm-2 control-label">Label</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="info_edit_label" name="info_edit_label" value="'.$info_label.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="info_edit_value" class="col-sm-2 control-label">Value</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="info_edit_value" name="info_edit_value" value="'.$info_value.'">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="info_edit_order" class="col-sm-2 control-label">Order</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="info_edit_order" id="info_edit_order">
                                                '.$options.'
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="info_edit_id" id="info_edit_id" value="'.$id.'">
                                    <input type="hidden" name="info_order_original" id="info_order_original" value="'.$info_order.'">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" >Update</button>
                                </div>
                            </form>';
                
                $result = array('status' => 'ok', 'content' => $content);
            
                echo json_encode($result);
                exit();
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    
}
