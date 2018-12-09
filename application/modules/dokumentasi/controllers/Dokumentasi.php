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
        //$this->load->view('view_admin',$data);
    }
    //public function index()
    //{
    //    $data = array(
    //        'dokumentasi'   => 'active',
    //        'title'         => 'Dokumentasi',
    //        'data'          => $this->dokumentasi_model->show_folder()
    //    );
        
    //    $this->template->main('dokumentasi/index',$data);
        
    //}
    public function tambah(){
        
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

}
   
    
    

    //public function tambah()
    //{
    //    $data = array(
    //        'dokumentasi'   => 'active',
    //        'title'         => 'Tambah Dokumentasi'
    //    );

    //    $this->template->main('dokumentasi/tambah',$data);
    //}
    //public function add()
    //{
    //    $folder = $this->dokumentasi_model;
    //    $validation = $this->form_validation;
    //    $validation->set_rules($folder->rules());

    //    if ($validation->run()) {
    //        $folder->save();
    //        $this->session->set_flashdata('success', 'Berhasil disimpan');
    //    }

    //    $this->load->view("dokumentasi/index/new_form");
    //}


    
