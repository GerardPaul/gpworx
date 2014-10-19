<?php

class Background_Model extends CI_Model {

    private $_id = '';
    private $_file_url = '';
    private $_type = '';
    private $_order = '';
    private $_status = '';
    private $_table_name = 'gpworx_backgrounds';

    function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->_id;
    }

    function setId($value) {
        $this->_id = $value;
    }
    
    function getFileURL() {
        return $this->_file_url;
    }

    function setFileURL($value) {
        $this->_file_url = $value;
    }
    
    function getType() {
        return $this->_type;
    }

    function setType($value) {
        $this->_type = $value;
    }
    
    function getOrder() {
        return $this->_order;
    }

    function setOrder($value) {
        $this->_order = $value;
    }
    
    function getStatus() {
        return $this->_status;
    }

    function setStatus($value) {
        $this->_status = $value;
    }
    
    function get_home_bg() {
        $sql = "SELECT b.id, b.type, b.order, b.status, f.file_path
                FROM $this->_table_name b, gpworx_files f 
                WHERE b.type = 'home' AND b.file_url = f.id AND b.status = 1
                ORDER BY b.order ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $bgs = array();
            foreach ($query->result() as $row) {
                $bgs[] = $this->createObjectFromData($row);
            }
            return $bgs;
        }
        return false;
    }
    
    function get_portfolio_bg() {
        $sql = "SELECT b.id, b.type, b.order, b.status, f.file_path
                FROM $this->_table_name b, gpworx_files f 
                WHERE b.type = 'portfolio' AND b.file_url = f.id AND b.status = 1
                ORDER BY b.order ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }
    
    function get_contact_bg() {
        $sql = "SELECT b.id, b.type, b.order, b.status, f.file_path
                FROM $this->_table_name b, gpworx_files f 
                WHERE b.type = 'contact' AND b.file_url = f.id AND b.status = 1
                ORDER BY b.order ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }
    
    function get_about_bg() {
        $sql = "SELECT b.id, b.type, b.order, b.status, f.file_path
                FROM $this->_table_name b, gpworx_files f 
                WHERE b.type = 'about' AND b.file_url = f.id AND b.status = 1
                ORDER BY b.order ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }

    private function createObjectFromData($row) {
        $bg = new Background_Model();
        $bg->setId($row->id);
        $bg->setFileURL($row->file_path);
        $bg->setType($row->type);
        $bg->setOrder($row->order);
        $bg->setStatus($row->status);

        return $bg;
    }

}
