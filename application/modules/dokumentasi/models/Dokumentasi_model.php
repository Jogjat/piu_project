<?php

class Dokumentasi_model extends CI_Model{
    var $tbl_dokumentasi = 'dokumentasi';
    var $tbl_folder = 'folder';
    public function __construct(){
        parent::__construct();
    }
    public function get_parent_id($id){
        $data = $this->db->where('id',$id)->get($this->tbl_dokumentasi);
        while ($data->row()->parent != 0) {
            get_parent_id($data->row()->parent);
        }
        return $data->row()->id;
    }
    public function folder(){
        if($this->ion_auth->user()->row()->username!='administrator'){
            // cek sebagai apa?
            

            // tampilkan data yang boleh di akses
            $query=$this->db->where('folder_name', $this->ion_auth->user()->row()->type)->get($this->tbl_folder);

        }else{
            $query = $this->db->get('folder');
        }
        
        return $query->result();
    }
    public function tambah($data){
       $this->db->insert('folder', $data);
       return TRUE;
    }
    public function hapus($id_folder)
    {
        $this->db->delete('folder', $id_folder);
        return TRUE;
       
    }
    public function get_subfolder($data){
        $this->db->get('folder', $data);
        return TRUE;
    }
}


