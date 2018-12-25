<?php

/**
 * Class User
 * @property User $user
 * @property User_model $user_model
 * @property DT_User_model $dt
 */
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        if ($this->ion_auth->user()->row()->type != 'admin'){
            redirect('auth/login');
        }
        $this->load->model('user/user_model');
        $this->load->model('user/dt_user_model', 'dt');
        $this->load->helper(array('form_helper','url','modal_helper','bs_helper'));

        //$this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = 'active';

        $this->template->main('user/index', $data);
    }

    public function fetch_data()
    {
        $fetch_data = $this->dt->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $row->type;
            $sub_array[] = $row->username;
            $sub_array[] = $row->first_name;
            $sub_array[] = $row->last_name;
            $sub_array[] = $row->email;
            $sub_array[] = $row->phone;
            $sub_array[] = ajax_modal('user/edit/' . $row->id, 'Edit', array('warning', 'pencil')) . ' ' . ajax_modal('user/delete/' . $row->id, 'Hapus', array('danger', 'trash')) . ' ' . ajax_modal('user/detail/' . $row->id, 'Detail', array('info', 'info'));
            $data[] = $sub_array;
        }

        $output = array(
            'draw'            => intval($_POST['draw']),
            'recordsTotal'    => $this->dt->get_all_data(),
            'recordsFiltered' => $this->dt->get_filtered_data(),
            'data'            => $data
        );
        echo json_encode($output);

    }

    public function create()
    {
        //post form tambah folder
        if (count($_POST) > 0) {
            $data = array(
                'type'     => $this->input->post('tipe'),
                'username' => $this->input->post('nama_pengguna'),
                'first_name' => $this->input->post('nama_depan'),
                'last_name' => $this->input->post('nama_belakang'),
                'email'    => $this->input->post('email'),
                'phone' => $this->input->post('nomor_telepon'),
                'password' => $this->input->post('kata_sandi')
            );
            $this->user_model->create($data);
            $this->session->set_flashdata('notice', 'Data berhasil ditambahkan');
            redirect('user/index');
        } //klik button tambah folder
        else {
            $this->load->view("user/create");
        }
    }
    // public function edit(){
    //     $this->load->model('user_model');
    //     $id=$this->uri->segment(3);
    //     $data['user'= $this->'user_model'->user($id)->row();
    // }

    public function update_user($id)
    {
        $updated_data = array(
            'type'     => $this->input->post('type'),
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
        );
        $this->user_model->update_user($id, $updated_data);
        echo 'User Updated';
    }


    public function edit($id)
    {

        if (count($_POST) > 0) {
            $data = array(
                'id'       => $this->input->post('id'),
                'type'     => $this->input->post('type'),
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                // 'create_date' => $this->input->post('create_date'),
                // 'parent' => $this->input->post('parent'),
                // 'id_user' => $this->input->post('id_user')
            );
            $this->user_model->edit($data);
            $this->session->set_flashdata('notice', 'Folder Edited Successfully');
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
        
            $data = array(
                'user'  => $this->user_model->get_edit($id)->row(),
                'users' => $this->user_model->users($id)->result()
            );
            $this->load->view('user/edit', $data);
        }
    }
    public function detail($id) {

            $this->load->view('user/detail');
    }

}