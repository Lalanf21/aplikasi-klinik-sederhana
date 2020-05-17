<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_controller
{

    public function index()
    {
        $data['konten'] = 'dashboard_admin';
        $data['title'] = 'dashboard';
        $this->load->view('template', $data);
    }

    public function medis()
    {
        $data['konten'] = 'dokter/rekam_medis';
        $data['title'] = 'Dashboard || Rekam medis';
        $this->load->view('template', $data);
    }

    public function resep()
    {
        $data['konten'] = 'dokter/resep';
        $data['title'] = 'Dashboard || Resep obat';
        $this->load->view('template', $data);
    }

}
