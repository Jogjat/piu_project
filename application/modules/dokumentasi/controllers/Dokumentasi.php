<?php
/**
* Class Dokumentasi
* @property Dokumentasi $dokumentasi
* @property Dokumentasi_model $dokumentasi_model
*/
class Dokumentasi extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->load->model('dokumentasi/dokumentasi_model');
        $this->load->model('dokumentasi/dt_dokumentasi_model','dt');
        $this->load->helper('form_helper');
        $this->load->helper('modal_helper');
        $this->load->helper('url');
        $this->load->library('upload');
    }

    public function index(){
        $data['title'] = 'Dokumentasi';
        $data['dokumentasi'] = 'active';
        $data['folder'] = $this->dokumentasi_model->folder()->result();
        
        $this->template->main('dokumentasi/index',$data);
    }

    public function fetch_data() {
        $fetch_data = $this->dt->make_datatables();
        $data       = array();

        foreach ( $fetch_data as $row ) {
            $sub_array   = array();
            $sub_array[] = $row->folder_name;
            $sub_array[] = $row->create_date;
            $sub_array[] = ajax_modal( 'dokumentasi/edit/' . $row->id_folder,'Edit', array('warning', 'pencil') ) . ' ' . ajax_modal( 'dokumentasi/delete/' . $row->id_folder, 'Delete', array(
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


    public function subfolder($id){
        $data=array(
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active',
            'data' => $this->dokumentasi_model->get_subfolder($id)->result()
        );
        $this->template->main('dokumentasi/subfolder',$data);
    }

    public function create(){
        if(count($_POST) > 0){
        $data = array(
            'id_folder' => $this->input->post('id_folder'),
            'folder_name' => $this->input->post('folder_name'),
            'create_date' => $this->input->post('create_date'),
            'parent' => 0,
            'id_user' => $this->input->post('id_user')
        );
        $this->dokumentasi_model->create($data);
        $this->session->set_flashdata('notice','Folder added successfully');
        redirect('dokumentasi/index');
        }
        else{
        $this->load->view("dokumentasi/tambah");
        }
    }

    public function create_subfolder(){
        if(count($_POST) > 0){
        $data = array(
            'id_folder' => $this->input->post('id_folder'),
            'folder_name' => $this->input->post('folder_name'),
            'create_date' => $this->input->post('create_date'),
            'parent' => $this->uri->segment(3),
            'id_user' => $this->input->post('id_user')
        );
        $this->dokumentasi_model->create($data);
        $this->session->set_flashdata('notice','Folder added successfully');
        redirect($_SERVER["HTTP_REFERER"]);
        }
        else{
        $this->load->view("dokumentasi/tambah_subfolder");
        }
    }

    // public function update_folder()
    // {
    //     $updated_data = array(
    //         'folder_name' => $this->input->post('folder_name')
    //     );
    //     $this->dokumentasi_model->update_folder($id_folder, $updated_data);
    //     echo 'Folder Updated';
    // }

    public function edit($id){
        if(count($_POST) > 0){
            $data = array(
                'id_folder' => $this->input->post('id_folder'),
                'folder_name' => $this->input->post('folder_name'),
                // 'create_date' => $this->input->post('create_date'),
                // 'parent' => $this->input->post('parent'),
                // 'id_user' => $this->input->post('id_user')
            );
            $this->dokumentasi_model->edit($data);
            $this->session->set_flashdata('notice','Folder Edited Successfully');
            redirect($_SERVER["HTTP_REFERER"]);
            }
        else{
            $data = array(
                'dokumentasi'=> $this->dokumentasi_model->get_edit($id)->row() ,
                'user'=>$this->dokumentasi_model->get_user()->result()
            );
            $this->load->view('dokumentasi/edit',$data);
        }
    }

    public function delete($id){
        if(count($_POST) > 0 ){
            $this->dokumentasi_model->delete($id);
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus</div>');
            redirect($_SERVER["HTTP_REFERER"]);
        }
        else{
         $data = array(
            'judul'=> 'contoh',
            'uri'=>'/dokumentasi/delete/'.$id
        );
        $this->load->view('modals/delete',$data);
        }
    }

    public function upload(){
        $this->load->view("dokumentasi/upload");
    }

    public function do_upload(){
          $data = array();

          //Count total files
          $filesCount = count($_FILES['files']['name']);
     
          //Looping all files
          for($i=0; $i < $filesCount; $i++){
              //Define new $_FILES array - $_FILES['file']
              $_FILES['file']['name'] = $_FILES['files']['name'][$i];
              $_FILES['file']['type'] = $_FILES['files']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
              $_FILES['file']['error'] = $_FILES['files']['error'][$i];
              $_FILES['file']['size'] = $_FILES['files']['size'][$i];

              //Set preference
              $config['upload_path']          = './uploads/';
              $config['allowed_types']        = 'jpeg|jpg|pdf';
              $config['max_size']             = 5000; //in kb

              //Load upload library
              $this->load->library('upload', $config);
              $this->upload->initialize($config);

              // File upload
              if($this->upload->do_upload('dokumentasi_model')){
                // Get data about the file
                $fileData = $this->upload->data();
                $uploadData[$i]['doc_name'] = $fileData['file_name'];
                // $uploadData = $this->upload->data();
                // $filename = $uploadData['file_name'];

                // Initialize array
                // $data['filenames'][] = $filename;
              }
            }

            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->dokumentasi_model->uploadFiles($uploadData);
                
                // Upload status message
                // $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('notice','Folder Edited Successfully');
                redirect($_SERVER["HTTP_REFERER"]);
            }
            $this->session->set_flashdata('warning','Failed');
                redirect($_SERVER["HTTP_REFERER"]);
          }
            // if ( ! $this->upload->do_upload('upload_file')){             
            //     $this->session->set_flashdata('warning','Failed');
            //     redirect($_SERVER["HTTP_REFERER"]);
            //   }
            //   else{
            //     $data = array('upload_data' => $this->upload->data());
            //     $this->session->set_flashdata('notice','Folder Edited Successfully');
            //     redirect($_SERVER["HTTP_REFERER"]);
            //     }
        // }

    }