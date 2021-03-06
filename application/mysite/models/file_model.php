<?php

class File_Model extends CI_Model {

    private $_id = '';
    private $_file_path = '';
    private $_date_added = '';
    private $_table_name = 'gpworx_files';

    function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->_id;
    }

    function setId($value){
        $this->_id = $value;
    }
    
    function getFile() {
        return $this->_file_path;
    }
    
    function setFile($value){
        $this->_file_path = $value;
    }
    
    function getDateAdded() {
        return $this->_date_added;
    }
    
    function setDateAdded($value){
        $this->_date_added = $value;
    }

    function get_image_files($type) {
        $sql = "SELECT * FROM $this->_table_name WHERE file_path LIKE '%$type-%' ORDER BY date_added DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $files = array();
            foreach ($query->result() as $row) {
                $files[] = $this->createObjectFromData($row);
            }
            return $files;
        }
        return false;
    }

    function add_file($path){
        $data = array(
            'file_path' => $path
        );
        if($this->db->insert($this->_table_name,$data)){
            return true;
        }
        return false;
    }
    
    private function createObjectFromData($row) {
        $file = new File_Model();
        $file->setId($row->id);
        $file->setFile($row->file_path);
        $file->setDateAdded($row->date_added);

        return $file;
    }

}
