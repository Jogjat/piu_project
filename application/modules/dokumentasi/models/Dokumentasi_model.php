<?php

class Dokumentasi_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    public function folder(){
        $query = $this->db->get('folder');
        return $query->result_array();
    }
    public function tambah($data){
       $this->db->insert('folder', $data);
       return TRUE;
    }
}
	//public function __construct(){
    //    parent::__construct();
    //}
    //function show_folder(){
    //    $hasil=$this->db->query("SELECT * FROM folder");
    //    return $hasil;
    //}
    
    //public function tambah($data){
    //   $this->db->insert('folder', $data);
    //   return TRUE;
    //}

