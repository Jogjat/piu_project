<?php
/**
* Class Dokumentasi
* @property Dokumentasi $dokumentasi
* @property Dokumentasi_model $dokumentasi_model
*/
class Dokumentasi extends MY_Controller
{
    public function DateTime(){
        DateTime::createFromFormat ();
    }
    

     public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->load->model('dokumentasi/dokumentasi_model');
        //$this->load->library('form_validation');
    }

    public function index(){
        $data=array(
            'data' => $this->dokumentasi_model->folder(),
            'date'=> 'Y-m-d',
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active'
        );
        $this->template->main('dokumentasi/index',$data);
    }
    public function show(){
        if($this->ion_auth->user()->row()->username!='administrator'){
            $this->dokumentasi_model->show($data);
        }
        else{
            $this->load->view("dokumentasi/index");
        }
    }
    
    public function tambah(){
    //post form tambah folder
        if(count($_POST) > 0){.
            //die(var_dump("test post"));
            $data = array(
            'id_folder' => $this->input->post('id_folder'),
            'folder_name' => $this->input->post('folder_name'),
            'create_date' => $this->input->post('create_date'),
            'parent' => $this->input->post('parent'),
            'id_user' => $this->input->post('id_user')
        );
    $this->dokumentasi_model->tambah($data);
    $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('dokumentasi/index');
    }
    //klik button tambah folder
    else{
        $this->load->view("dokumentasi/tambah");
        }
    }
    public function hapus()
    {
        if(count($_POST) > 0){
            $data = array(
            'id_folder' => $this->input->post('id_folder'),
        );
        $this->dokumentasi_model->hapus($id_folder);
        $this->session->set_flashdata('hapus','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('dokumentasi/index');
    }
    else{
        $this->load->view("dokumentasi/hapus");
        }
    }
        
        
}

        
   
