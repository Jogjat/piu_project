<?php

/**
 * Class Logbook
 * @property Logbook $logbook
 * @property Logbook_model $logbook_model
 * @property DT_Logbook_model $dt
 */
class Logbook extends MY_Controller
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
        $this->load->library( array( 'ion_auth', 'form_validation' ) );
        $this->form_validation->set_error_delimiters( $this->config->item( 'error_start_delimiter', 'ion_auth' ), $this->config->item( 'error_end_delimiter', 'ion_auth' ) );
        $this->load->model('logbook/logbook_model');
        $this->load->model('logbook/dt_logbook_model', 'dt');
        $this->load->model( 'auth/ion_auth_model', 'ion_auth_model' );
        $this->load->helper(array('form_helper','url','modal_helper','bs_helper'));

    }

    public function index()
    {
        $data['title'] = 'Logbook';
        $data['logbook'] = 'active';
        $data['logbooks'] = $this->logbook_model->logbooks()->result();

        $this->template->main('logbook/index', $data);
    }

    public function fetch_data()
    {
        $fetch_data = $this->dt->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $row->logbook_name;
            $sub_array[] = $row->logbook_name;
            $sub_array[] = $row->logbook_name;
            $sub_array[] = $row->logbook_name;
            $sub_array[] = $row->logbook_name;
        
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
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/create');
        }else{
            $this->template->main('logbook/create');
        }
    }
    public function delete()
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/delete');
        }else{
            $this->template->main('logbook/delete');
        }
    }
    public function download()
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/download');
        }else{
            $this->template->main('logbook/download');
        }
    }
    public function edit()
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/edit');
        }else{
            $this->template->main('logbook/edit');
        }
    }
    public function preview()
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/preview');
        }else{
            $this->template->main('logbook/preview');
        }
    }
    public function share()
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/share');
        }else{
            $this->template->main('logbook/share');
        }
    }
}