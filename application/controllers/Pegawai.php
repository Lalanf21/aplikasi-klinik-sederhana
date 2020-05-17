<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_controller
{

    public $table   = 'tbl_pegawai';
    public $view    = 'admin/pegawai/view';
    public $add     = 'admin/pegawai/form_add';
    public $edit    = 'admin/pegawai/form_edit';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['query']  = $this->logic->join($this->table, 'tbl_kategori','*','tbl_kategori.id_kategori = tbl_pegawai.id_kategori','nama_pegawai ASC');
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add()
    {
        $data['q_kategori'] = $this->logic->get_all('tbl_kategori','id_kategori DESC');
        $data['konten'] = $this->add;
        $this->load->view('template', $data);
    }
    
    public function form_edit($id)
    {
        $d['nik_pegawai'] = $id;
        $data['query']  = $this->logic->require_get($this->table, $d);
        $data['select'] = $this->logic->get_all('tbl_kategori','id_kategori ASC');
        $data['konten'] = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    {
        $this->form_validation->set_message('in_list', 'silahkan pilih option dahulu');
        $this->form_validation->set_message('alpha', 'silahkan pilih option dahulu');
        $this->form_validation->set_message('required', 'silahkan isi dahulu !');

        if ($this->form_validation->run('pegawai') == false) {
            $this->form_add();
        } else {
            $no_id = addslashes(htmlspecialchars(htmlentities($this->input->post('no_id'))));
            $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama'))));
            $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('spesialis'))));
            $jabatan = addslashes(htmlspecialchars(htmlentities($this->input->post('jabatan'))));
            $biaya = addslashes(htmlspecialchars(htmlentities($this->input->post('biaya'))));
            $j_kelamin = addslashes(htmlspecialchars(htmlentities($this->input->post('j_kelamin'))));
            $tgl_lahir = addslashes(htmlspecialchars(htmlentities($this->input->post('tgl_lahir'))));
            $tmpt_lahir = addslashes(htmlspecialchars(htmlentities($this->input->post('tempat_lahir'))));
            $telepon = addslashes(htmlspecialchars(htmlentities($this->input->post('telepon'))));
            $alamat = addslashes(htmlspecialchars(htmlentities($this->input->post('alamat'))));

            $data = array(
                'nik_pegawai'                 => $no_id,
                'nama_pegawai'        => $nama,
                'gender'              => $j_kelamin,
                'jabatan'             => $jabatan,
                'id_kategori'         => $kategori,
                'biaya_pemeriksaan'   => $biaya,
                'tempat_lahir'        => $tmpt_lahir,
                'tgl_lahir'           => $tgl_lahir,
                'no_telp'             => $telepon,
                'alamat'              => $alamat
            );

            $where['nik_pegawai']   =   $no_id;
            $q = $this->logic->require_get($this->table, $where);
            if ($q->num_rows() > 0) {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data sudah tersedia</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('pegawai');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil disimpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->logic->add($this->table, $data);
                redirect('pegawai');
            }
        }
    
    }

    public function edit()
    {
        $kategori = addslashes(htmlspecialchars(htmlentities($this->input->post('spesialis'))));
        $no_id = addslashes(htmlspecialchars(htmlentities($this->input->post('no_id'))));
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama'))));
        $jabatan = addslashes(htmlspecialchars(htmlentities($this->input->post('jabatan'))));
        $biaya = addslashes(htmlspecialchars(htmlentities($this->input->post('biaya'))));
        $j_kelamin = addslashes(htmlspecialchars(htmlentities($this->input->post('j_kelamin'))));
        $tgl_lahir = addslashes(htmlspecialchars(htmlentities($this->input->post('tgl_lahir'))));
        $tmpt_lahir = addslashes(htmlspecialchars(htmlentities($this->input->post('tempat_lahir'))));
        $telepon = addslashes(htmlspecialchars(htmlentities($this->input->post('telepon'))));
        $alamat = addslashes(htmlspecialchars(htmlentities($this->input->post('alamat'))));

        $data = array(
            'nik_pegawai'                 => $no_id,
            'nama_pegawai'        => $nama,
            'gender'              => $j_kelamin,
            'jabatan'             => $jabatan,
            'id_kategori'         => $kategori,
            'biaya_pemeriksaan'   => $biaya,
            'tempat_lahir'        => $tmpt_lahir,
            'tgl_lahir'           => $tgl_lahir,
            'no_telp'             => $telepon,
            'alamat'              => $alamat
        );

        $id['nik_pegawai']   =   $no_id;
        $this->logic->update($this->table, $data, $id);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai');
    }

    public function delete($id)
    {
        $where['nik_pegawai'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pegawai');
    }

    public function search()
    {
        $nik = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $jabatan = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $spesialis = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $telepon = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $search = [
            'nik_pegawai'        => $nik,
            'nama_pegawai'       => $nama,
            'jabatan'    => $jabatan,
            'kategori'  => $spesialis,
            'no_telp'    => $telepon
        ];

        $data['query'] = $this->logic->search_join($this->table,'tbl_kategori',$search,'tbl_kategori.id_kategori = tbl_pegawai.id_kategori');

        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }
}
