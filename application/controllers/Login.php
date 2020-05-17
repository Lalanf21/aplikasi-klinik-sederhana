<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('logic');
    }

    public function index()
    {
        $data['title'] = 'Please Login';
        $this->load->view('login/login_panel', $data);
    }

    public function process($param = null)
    {

        if ($param == 'login') {
            $user = htmlspecialchars(htmlentities($this->input->post('username', TRUE), ENT_NOQUOTES), ENT_NOQUOTES);
            $pass = htmlspecialchars(htmlentities($this->input->post('password', TRUE), ENT_NOQUOTES), ENT_NOQUOTES);

            $data = array(
                'username' => $user,
                'password' => $pass
            );
            $query = $this->logic->require_get('tbl_user', $data)->row_array();

            if (!$query) {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Username dan Password tidak sesuai !!!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect(base_url());
            } else {
                    $sess['username']   = $query['username'];
                    $sess['level']      = $query['level'];
                    $sess['kategori']   = $query['kategori'];

                    $this->session->set_userdata($sess);
                

                if ($this->session->userdata('level') == 'superadmin' || $this->session->userdata('level') == 'admin') {
                    redirect('dashboard');
                } elseif ($this->session->userdata('level') == 'dokter') {
                    redirect('resep');
                } elseif ($this->session->userdata('level') == 'apoteker') {
                    redirect('resep');
                } elseif ($this->session->userdata('level') == 'administrasi') {
                    redirect('pendaftaran');
                }
            }
        } //if close
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
