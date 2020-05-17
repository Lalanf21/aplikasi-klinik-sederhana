<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_controller
{

    public $table   = 'tbl_pegawai';
    public $view    = 'admin/dokter/view';
    public $add     = 'admin/dokter/form_add';
    public $edit    = 'admin/dokter/form_edit';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
    }

    public function index()
    {

        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add()
    {

        $data['konten'] = $this->add;
        $this->load->view('template', $data);
    }

    public function form_edit()
    {

        $data['konten'] = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    { }
}
