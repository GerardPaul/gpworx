<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            "title" => 'Home',
            "description" => 'This site is a project of Gerard Paul Picardal Labitad.'
        );
        $this->load->front('index', $data);
    }

}
