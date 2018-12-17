<?php

class User_model extends CI_Model{

	var $table_user='piu.users';

    public function __construct(){
        parent::__construct();
    }
    public function user(){
        $query = $this->db->get('piu.users');
        return $query->result_array();
    }

	public function fetch_data()
    {
        $data = $this->db->get("piu.users");
        return $data;
    }

    public function update_folder($id_folder,$data)
    {
       $this->db->where("id_folder",$id_folder);
       $this->db->update("folder", $data);
       return $data;
    }

    function get_edit($id){
    	$data=$this->db->select('*')->from($this->table_folder)->where('id_folder',$id)->get();
    	return $data;
    }

    function get_user(){
    	$data=$this->db->select('*')->from($this->table_user)->get();
    	return $data;
    }

}