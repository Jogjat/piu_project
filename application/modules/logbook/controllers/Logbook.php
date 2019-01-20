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
        $this->load->model('logbook/logbook_model');
        $this->load->model('logbook/dt_logbook_model', 'dt');
        $this->load->helper(array('form_helper','url','modal_helper','bs_helper','url'));
        $this->load->model( 'auth/ion_auth_model', 'ion_auth_model' );

    }

    public function index()
    {
        $data['title'] = 'Logbook';
        $data['logbook'] = 'active';
        $data['logbooks'] = $this->logbook_model->logbook()->result();

        $this->template->main('logbook/index', $data);
    }
    public function fetch_data()
    {
        $fetch_data = $this->dt->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $row->logbook_name;
            $sub_array[] = ajax_modal('logbook/share/' . $row->id_logbook, '', array('', 'share-alt
                ')).' ';
            $sub_array[] = $row->logbook_name;
            $sub_array[] = $row->access_date;
            $sub_array[] = ajax_modal('logbook/preview/' . $row->id_logbook, '', array('info', 'eye')) . ' ' . ajax_modal('logbook/edit/' . $row->id_logbook, '', array('warning', 'pencil')) . ' ' .ajax_modal('logbook/download/' . $row->id_logbook, '', array('success', 'download')) . ' ' . ajax_modal('logbook/delete/' . $row->id_logbook, '', array(
                    'danger','trash'));

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
    public function delete($id)
    {   if (count($_POST) > 0) {
            $this->logbook_model->delete($id);
            $this->session->set_flashdata('notice', 'Berhasil Menghapus Logbook');
            redirect($_SERVER["HTTP_REFERER"]);
        }
        else {
            if($this->logbook_model->get_logbook($id)->row()==null){
                redirect("logbook");
            }

            $data = array(
                'judul' => 'Logbook '.$this->logbook_model->get_logbook($id)->row()->logbook_name,
                'uri'   => '/logbook/delete/' . $id
            );
            if($this->input->is_ajax_request()){
            $this->load->view('modals/delete', $data);
            }else{
            $this->template->main('modals/delete', $data);
            }
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
    public function edit($id_logbook)
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/edit');
        }else{
            $this->template->main('logbook/edit');
        }
    }
    public function preview($id_logbook)
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/preview');
        }else{
            $this->template->main('logbook/preview');
        }
    }
    public function share($id_logbook)
    {
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/share');
        }else{
            $this->template->main('logbook/share');
        }
    }
}