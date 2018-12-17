<?php

class Dokumentasi_model extends CI_Model{

	var $table_folder='piu.folder';
	var $table_user='piu.users';

    public function __construct(){
        parent::__construct();
    }
    public function folder(){
        $query = $this->db->get('piu.folder');
        return $query->result_array();
    }

    public function subfolder(){
        // $query = $this->db->get('piu.folder')->where('parent',$id);
        $query = $this->db->get('piu.folder');
        return $query->result_array();
    }

	public function fetch_data()
    {
        $data = $this->db->get("piu.folder");
        return $data;
    }

    public function tambah($data){
       $this->db->insert('piu.folder', $data);
       return TRUE;
    }


    // public function edit_dokumentasi($id_folder)
    // {
    //    $this->db->where("id_folder", $id_folder);
    //    $query=$this->db->get("piu.folder");
    //     return $query->result();
    // }

    // public function fetch_single_folder($id_folder)
    // {
    //    $this->db->where("id_folder", $id_folder);
    //    $query=$this->db->get("piu.folder");
    //     return $query->result();
    // }

    // public function insert_folder($data)
    // {
    //    $this->db->insert("folder", $data);
    // }

    // public function edit_folder($where,$table)
    // {
    //    return $this->db->get_where($table, $where);
    // }

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