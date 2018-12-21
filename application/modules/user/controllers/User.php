<?php
/**
* Class Dokumentasi
* @property Dokumentasi $dokumentasi
* @property user_model $user_model
*/
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->load->model('user/user_model');
    }

    public function index(){
        $data=array(
            'data' => $this->user_model->user(),
            'date'=> 'Y-m-d',
            'title' => 'User',
            'user' => 'active'
        );
        $data["fetch_data"] = $this->user_model->fetch_data();
        $this->template->main('user/index',$data);
    }

    public function add(){
        if(count($_POST) >0){
            $data = array(
                'title' => 'User',
                'user' => 'active'
            );
            $this->user_model->add($data);
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> User Successfuly Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user/index');
        }
        else{
            $this->load->view("user/tambah");
        }
    }

    public function update_folder()
    {
        $updated_data = array(
            'folder_name' => $this->input->post('folder_name')
        );
        $this->user_model->update_folder($id_folder, $updated_data);
        echo 'Folder Updated';
    }

    public function edit($id){
        $data = array(
            'title' => 'User',
            'user' => 'active',
            'users'=>$this->user_model->get_user()->row()
        );
        $this->template->main('user/edit',$data);

    }





}