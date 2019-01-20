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
    public function delete($id)
    {
    	$this->db->delete($this->tbl_logbook, "id_logbook=".$id);
    	return TRUE;
    }
    public function get_logbook($id){
        $data = $this->db->where('id_logbook',$id)->get($this->tbl_logbook);

        return $data;
    }
}