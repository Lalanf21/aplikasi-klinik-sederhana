<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_controller
{

    public $table   = 'tbl_pembayaran';
    public $view    = 'admin/pembayaran/view';
    public $add     = 'admin/pembayaran/form_add';
    public $edit    = 'admin/pembayaran/form_edit';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
        $this->load->helper('klinik');
    }

    public function index()
    {
        $where['tanggal'] = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_resep');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $this->db->where($where);
        $data['query'] = $this->db->get();
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add($id)
    {
        $jumlah = '';
        $query = $this->logic->require_get('tbl_resep', 'id_resep =' . $id)->result();

        foreach ($query as $k) {
            $daftar['no_pendaftaran'] = $k->no_pendaftaran;
            $qi = $this->logic->require_get('tbl_pendaftaran', $daftar);

            foreach ($qi->result() as $o) {
                $daf['kd_pasien'] = $o->kd_pasien;
                $qiu = $this->logic->require_get('tbl_pasien', $daf)->result();
            }
            foreach ($qi->result() as $y) {
                $pegawai['nik_pegawai'] = $y->nik_pegawai;
                $qu = $this->logic->require_get('tbl_pegawai', $pegawai);

                foreach ($qu->result() as $e) {
                    $biaya_dokter = $e->biaya_pemeriksaan;
                }
            }
        }
        foreach ($query as $k) {
            $dt = explode(',', $k->nama_obat);
        }
        for ($i = 0; $i < count($dt); $i++) {
            $where['nama_obat'] = $dt[$i];
            $k = $this->logic->require_get('tbl_obat', $where)->result();
            foreach ($k as $v) {
                $harga[] = $v->harga;
            }
        }
        $t = array_sum($harga);

        $total = $t + $biaya_dokter;
        $data['jumlah'] = $total;
        $data['query'] = $query;
        $data['qi'] = $qi;
        $data['qiu'] = $qiu;
        $data['qu'] = $qu;
        $data['konten'] = $this->add;
        $this->load->view('template', $data);

       
    }

    public function form_edit()
    {

        $data['konten'] = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    {
        $id_resep = addslashes(htmlspecialchars(htmlentities($this->input->post('id_resep', true))));
        $jumlah = addslashes(htmlspecialchars(htmlentities($this->input->post('total2', true))));
        $bayar = addslashes(htmlspecialchars(htmlentities($this->input->post('bayar', true))));
        $kembalian = addslashes(htmlspecialchars(htmlentities($this->input->post('kembalian', true))));

        $data = array(
            'no_bayar'      => getAutoNumber('tbl_pembayaran','no_bayar','INV',7),
            'id_resep'      => $id_resep,
            'total_harga'   => $jumlah,
            'total_bayar'   => $bayar,
            'kembalian'     => $kembalian,
            'tgl_bayar'     => date('Y-m-d')
        );
        
        $where['id_resep'] = $id_resep;
        $row = $this->logic->require_get($this->table, $where);

        if ($row->num_rows() > 0) {
            $this->session->set_flashdata('alert', '<p class="alert alert-warning">Data sudah tersedia</p>');
            redirect('list-pembayaran');
        } else {
            $this->logic->add($this->table, $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('list-pembayaran');
        }
    }

    public function delete($id)
    {
        $where['no_bayar'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('list-pembayaran');
    }

    public function search() {
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $search['nama_pasien'] = $nama;

        $this->db->select('*');
        $this->db->from('tbl_resep');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $this->db->like($search);
        $data['query'] = $this->db->get();
        $data['konten'] = 'admin/pembayaran/view';
        $this->load->view('template', $data);
    }

    public function search_list() {
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));

        $search['nama_pasien'] = $nama;

        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_resep', 'tbl_resep.id_resep = tbl_pembayaran.id_resep');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pegawai', 'tbl_pendaftaran.nik_pegawai = tbl_pegawai.nik_pegawai');
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien = tbl_pendaftaran.kd_pasien');
        $data['query'] = $this->db->get()->result();
        $data['konten'] = 'admin/pembayaran/view_list';
        $this->load->view('template', $data);
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->join('tbl_resep', 'tbl_resep.id_resep = tbl_pembayaran.id_resep');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pegawai', 'tbl_pendaftaran.nik_pegawai = tbl_pegawai.nik_pegawai');
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien = tbl_pendaftaran.kd_pasien');
        $data['query'] = $this->db->get()->result();
        // var_dump($data['query']); die;
        $data['konten'] = 'admin/pembayaran/view_list';
        $this->load->view('template', $data);

    }

    public function print($id) {
        $this->load->library('pdf');

        $where['no_bayar'] = $id;
        $this->db->select('tbl_pembayaran.*, tbl_pasien.nama_pasien,tbl_pegawai.nama_pegawai,biaya_pemeriksaan');
        $this->db->from('tbl_pembayaran');
        $this->db->where($where);
        $this->db->join('tbl_resep', 'tbl_resep.id_resep = tbl_pembayaran.id_resep');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pegawai', 'tbl_pendaftaran.nik_pegawai = tbl_pegawai.nik_pegawai');
        $this->db->join('tbl_pasien', 'tbl_pasien.kd_pasien = tbl_pendaftaran.kd_pasien');
        $data['query'] = $this->db->get()->row_array();
        // var_dump($data['query']); die;

        $this->load->view('admin/pembayaran/print', $data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $customPaper = array(0, 0, 560, 550);
        $this->dompdf->set_paper($customPaper, 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("Struk ".$id.'.pdf');
    }
    
}
