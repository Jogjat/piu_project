<?php
/**
* Class Dokumentasi
* @property Dokumentasi $dokumentasi
* @property Dokumentasi_model $dokumentasi_model
*/
class Dokumentasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->load->model('dokumentasi/dokumentasi_model');
    }

    public function index(){
        $data=array(
            'data' => $this->dokumentasi_model->folder(),
            'date'=> 'Y-m-d',
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active'
        );
        $data["fetch_data"] = $this->dokumentasi_model->fetch_data();
        $this->template->main('dokumentasi/index',$data);
    }

    public function subfolder(){
        $data=array(
            'data' => $this->dokumentasi_model->subfolder(),
            'date'=> 'Y-m-d',
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active'
        );
        $data["fetch_data"] = $this->dokumentasi_model->fetch_data();
        $this->template->main('dokumentasi/subfolder',$data);
    }

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


    public function update_folder()
    {
        $updated_data = array(
            'folder_name' => $this->input->post('folder_name')
        );
        $this->dokumentasi_model->update_folder($id_folder, $updated_data);
        echo 'Folder Updated';
    }

    public function edit($id){
        $data = array(
            'dokumentasi'=> $this->dokumentasi_model->get_edit($id)->row() ,
            'user'=>$this->dokumentasi_model->get_user()->result()
        );
        $this->load->view('dokumentasi/edit',$data);
    }





}