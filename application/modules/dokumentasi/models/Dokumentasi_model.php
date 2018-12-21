<?php

class Dokumentasi_model extends CI_Model{
	var $tbl_folder='folder';
	var $tbl_user='users';
	var $tbl_document = 'documents';

    public function __construct(){
        parent::__construct();
    }
    public function folder(){
        $query = $this->db->where('parent',0)->get($this->tbl_folder);
        return $query;
    }

    public function get_subfolder($id){
        $query = $this->db->where('parent',$id)->get($this->tbl_folder);
        return $query;
    }

    public function create($data){
       $this->db->insert($this->tbl_folder, $data);
       return TRUE;
    }

    public function create_subfolder($data){
       $this->db->insert($this->tbl_folder, $data);
       return TRUE;
    }

    function get_edit($id){
    	$data=$this->db->select('*')->from($this->tbl_folder)->where('id_folder',$id)->get();
    	return $data;
    }

    function get_user(){
    	$data=$this->db->select('*')->from($this->tbl_user)->get();
    	return $data;
    }

    public function edit($id,$data)
    {
       $this->db->where("id_folder",$id);
       $this->db->update("piu.folder", $data);
       return $data;
    }

    public function delete($id)
    {
    	$this->db->where("id_folder", $id)->or_where("parent", $id);
    	$this->db->delete($this->tbl_folder);
    	return TRUE;
    }

	function uploadFiles($data){
		$insert = $this->db->insert_batch($this->tbl_document,$data);
		return TRUE;
	}

	function get_bc($id){
        $data = $this->db->where('id_folder',$id)->get($this->tbl_folder);
        if ($data->row()->parent != 0){
            return $this->get_bc($data->row()->parent) . ' / ' . '<a href="'.base_url('dokumentasi/subfolder').'/'.$data->row()->id_folder.'">'.$data->row()->folder_name.'</a>' ;
        }else{
            return '<a href="'.base_url('dokumentasi/subfolder').'/'.$data->row()->id_folder.'">'.$data->row()->folder_name.'</a>';
        }
    }
}
