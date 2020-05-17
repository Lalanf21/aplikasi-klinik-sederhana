<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_controller{
    
    public $table   = 'tbl_detail_spesialis';
    public $view    = 'admin/detail/view';
    public $add     = 'admin/detail/form_add';
    public $edit    = 'admin/detail/form_edit';

    public function __construct(){
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('session');
    }

    public function index(){
        $sort = 'id_detail DESC';
        $data['query']  = $this->logic->get_all($this->table,$sort,2);
        $data['konten'] = $this->view;
        $this->load->view('template',$data);
    }

    public function form_add(){

        $join = array($this->table => $this->table.".id_kategori = tbl_kategori.id_kategori");
        $require_join =array($this->table => $this->table.".nik = tbl_pegawai.nik");
        $where['jabatan']   = 'dokter';
        $data['nama'] = $this->logic->require_join('tbl_pegawai',$require_join,'*',$where);
        $data['kategori']  = $this->logic->join('tbl_kategori',$join,'tbl_kategori.kategori');
        $data['konten'] = $this->add;
        $this->load->view('template',$data);
    }

    public function form_edit($id){

        $where['id_obat'] = $id;
        $data['jenis']  = $this->logic->get_all('tbl_jenis_obat');
        $data['query']  = $this->logic->require_get($this->table,$where);
        $data['konten'] = $this->edit;
        $this->load->view('template',$data);
    }

    public function add(){

        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama_obat',true))));
        $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat',true))));
        $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('dosis',true))));
        $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('harga',true))));

        $data = array(
                        'nama_obat'     => $nama,
                        'jenis_obat'    => $jenis,
                        'dosis'         => $dosis,
                        'harga'         => $harga
                    );
        $row = $this->logic->require_get($this->table,$data);

        if ($row->num_rows() > 0) {
            $this->session->set_flashdata('alert','<p class="alert alert-warning">Data sudah tersedia</p>');
            redirect('tambah-obat');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $this->logic->add($this->table,$data);
            redirect('obat');
        }
    }

    public function edit(){

        $id_obat = addslashes(htmlspecialchars(htmlentities($this->input->post('id',true))));
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama_obat',true))));
        $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat',true))));
        $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('dosis',true))));
        $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('harga',true))));

        $data = array(
                        'nama_obat'     => $nama,
                        'jenis_obat'    => $jenis,
                        'dosis'         => $dosis,
                        'harga'         => $harga
                    );
        $id['id_obat'] = $id_obat;
        $this->logic->update($this->table,$data,$id);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('obat');
    }

    public function delete($id){
        $where['id_obat'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('obat');
    }

}