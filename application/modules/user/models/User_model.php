<?php

class User_model extends CI_Model{
	
    var $tbl_user = 'users';
    var $tbl_access_folder = 'access_folder';
    var $tbl_folder='folder';


    public function __construct(){
        parent::__construct();
    }
    public function users(){

        $query = $this->db->get($this->tbl_user);
        return $query;
    }

    public function create($data){
       $this->db->insert($this->tbl_user, $data);

       return TRUE;
    }
    public function get_edit($id){
    	$data=$this->db->select('*')->from($this->tbl_user)->where('id',$id)->get();
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
    public function access($id_user,$id_folder){
        $c = $this->db->where(array(
            'id_user'   => $id_user,            
            'id_folder' => $id_folder
        ))->count_all_results($this->tbl_access_folder);

        if ($c > 0){
            return true;
        }else{
            return false;
        }
    }

}