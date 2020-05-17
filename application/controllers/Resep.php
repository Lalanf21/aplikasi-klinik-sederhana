<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_controller
{

    public $table   = 'tbl_resep';
    public $view    = 'admin/resep/view';
    public $add     = 'admin/resep/form_add';
    public $edit    = 'admin/resep/form_edit';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('form_validation');
        $this->load->library('cart');
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        if ($this->session->userdata('level') == 'dokter') {
            $where['kategori'] = $this->session->userdata('kategori');
            $this->db->where($where);
        }
        $this->db->limit(10);
        $data['query'] = $this->db->get();
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add()
    {
        $data['select'] = $this->logic->get_all('tbl_obat');
        $where['tgl_daftar'] = date('y-m-d');
        $data['pasien'] = $this->logic->require_join('tbl_pendaftaran','tbl_pasien','tbl_pasien.nama_pasien as pasien, tbl_pendaftaran.no_pendaftaran as no_daftar','tbl_pasien.kd_pasien = tbl_pendaftaran.kd_pasien',$where);
        $data['konten'] = $this->add;
        $this->load->view('template', $data);
    }
    
    public function form_edit($id)
    {
        $where['id_resep'] = $id;
        $this->db->select('tbl_pasien.nama_pasien as pasien, tbl_pendaftaran.no_pendaftaran as kd_daftar,tbl_resep.*');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien = tbl_pendaftaran.kd_pasien');
        $data['query'] = $this->db->get()->row_array();
        $data['obat'] = $this->logic->get_all('tbl_obat');
        $data['konten'] = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    { 
        $this->form_validation->set_message('alpha','Inputan hanya bisa berupa huruf');
        $this->form_validation->set_message('required','Harus di isi !');

        if ( $this->form_validation->run('resep') == false ){
            $this->form_add();
        } else{
            $no_daftar = $this->input->post('pasien', true);
            $diagnosa = addslashes(htmlspecialchars(htmlentities($this->input->post('diagnosa', true))));
            $tgl = addslashes(htmlspecialchars(htmlentities($this->input->post('tanggal', true))));
            $obat = $this->input->post('nama_obat[]', true);
            $aturan = $this->input->post('aturan_pakai[]', true);

            $hasil = implode(',', $obat);
            $hasil2 = implode(',', $aturan);
            $kategori = $this->session->userdata('kategori');
            $data = [
                'no_pendaftaran' => $no_daftar,
                'tanggal' => $tgl,
                'diagnosa' => $diagnosa,
                'nama_obat' => $hasil,
                'aturan_pakai' => $hasil2,
                'kategori'  => $kategori,
            ];
            $x = [
                'tanggal' => $tgl,
                'no_pendaftaran' => $no_daftar
            ];


            $row = $this->logic->require_get($this->table, $x);
            if ($row->num_rows() > 0) {
                $this->session->set_flashdata('alert', '<p class="alert alert-warning">Data sudah tersedia</p>');
                redirect('tambah-resep');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->logic->add($this->table, $data);
                redirect('resep');
            }
        }
    }

    public function edit()
    {

        $no_daftar = $this->input->post('pasien', true);
        $diagnosa = addslashes(htmlspecialchars(htmlentities($this->input->post('diagnosa', true))));
        $tgl = addslashes(htmlspecialchars(htmlentities($this->input->post('tanggal', true))));
        $obat = $this->input->post('nama_obat[]', true);
        $aturan = $this->input->post('aturan_pakai[]', true);

        $hasil = implode(',', $obat);
        $hasil2 = implode(',', $aturan);

        $data = [
            'no_pendaftaran' => $no_daftar,
            'tanggal' => $tgl,
            'diagnosa' => $diagnosa,
            'nama_obat' => $hasil,
            'aturan_pakai' => $hasil2,
        ];

        $id['no_pendaftaran'] = $no_daftar;
        $this->logic->update($this->table, $data, $id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('resep');
    }

    public function delete($id)
    {
        $where['no_pendaftaran'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('resep');
    }

    public function search() {
        $pasien = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $diagnosa = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $search = [
            'nama_pasien'    => $pasien,
            'diagnosa'       => $diagnosa,
        ];

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $this->db->like($search);
        $this->db->or_like($search);
        $data['query'] = $this->db->get();

        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    
}
