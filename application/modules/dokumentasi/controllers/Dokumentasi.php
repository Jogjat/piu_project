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
            'data' => $this->dokumentasi_model->folder(),
            'date'=> 'Y-m-d',
            'title' => 'Dokumentasi',
            'dokumentasi' => 'active'
        );
        $data["fetch_data"] = $this->dokumentasi_model->fetch_data();
        $this->template->main('dokumentasi/index',$data);
    }


    // public function fetch_single_folder()
    // {
    //     $output = array();
    //     $data = $this->dokumentasi_model->edit_dokumentasi($_POST["id_folder"]);
    //     foreach($data as $row)
    //     {
    //         $output['folder_name'] = $row->folder_name;
    //     }
    //     echo json_encode($output);
    // }

    // public function edit($id_folder)
    // {
    //         $updated_data = array(
    //             'folder_name' => $this->input->post('folder_name')
    //         );
    //     $this->dokumentasi_model->edit_dokumentasi();
    // }

    // public function update()
    // {
    //     $id_folder = $this->input->post('id_folder');
    //     $folder_name = $this->input->post('folder_name');
    //     $data = array(
    //         // 'folder_name' => $this->input->post('folder_name')
    //         'folder_name' => $folder_name
    //     );
    //     $where = array(
    //         'id_folder' =>id
    //     );
    //     $this->dokumentasi_model->update_folder($where,$data,'piu.folder');
    // }
    
    // public function edit($id_folder){
    //     $where = array('id_folder' => $id_folder);
    //     $data['piu.folder'] = $this->Dokumentasi_model->edit_folder($where,'piu.folder')->result();
    //     $this->load->view('');
    // }

    public function user_action()
    {
        // if($_POST["action"] == "Add")
        // {
        //     $insert_data = array(
        //         'folder_name' => $this->input->post('folder_name')
        //     );
        // $this->dokumentasi_model->insert_folder($insert_data);
        // echo 'Folder Added';
        // }

        // if($_POST["action"] == "Edit")
        // {
            $updated_data = array(
                'folder_name' => $this->input->post('folder_name')
            );
            $this->dokumentasi_model->update_folder($this->input->post("id_folder"), $updated_data);
            echo 'Folder Updated';
        }

        public function edit($id){
            $data=array(
               'dokumentasi'=> $this->dokumentasi_model->get_dokumentasi($id)->row() ,
               'user'=>$this->dokumentasi_model->get_user()->result()

            );
            // die(var_dump($data));
            $this->load->view('dokumentasi/edit',$data);
        }





}