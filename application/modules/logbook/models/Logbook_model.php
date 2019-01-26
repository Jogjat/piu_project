<?php

class Logbook_model extends CI_Model{
	var $tbl_logbook='logbook';
	var $tbl_attachment='attachment';
	var $tbl_user='users';


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
        public function edit($id,$data)
    {
       $this->db->where('id_logbook', $id);
       $this->db->update($this->tbl_logbook, $data);

       return $data;
    }
        public function get_edit($id){
    	$data=$this->db->select('*')->from($this->tbl_logbook)->where('id_logbook',$id)->get();
    	return $data;
    }
    public function get_logbook($id,$data){
        $data = $this->db->where('id_logbook',$id)->get($this->tbl_logbook);

        return $data;
    }
    public function create($data){
       $this->db->insert($this->tbl_logbook, $data);

       return TRUE;
    }
}