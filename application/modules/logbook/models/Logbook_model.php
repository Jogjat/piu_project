<?php

class Logbook_model extends CI_Model{
	var $tbl_logbook='logbook';
    

    public function __construct(){
        parent::__construct();
    }
    public function logbook(){
        $query = $this->db->get($this->tbl_logbook);
        return $query;
    }
}