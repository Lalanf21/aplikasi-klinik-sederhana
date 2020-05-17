<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_controller
{

    public $table   = 'tbl_pendaftaran';
    public $view    = 'admin/pendaftaran/view';
    public $add     = 'admin/pendaftaran/form_add';
    public $edit    = 'admin/pendaftaran/form_edit';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
        $this->load->helper('klinik');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->db->select('tbl_pendaftaran.*, tbl_pasien.nama_pasien, tbl_pegawai.nama_pegawai');
        $this->db->from($this->table);
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien ='.$this->table . '.kd_pasien');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.nik_pegawai ='.$this->table . '.nik_pegawai');
        $data['query'] = $this->db->get();
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add()
    {
        $data['q_pasien'] = $this->logic->get_all('tbl_pasien');
        $x['jabatan'] = 'dokter';
        $data['q_pegawai'] = $this->logic->require_get('tbl_pegawai',$x);
        $data['konten'] = $this->add;
        $this->load->view('template', $data);
    }

    public function form_edit($id)
    {
        $where['no_pendaftaran']   = $id;
        $data['query']      = $this->logic->require_get($this->table, $where);
        $data['q_pasien'] = $this->logic->get_all('tbl_pasien');
        $x['jabatan'] = 'dokter';
        $data['q_pegawai'] = $this->logic->require_get('tbl_pegawai', $x);
        $data['konten']     = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    {
        $this->form_validation->set_message('required','Silahkan isi Dahulu !');
        $this->form_validation->set_message('in_list','Silahkan Pilih Option Dahulu !');
        $this->form_validation->set_message('alpha','Silahkan Pilih Option Dahulu !');

        if ( $this->form_validation->run('pendaftaran') == false ) {
            $this->form_add();
        } else{
            $no_pendaftaran = addslashes(htmlspecialchars(htmlentities($this->input->post('no_daftar'))));
            $nm_pegawai = addslashes(htmlspecialchars(htmlentities($this->input->post('nm_pegawai'))));
            $nm_pasien = addslashes(htmlspecialchars(htmlentities($this->input->post('nm_pasien'))));
            $tanggal = addslashes(htmlspecialchars(htmlentities($this->input->post('tgl_daftar'))));
            $keluhan = addslashes(htmlspecialchars(htmlentities($this->input->post('keluhan'))));
            $status = addslashes(htmlspecialchars(htmlentities($this->input->post('status'))));
            $no_urut = noRegistrasiotomatis();
            $data = [
                'no_pendaftaran' => $no_pendaftaran,
                'nik_pegawai'=>$nm_pegawai,
                'kd_pasien' => $nm_pasien,
                'tgl_daftar' => $tanggal,
                'keluhan' => $keluhan,
                'status' => $status,
                'no_urut' => $no_urut
            ];

            $where['no_pendaftaran']   =   $no_pendaftaran;
            $q = $this->logic->require_get($this->table, $where);
            if ($q->num_rows() > 0) {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data sudah tersedia</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('pendaftaran');
            } else {
                $this->logic->add($this->table, $data);
                $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil disimpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('pendaftaran');
            }
        }
    }

    public function edit()
    {
        $no_pendaftaran = addslashes(htmlspecialchars(htmlentities($this->input->post('no_daftar'))));
        $nm_pegawai = addslashes(htmlspecialchars(htmlentities($this->input->post('nm_pegawai'))));
        $nm_pasien = addslashes(htmlspecialchars(htmlentities($this->input->post('nm_pasien'))));
        $tanggal = addslashes(htmlspecialchars(htmlentities($this->input->post('tgl_daftar'))));
        $keluhan = addslashes(htmlspecialchars(htmlentities($this->input->post('keluhan'))));
        $status = addslashes(htmlspecialchars(htmlentities($this->input->post('status'))));
        $no_urut = noRegistrasiotomatis();
        $data = [
            'no_pendaftaran' => $no_pendaftaran,
            'nik_pegawai' => $nm_pegawai,
            'kd_pasien' => $nm_pasien,
            'tgl_daftar' => $tanggal,
            'keluhan' => $keluhan,
            'status' => $status,
            'no_urut' => $no_urut
        ];

        $id['no_pendaftaran'] = $no_pendaftaran;
        $this->logic->update($this->table, $data, $id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pendaftaran');
    }

    public function delete($id)
    {
        $where['no_pendaftaran'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('pendaftaran');
    }

    public function search()
    {
        $pasien = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $tgl = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $keluhan = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $search = [
            'tbl_pasien.nama_pasien'   => $pasien,
            'tgl_daftar'        => $tgl,
            'keluhan'           => $keluhan
        ];

        $this->db->select('tbl_pendaftaran.*, tbl_pasien.nama_pasien, tbl_pegawai.nama_pegawai');
        $this->db->from($this->table);
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien =' . $this->table . '.kd_pasien');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.nik_pegawai =' . $this->table . '.nik_pegawai');
        $this->db->like($search);
        $this->db->or_like($search);
        
        $data['query'] = $this->db->get();
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function getauto()
    {
        $this->db->select('tbl_pendaftaran.*, tbl_pasien.nama_pasien');
        $this->db->from($this->table);
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien =' . $this->table . '.kd_pasien');
        $this->db->like('nama_pasien', $_GET['term'], 'both');
        $query = $this->db->get()->result();
        
        foreach ($query as $row)
        $hasil[] = [
            'label' => $row->nama_pasien,
            'no_daftar' => $row->no_pendaftaran
        ];

        echo json_encode($hasil);

        // var_dump($hasil);
    }
}
