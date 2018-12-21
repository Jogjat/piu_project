<?php

/**
 * Class Dokumentasi
 * @property Dokumentasi $dokumentasi
 * @property Dokumentasi_model $dokumentasi_model
 * @property DT_Dokumentasi_Model $dt
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
        $this->load->model('dokumentasi/dt_dokumentasi_model', 'dt');
        $this->load->helper(array('form_helper', 'modal_helper', 'bs_helper', 'url'));
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Dokumentasi';
        $data['dokumentasi'] = 'active';
        $data['folder'] = $this->dokumentasi_model->folder()->result();

        $this->template->main('dokumentasi/index', $data);
    }

    public function fetch_data()
    {
        $fetch_data = $this->dt->make_datatables();
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<a href="' . base_url('dokumentasi/subfolder') . '/' . $row->id_folder . '">' . $row->folder_name . '</a>';
            $sub_array[] = $row->create_date;
            $sub_array[] = ajax_modal('dokumentasi/edit/' . $row->id_folder, 'Edit', array('warning', 'pencil')) . ' ' . ajax_modal('dokumentasi/delete/' . $row->id_folder, 'Delete', array(
                    'danger',
                    'trash'
                ));
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


    public function subfolder($id)
    {
        $data = array(
            'title'       => 'Dokumentasi',
            'dokumentasi' => 'active',
            'data'        => $this->dokumentasi_model->get_subfolder($id)->result(),
            'bc'          => $this->dokumentasi_model->get_bc($id),
            'id'          => $id
        );
        $this->template->main('dokumentasi/subfolder', $data);
    }

    public function create()
    {
        if (count($_POST) > 0) {
            $data = array(
                'folder_name' => $this->input->post('nama_folder'),
                'parent'      => 0,
                'id_user'     => $this->ion_auth->user()->row()->id
            );
            $this->dokumentasi_model->create($data);
            $this->session->set_flashdata('notice', 'Berhasil menambah Folder Baru');
            redirect('dokumentasi/index');
        } else {
            $this->load->view("dokumentasi/tambah");
        }
    }

    public function get_uri()
    {
        $parent = $this->uri->segment(3);
        return $parent;
    }

    public function create_subfolder($id)
    {
        if (count($_POST) > 0) {
            $data = array(
                'folder_name' => $this->input->post('nama_folder'),
                'parent'      => $id,
                'id_user'     => $this->ion_auth->user()->row()->id
            );
            $this->dokumentasi_model->create($data);
            $this->session->set_flashdata('notice', 'Berhasil menambah Folder Baru');
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
            $data = array('id' => $id);

            $this->load->view("dokumentasi/tambah_subfolder", $data);
        }
    }

    public function edit($id)
    {
        if (count($_POST) > 0) {
            $data = array(
                'folder_name' => $this->input->post('folder_name'),
            );
            $this->dokumentasi_model->edit($id, $data);
            foreach ($this->input->post('akses') as $d){
                $this->dokumentasi_model->create_access_folder($this->input->post('id_folder'),$d);
            }
            $this->session->set_flashdata('notice', 'Berhasil mengubah Folder');
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
            $data = array(
                'dokumentasi' => $this->dokumentasi_model->get_edit($id)->row(),
                'users'        => $this->dokumentasi_model->get_user()->result()
            );
            $this->load->view('dokumentasi/edit', $data);
        }
    }

    public function delete($id)
    {
        if (count($_POST) > 0) {
            $this->dokumentasi_model->delete($id);
            $this->session->set_flashdata('notice', 'Berhasil Menghapus Folder');
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
            $data = array(
                'judul' => 'Folder '.$this->dokumentasi_model->get_folder($id)->row()->folder_name,
                'uri'   => '/dokumentasi/delete/' . $id
            );
            $this->load->view('modals/delete', $data);
        }
    }

    public function upload($id)
    {
        if (count($_POST) > 0) {
            $config['upload_path'] = BASEPATH . '/../storage/dokumen';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $this->load->library('upload', $config);


            // save data local storage
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
            } else {
                // ke db
                $data = array(
                    'doc_name'       => $this->input->post(''),
                    'id_folder'      => $this->input->post(''),
                    'upload_date'    => $this->input->post(''),
                    'id_user'        => $this->input->post(''),
                    'id_subkegiatan' => $this->input->post(''),
                );
                $this->dokumentasi_model->create_dokumen($data);

                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
            }

            $this->session->set_flashdata('notice', 'Berhasil menambah Dokumen Baru');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data = array(
                'id' => $id
            );
            $this->load->view("dokumentasi/upload", $data);
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
            $config['max_size'] = 5000; //in kb

            //Load upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            //upload file
            if ($this->upload->do_upload('file')) {
                // Get data about the file
                $fileData = $this->upload->data();
                $uploadData[$i]['doc_name'] = $fileData['file_name'];
                $uploadData[$i]['id_folder'] = $id;
                $uploadData[$i]['id_user'] = $this->ion_auth->user()->row()->id;
            }
        }

        if (!empty($uploadData)) {
            // Insert files data into the database
            $this->dokumentasi_model->uploadFiles($uploadData);
            $this->session->set_flashdata('notice', 'File Upload Successfully');
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->session->set_flashdata('warning', $this->upload->display_errors());
        redirect($_SERVER["HTTP_REFERER"]);
    }
}

