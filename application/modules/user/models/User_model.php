<?php

class User_model extends CI_Model{
	
    var $tbl_user = 'users';

    public function __construct(){
        parent::__construct();
    }
    public function user(){

        $query = $this->db->get($this->tbl_user);
        return $query;
    }

    public function create($data){
       $this->db->insert($this->tbl_user, $data);

       return TRUE;
    }
    public function get_edit($id){
    	$data=$this->db->select('*')->from($this->tbl_user)->where('id',$id)->get($this->tbl_user);
    	return $data;
    }
    // public function user(){
    // 	$data=$this->db->select('*')->from($this->tbl_user)->get($this->tbl_user);
    // 	return $data;
    // }

    public function edit($id,$data)
    {
       $this->db->where("id",$id);

       $this->db->update($this->tbl_user, $data);

       return $data;
    }
}