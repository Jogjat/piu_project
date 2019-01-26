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
        $this->load->library('upload');
        $this->load->library('pdf');

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
        //post form tambah folder
        if (count($_POST) > 0) {
            $data = array(
                'logbook_name'     => $this->input->post('nama_logbook'),
                'access_date'     => $this->input->post('tanggal_logbook'),
                'description' => $this->input->post('deskripsi')
            );
            $this->logbook_model->create($data);
            $this->session->set_flashdata('notice', 'Data berhasil ditambahkan');
            redirect('logbook/index');
        } //klik button tambah folder
        if($this->input->is_ajax_request()){
            $this->load->view('logbook/create');
        }else{
            $this->template->main('logbook/create');
        }
    }

    public function upload($id)
    {
        if (count($_POST) > 0) {
            $config['upload_path'] = BASEPATH . '/../storage/dokumen';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $this->load->library('upload', $config);


            // save data local storage
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
            } else {
                // ke db
                $data = array(
                    'attach_name'       => $this->input->post(''),
                    'id_logbook'      => $this->input->post(''),
                    'id_user'        => $this->input->post(''),
                );
                $this->logbook_model->create_dokumen($data);

                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
            }

            $this->session->set_flashdata('notice', 'Berhasil menambah Dokumen Baru');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = array(
                'id' => $id
            );
            $this->load->view("logbook/create", $data);
        }
    }

    public function do_upload($id)
    {
        $data = array();

        //Count total files
        $filesCount = count($_FILES['files']['name']);

        //Looping all files
        for ($i = 0; $i < $filesCount; $i++) {
            //Define new $_FILES array - $_FILES['file']
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];

            //Set preference
            $config['upload_path'] = BASEPATH . '/../storage/dokumen';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            // $config['max_size'] = 5000; //in kb

            $uploadData[$i]['attach_name'] = $_FILES['file']['name'];
            $uploadData[$i]['id_logbook'] = $id;
            $uploadData[$i]['id_user'] = $this->ion_auth->user()->row()->id;
            $config['file_name'] = $this->logbook_model->uploadFiles($uploadData[$i]);

            //Load upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            //upload file
            $this->upload->do_upload('file');

            //update extension
            $upload_data = $this->upload->data();
            $this->logbook_model->edit_document($config['file_name'], array('extension' => $upload_data['file_ext']));

        }

        if (!empty($uploadData)) {
            // Insert files data into the database
            $this->session->set_flashdata('notice', 'File Upload Successfully');
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->session->set_flashdata('warning', $this->upload->display_errors());
        redirect($_SERVER["HTTP_REFERER"]);
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
    public function edit($id)
    {

        if (count($_POST) > 0) {

            $data = array(
                'logbook_name'     => $this->input->post('nama_logbook'),
                'description' => $this->input->post('deskripsi')

            );
            $this->logbook_model->edit($id, $data);
            $this->session->set_flashdata('notice', 'Berhasil mengubah data logbook');
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
        
            $data = array(
                'logbook'  => $this->logbook_model->get_edit($id)->row()

            );
            if($this->input->is_ajax_request()){
                $this->load->view('logbook/edit', $data);
            }else{
                $this->template->main('logbook/edit', $data);
            }
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