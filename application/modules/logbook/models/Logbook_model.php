<?php

class Logbook_model extends CI_Model{
	var $tbl_logbook='logbooks';
    var $tbl_access_logbook='access_logbook';

    public function __construct(){
        parent::__construct();
    }
    public function logbooks(){
        $query = $this->db->get($this->tbl_logbook);
        return $query;
    }
}