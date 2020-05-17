<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_controller{
    
    public function index(){
        $data['konten'] = 'dashboard_admin';
        $data['title'] = 'dashboard';
        $this->load->view('template', $data);
    }

    public function data_pasien()
    {
        $data['konten'] = 'admin/data_pasien';
        $data['title'] = 'Dashboard || Data Pasien';
        $this->load->view('template', $data);
    }

    public function data_dokter()
    {
        $data['konten'] = 'admin/data_dokter';
        $data['title'] = 'Dashboard || Data dokter';
        $this->load->view('template', $data);
    }

    public function data_obat()
    {
        $data['konten'] = 'admin/data_obat';
        $data['title'] = 'Dashboard||Data obat';
        $this->load->view('template', $data);
    }
}