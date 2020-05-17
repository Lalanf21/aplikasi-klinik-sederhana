<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_controller{
    
    public $table   = 'tbl_kategori';
    public $view    = 'admin/kategori/view';
    public $add     = 'admin/kategori/form_add';
    public $edit    = 'admin/kategori/form_edit';

    public function __construct(){
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('session');
    }

    public function index(){
        $sort = 'id_kategori ASC';
        $data['query']  = $this->logic->get_all($this->table,$sort,3);
        $data['konten'] = $this->view;
        $this->load->view('template',$data);
    }

    public function form_add(){

        $data['konten'] = $this->add;
        $this->load->view('template',$data);
    }

    public function form_edit($id){

        $where['id_kategori'] = $id;
        $data['query']  = $this->logic->require_get($this->table,$where);
        $data['konten'] = $this->edit;
        $this->load->view('template',$data);
    }

    public function add(){

        $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('kategori',true))));

        $data = array(
                        'kategori'  => $kategori, 
                    );
        $row = $this->logic->require_get($this->table,$data);

        if ($row->num_rows() > 0) {
            $this->session->set_flashdata('alert','<p class="alert alert-warning">Data sudah tersedia</p>');
            redirect('tambah-kategori');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $this->logic->add($this->table,$data);
            redirect('kategori');
        }
    }

    public function edit(){

        $id_kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('id',true))));
        $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('kategori',true))));

        $data = array(
                        'kategori'  => $kategori, 
                    );

        $id['id_kategori'] = $id_kategori;
        $this->logic->update($this->table,$data,$id);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kategori');
    }

    public function delete($id){
        $where['id_kategori'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('kategori');
    }

    public function search()
    {
        $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $search = [
            'kategori' => $kategori
        ];

        $data['query'] = $this->logic->search($this->table, $search);

        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

}