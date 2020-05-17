<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_medis extends CI_controller
{

    public $table   = 'tbl_rekam';
    public $view    = 'admin/rekam/view';
    public $add     = 'admin/rekam/form_add';
    public $edit    = 'admin/rekam/form_edit';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->db->select('tbl_pendaftaran.nik_pegawai,tbl_pasien.nama_pasien,alamat,tbl_rekam.tanggal,diagnosa');
        $this->db->from($this->table);
        $this->db->join('tbl_pendaftaran','tbl_pendaftaran.no_pendaftaran = tbl_rekam.no_pendaftaran');
        $this->db->join('tbl_pasien','tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $data['query'] = '';
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add()
    {

        $data['konten'] = $this->add;
        $this->load->view('template', $data);
    }

    public function form_edit($id)
    {
        $where['id_rekam'] = $id;
        $this->db->select('tbl_pendaftaran.nik_pegawai,keluhan,tbl_pasien.nama_pasien,no_ktp,alamat,tbl_rekam.*');
        $this->db->from($this->table);
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_rekam.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $this->db->where($where);
        $data['query'] = $this->db->get()->row_array();
        // var_dump($data['query']);die;
        $data['konten'] = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    {
        $this->form_validation->set_message('in_list', 'silahkan pilih option dahulu !');
        $this->form_validation->set_message('required', 'Wajib di isi !');

        if ($this->form_validation->run('rekam') == false) {
            $this->form_add();
        } else {
            $tanggal = addslashes(htmlspecialchars(htmlentities($this->input->post('tanggal', true))));
            $diagnosa = addslashes(htmlspecialchars(htmlentities($this->input->post('diagnosa', true))));
            $rujukan = addslashes(htmlspecialchars(htmlentities($this->input->post('rujukan', true))));
            $rs = addslashes(htmlspecialchars(htmlentities($this->input->post('rumah_sakit', true))));
            $poli = addslashes(htmlspecialchars(htmlentities($this->input->post('poli', true))));
            $no_daftar = addslashes(htmlspecialchars(htmlentities($this->input->post('no_pendaftaran', true))));

            
            $data = array(
                'no_pendaftaran' => $no_daftar,
                'tanggal'               => $tanggal,
                'diagnosa'              => $diagnosa,
                'rujukan'               => $rujukan,
                'rumah_sakit_tujuan'    => $rs,
                'poli_tujuan'           => $poli
            );

            $where['no_pendaftaran'] = $no_daftar;

            $row = $this->logic->require_get($this->table, $where);

            if ($row->num_rows() > 0) {
                $this->session->set_flashdata('alert', '<p class="alert alert-warning">Data sudah tersedia</p>');
                redirect('tambah-rekam');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->logic->add($this->table, $data);
                redirect('rekam-medis');
            }
        }
    }

    public function edit()
    {

        $id_rekam = addslashes(htmlspecialchars(htmlentities($this->input->post('id', true))));
        $diagnosa = addslashes(htmlspecialchars(htmlentities($this->input->post('diagnosa', true))));
        $rujukan = addslashes(htmlspecialchars(htmlentities($this->input->post('rujukan', true))));
        $rs = addslashes(htmlspecialchars(htmlentities($this->input->post('rumah_sakit', true))));
        $poli = addslashes(htmlspecialchars(htmlentities($this->input->post('poli', true))));

        $data = array(
            'diagnosa'     => $diagnosa,
            'rujukan'             => $rujukan,
            'rumah_sakit_tujuan'             => $rs,
            'poli_tujuan' =>$poli
        );

        $id['id_rekam'] = $id_rekam;
        $this->logic->update($this->table, $data, $id);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('rekam-medis');
    }

    public function delete($id)
    {
        $where['id_rekam'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('rekam-medis');
    }

    public function search()
    {
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $ktp = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));


        $data = [
            'nama_pasien' => $nama,
            'no_ktp' => $ktp
        ];
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_rekam.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $this->db->like($data);
        $this->db->or_like($data);
        $data['query'] = $this->db->get();
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function get_auto() {
        $where['tgl_daftar'] = date('Y-m-d');
        $this->db->select('tbl_pendaftaran.no_pendaftaran,keluhan, tbl_pasien.nama_pasien,alamat,no_ktp');
        $this->db->from('tbl_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien = tbl_pendaftaran.kd_pasien');
        $this->db->like('nama_pasien', $_GET['term'], 'both');
        $this->db->where($where);
        $query = $this->db->get()->result();

        foreach ($query as $row)
            $hasil[] = [
                'label' => $row->nama_pasien,
                'no_daftar' => $row->no_pendaftaran,
                'keluhan' => $row->keluhan,
                'no_ktp' => $row->no_ktp,
                'alamat' => $row->alamat
            ];

        echo json_encode($hasil);
    }
}
