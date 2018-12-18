<?php
class User_model extends CI_Model{
	
    var $tbl_user = 'users';

    public function __construct(){
        parent::__construct();
    }
    public function create($data){
       $this->db->insert('users', $data);
       return TRUE;
    }
}