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

    public function index()
    {
        $data = array(
            'dokumentasi'   => 'active',
            'title'         => 'Dokumentasi'
        );

        $this->template->main('dokumentasi/index',$data);
    }

    public function tambah()
    {
        $data = array(
            'dokumentasi'   => 'active',
            'title'         => 'Tambah Dokumentasi'
        );

        $this->template->main('dokumentasi/tambah',$data);
    }

}