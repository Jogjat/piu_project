<?php

class Dokumentasi_model extends CI_Model{
	var $tbl_folder='folder';
	var $tbl_user='users';
	var $tbl_document = 'documents';
	var $tbl_access_folder = 'access_folder';

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
    function get_folder($id){
        $data = $this->db->where('id_folder',$id)->get($this->tbl_folder);

        return $data;
    }

    public function edit($id,$data)
    {
       $this->db->where("id_folder",$id);
       $this->db->update($this->tbl_folder, $data);
       return $data;
    }

    public function delete($id)
    {
    	$this->db->delete($this->tbl_folder,"id_folder=".$id);
    	return TRUE;
    }

	function uploadFiles($data){
		$this->db->insert_batch($this->tbl_document,$data);
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

    function create_dokumen($data){
        $this->db->insert($this->tbl_document,$data);

        return true;
    }

    function create_access_folder($id_folder,$id_user){
        $data = array(
            'id_folder' => $id_folder,
            'id_user'   => $id_user
        );
        $this->db->insert($this->tbl_access_folder,$data);

        return true;
    }

    function access($id_folder,$id_user){
        $c = $this->db->where(array(
            'id_folder' => $id_folder,
            'id_user'   => $id_user
        ))->count_all_results($this->tbl_access_folder);

        if ($c > 0){
            return true;
        }else{
            return false;
        }
    }

    
}
