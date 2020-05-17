<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_controller{
    
    public $table   = 'tbl_user';
    public $view    = 'admin/user/view';
    public $add     = 'admin/user/form_add';
    public $edit    = 'admin/user/form_edit';

    public function __construct(){
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('form_validation');
    }

    public function index(){
        $sort = 'id_user DESC';
        $data['query']  = $this->logic->get_all($this->table,$sort,10);
        $data['konten'] = $this->view;
        $this->load->view('template',$data);
    }

    public function page(){
        $data['pasien'] = $this->db->count_all_results('tbl_pasien');
        $data['obat'] = $this->db->count_all_results('tbl_obat');
        $data['user'] = $this->db->count_all_results('tbl_user');
        $data['dokter'] = $this->db->where('jabatan','dokter')->count_all_results('tbl_pegawai');
        $data['konten'] = 'main_page';
        $this->load->view('template',$data);   
    }

    public function form_add(){

        $data['select'] = $this->logic->get_all('tbl_kategori');
        $data['konten'] = $this->add;
        $this->load->view('template',$data);
    }
    
    public function form_edit($id){
        $where['id_user'] = $id;
        $data['query']  = $this->logic->require_get($this->table,$where);
        $data['select'] = $this->logic->get_all('tbl_kategori');
        $data['konten'] = $this->edit;
        $this->load->view('template',$data);
    }

    public function add(){
        $this->form_validation->set_message('alpha', 'silahkan pilih option dahulu !');

        if ($this->form_validation->run('user') === false) {
            $this->form_add();
        } else {
            $user = addslashes(htmlspecialchars(htmlentities($this->input->post('username',true))));
            $pass = addslashes(htmlspecialchars(htmlentities($this->input->post('password',true))));
            $level = addslashes(htmlspecialchars(htmlentities($this->input->post('level',true))));
            $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('kategori',true))));
    
            $data = array(
                            'username'  => $user,
                            'password'  => $pass,
                            'level'     => $level,
                            'kategori'  => $kategori 
                        );
            $row = $this->logic->require_get($this->table,$data);
    
            if ($row->num_rows() > 0) {
                $this->session->set_flashdata('alert','<p class="alert alert-warning">Data sudah tersedia</p>');
                redirect('tambah-user');
            }else{
                $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->logic->add($this->table,$data);
                redirect('user');
            }
        }

    }

    public function edit(){

        $id_user = addslashes(htmlspecialchars(htmlentities($this->input->post('id',true))));
        $user = addslashes(htmlspecialchars(htmlentities($this->input->post('username',true))));
        $pass = addslashes(htmlspecialchars(htmlentities($this->input->post('password',true))));
        $level = addslashes(htmlspecialchars(htmlentities($this->input->post('level',true))));
        $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('kategori',true))));
        $status = addslashes(htmlspecialchars(htmlentities($this->input->post('status',true))));

        $data = array(
                        'username'  => $user,
                        'password'  => $pass,
                        'level'     => $level,
                        'kategori'  => $kategori,
                        'status'    => $status 
                    );
        $id['id_user'] = $id_user;
        $this->logic->update($this->table,$data,$id);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('user');
    }

    public function delete($id){
        $where['id_user'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('user');
    }

    public function search() {
        $user = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $level = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        
        $search = [
            'username' => $user,
            'kategori' => $kategori,
            'level'    => $level
        ];
        
        $data['query'] = $this->logic->search($this->table, $search);
        
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

}