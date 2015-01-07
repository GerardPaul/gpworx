<?php

class About_Model extends CI_Model {

    private $_id = '';
    private $_label = '';
    private $_value = '';
    private $_order = '';
    private $_type = '';
    private $_table_name = 'gpworx_info';

    function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->_id;
    }

    function setId($value) {
        $this->_id = $value;
    }

    function getLabel() {
        return $this->_label;
    }

    function setLabel($value) {
        $this->_label = $value;
    }

    function getValue() {
        return $this->_value;
    }

    function setValue($value) {
        $this->_value = $value;
    }

    function getOrder() {
        return $this->_order;
    }

    function setOrder($value) {
        $this->_order = $value;
    }

    function getType() {
        return $this->_type;
    }

    function setType($value) {
        $this->_type = $value;
    }
    
    function get_1_info($id) {
        $sql = "SELECT *
                FROM $this->_table_name
                WHERE id = $id";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }
    
    function get_1_contact($id) {
        $sql = "SELECT *
                FROM $this->_table_name
                WHERE id = $id";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }
    
    function get_info() {
        $sql = "SELECT a.id, a.label, a.value, a.order, a.type
                FROM $this->_table_name a
                WHERE a.type = 'info'
                ORDER BY a.order ASC";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            $info = array();
            foreach ($query->result() as $row) {
                $info[] = $this->createObjectFromData($row);
            }
            return $info;
        }
        return false;
    }

    function get_contact() {
        $sql = "SELECT a.id, a.label, a.value, a.order, a.type
                FROM $this->_table_name a
                WHERE a.type = 'contact'
                ORDER BY a.order ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $contact = array();
            foreach ($query->result() as $row) {
                $contact[] = $this->createObjectFromData($row);
            }
            return $contact;
        }
        return false;
    }

    function set_about($label, $value, $type) {
        $order = (int) $this->get_last_order($type) + 1;
        $data = array(
            'label' => $label,
            'value' => $value,
            'order' =>$order,
            'type' => $type
        );
        if ($this->db->insert($this->_table_name, $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_last_order($type){
        $sql = "SELECT a.order FROM $this->_table_name a WHERE a.type = '$type' ORDER BY a.order DESC LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row('order');
        }
        return false;
    }

    private function createObjectFromData($row) {
        $bg = new About_Model();
        $bg->setId($row->id);
        $bg->setLabel($row->label);
        $bg->setValue($row->value);
        $bg->setOrder($row->order);
        $bg->setType($row->type);

        return $bg;
    }

}
