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
        $data=array(
            'title' => 'User',
            'user' => 'active'
        );
        $this->template->main('user/tambah',$data);
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
            'user'=>$this->user_model->get_user()->result()
        );
        $this->template->main('user/tambah',$data);

    }





}