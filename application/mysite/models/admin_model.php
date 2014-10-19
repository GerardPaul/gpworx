<?php

class Admin_Model extends CI_Model {

    private $_id = '';
    private $_fullname = '';
    private $_profile_picture1 = '';
    private $_profile_picture2 = '';
    private $_username = '';
    private $_password = '';
    private $_salt = '';
    private $_table_name = 'gpworx_admin';

    function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->_id;
    }

    function getFullname() {
        return $this->_fullname;
    }

    function getProfile1() {
        return $this->_profile_picture1;
    }

    function getProfile2() {
        return $this->_profile_picture2;
    }

    function getUsername() {
        return $this->_username;
    }

    function getPassword() {
        return $this->_password;
    }

    function getSalt() {
        return $this->_salt;
    }

    function get_admin($username) {
        $sql = "SELECT * FROM $this->_table_name WHERE username = ?";
        $query = $this->db->query($sql, array($username));
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }

    function get_admin_details($id) {
        $sql = "SELECT a.id, a.username, a.password, a.fullname, a.salt,
                    (SELECT f.file_path FROM gpworx_files f WHERE a.profile_picture1 = f.id) AS \"profile_picture1\",
                    (SELECT f.file_path FROM gpworx_files f WHERE a.profile_picture2 = f.id) AS \"profile_picture2\"
                FROM gpworx_admin a
                WHERE a.id = ? ";
        $query = $this->db->query($sql, array($id));
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }

    function create_admin($fullname, $username, $password, $salt, $profile1, $profile2) {
        $data = array(
            'fullname' => $fullname,
            'username' => $username,
            'password' => $password,
            'salt' => $salt,
            'profile_picture1' => $profile1,
            'profile_picture2' => $profile2
        );
        if ($this->db->insert($this->_table_name, $data)) {
            return true;
        }
        return false;
    }

    function update_admin($id, $fullname, $username, $password, $salt, $profile1, $profile2) {
        if ($password != 'password!') {
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'password' => $password,
                'salt' => $salt,
                'profile_picture1' => $profile1,
                'profile_picture2' => $profile2
            );
        }else{
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'profile_picture1' => $profile1,
                'profile_picture2' => $profile2
            );
        }

        if ($this->db->update($this->_table_name, $data, array("id" => $id))) {
            return true;
        }
        return false;
    }

    private function createObjectFromData($row) {
        $this->_id = $row->id;
        $this->_fullname = $row->fullname;
        $this->_username = $row->username;
        $this->_password = $row->password;
        $this->_profile_picture1 = $row->profile_picture1;
        $this->_profile_picture2 = $row->profile_picture2;
        $this->_salt = $row->salt;

        return $this;
    }

}
