<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_obat extends CI_controller{
    
    public $table   = 'tbl_jenis_obat';
    public $view    = 'admin/jenis_obat/view';
    public $add     = 'admin/jenis_obat/form_add';
    public $edit    = 'admin/jenis_obat/form_edit';

    public function __construct(){
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('form_validation');
    }

    public function index(){
        $sort = 'id_jenis_obat DESC';
        $data['query']  = $this->logic->get_all($this->table,$sort,10);
        $data['konten'] = $this->view;
        $this->load->view('template',$data);
    }

    public function form_add(){

        $data['konten'] = $this->add;
        $this->load->view('template',$data);
    }

    public function form_edit($id){

        $where['id_jenis_obat'] = $id;
        $data['query']  = $this->logic->require_get($this->table,$where);
        $data['konten'] = $this->edit;
        $this->load->view('template',$data);
    }

    public function add(){
        $this->form_validation->set_message('alpha', 'Harus berupa huruf !');

        if( $this->form_validation->run('jenis_obat') == false  ){
            $this->form_add();
        } else {
            $jenis_obat = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat',true))));
            $keterangan = addslashes(htmlspecialchars(htmlentities($this->input->post('keterangan',true))));

            $data = array(
                            'jenis_obat'    => $jenis_obat,
                            'keterangan'     => $keterangan 
                        );
            $row = $this->logic->require_get($this->table,$data);

            if ($row->num_rows() > 0) {
                $this->session->set_flashdata('alert','<p class="alert alert-warning">Data sudah tersedia</p>');
                redirect('tambah-jenis_obat');
            }else{
                $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->logic->add($this->table,$data);
                redirect('jenis_obat');
            }
        }
    }

    public function edit(){

        $id_jenis_obat = addslashes(htmlspecialchars(htmlentities($this->input->post('id',true))));
        $jenis_obat = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat',true))));
        $keterangan = addslashes(htmlspecialchars(htmlentities($this->input->post('keterangan',true))));

        $data = array(
                        'jenis_obat'    => $jenis_obat,
                        'keterangan'    => $keterangan 
                    );

        $id['id_jenis_obat'] = $id_jenis_obat;
        $this->logic->update($this->table,$data,$id);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('jenis_obat');
    }

    public function delete($id){
        $where['id_jenis_obat'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('jenis_obat');
    }

    public function search() {
        $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $keterangan = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $data = [
            'jenis_obat' => $jenis,
            'keterangan' => $keterangan
        ];

        $data['query'] = $this->logic->search($this->table,$data);
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

}