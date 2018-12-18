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
            'folder' => $this->dokumentasi_model->folder()->result(),
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active'
        );
        $this->template->main('dokumentasi/index',$data);
    }

    public function subfolder($id){
        $data=array(
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active',
            'data' => $this->dokumentasi_model->get_subfolder($id)->result()
        );
        $this->template->main('dokumentasi/subfolder',$data);
    }

    public function tambah(){
        if(count($_POST) >0){
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
        else{
        $this->load->view("dokumentasi/tambah");
        }
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