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
        $this->load->model('user/user_model');
        $this->load->model('user/dt_user_model','dt');
        $this->load->helper('modal_helper');

        //$this->load->library('form_validation');
    }
    public function index() {
        $data['title']        = 'User';
        $data['user']         = 'active';

        $this->template->main('user/index', $data );
    }
    public function fetch_data() {
        $fetch_data = $this->dt->make_datatables();
        $data       = array();

        foreach ( $fetch_data as $row ) {
            $sub_array   = array();
            $sub_array[] = $row->type;
            $sub_array[] = $row->username;
            $sub_array[] = $row->email;
            $sub_array[] = ajax_modal( 'user/edit/' . $row->id,'Edit', array('warning', 'pencil') ) . ' ' . ajax_modal( 'user/delete/' . $row->id, 'Hapus', array(
                        'danger',
                        'trash'
                    ) );
            $data[] = $sub_array;
        }

        $output = array(
            'draw'            => intval( $_POST['draw'] ),
            'recordsTotal'    => $this->dt->get_all_data(),
            'recordsFiltered' => $this->dt->get_filtered_data(),
            'data'            => $data
        );
        echo json_encode( $output );

    }
    public function create(){
    	    //post form tambah folder
        if(count($_POST) > 0){
            //die(var_dump("test post"));
            $data = array(
            'type' => $this->input->post('type'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
        );
    	$this->user_model->create($data);
    	$this->session->set_flashdata('notice','Data berhasil ditambahkan');
        redirect('user/index');
    }
    //klik button tambah folder
    else{
        $this->load->view("user/create");
        }
    }
}