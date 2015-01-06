<?php

class Skill_Model extends CI_Model {

    private $_id = '';
    private $_skill_name = '';
    private $_image = '';
    private $_order = '';
    private $_table_name = 'gpworx_skills';

    function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->_id;
    }

    function setId($value) {
        $this->_id = $value;
    }

    function getSkill() {
        return $this->_skill_name;
    }

    function setSkill($value) {
        $this->_skill_name = $value;
    }

    function getImage() {
        return $this->_image;
    }

    function setImage($value) {
        $this->_image = $value;
    }

    function getOrder() {
        return $this->_order;
    }

    function setOrder($value) {
        $this->_order = $value;
    }

    function get_skills() {
        $sql = "SELECT a.id, a.skill_name, a.image, a.order
                FROM $this->_table_name a
                ORDER BY a.order ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $skills = array();
            foreach ($query->result() as $row) {
                $skills[] = $this->createObjectFromData($row);
            }
            return $skills;
        }
        return false;
    }

    function set_about($skill, $image, $order) {
        $data = array(
            'skill_name' => $skill,
            'image' => $image,
            'order' => $order
        );
        if ($this->db->insert($this->_table_name, $data)) {
            return true;
        } else {
            return false;
        }
    }

    private function createObjectFromData($row) {
        $bg = new Background_Model();
        $bg->setId($row->id);
        $bg->setSkill($row->label);
        $bg->setImage($row->value);
        $bg->setOrder($row->order);

        return $bg;
    }

}
