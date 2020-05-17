<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_controller
{

    // public $table   = 'tbl_obat';
    public $view    = 'admin/laporan/view';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('logic');
    }

    public function index()
    {
        $data['konten'] = $this->view;
        $this->load->view('template', $data);
    }

    public function form_add()
    {

        $data['jenis']  = $this->logic->get_all('tbl_jenis_obat');
        $data['konten'] = $this->add;
        $this->load->view('template', $data);
    }

    public function form_edit($id)
    {

        $where['id_obat'] = $id;
        $data['jenis']  = $this->logic->get_all('tbl_jenis_obat');
        $data['query']  = $this->logic->require_get($this->table, $where);
        $data['konten'] = $this->edit;
        $this->load->view('template', $data);
    }

    public function add()
    {
        $this->form_validation->set_message('alpha', 'silahkan pilih option dahulu !');

        if ($this->form_validation->run('obat') == false) {
            $this->form_add();
        } else {
            $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama_obat', true))));
            $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat', true))));
            $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('dosis', true))));
            $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('harga', true))));

            $data = array(
                'nama_obat'     => $nama,
                'id_jenis_obat'    => $jenis,
                'dosis'         => $dosis,
                'harga'         => $harga
            );
            $row = $this->logic->require_get($this->table, $data);

            if ($row->num_rows() > 0) {
                $this->session->set_flashdata('alert', '<p class="alert alert-warning">Data sudah tersedia</p>');
                redirect('tambah-obat');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil di simpan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $this->logic->add($this->table, $data);
                redirect('obat');
            }
        }
    }

    public function edit()
    {

        $id_obat = addslashes(htmlspecialchars(htmlentities($this->input->post('id', true))));
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama_obat', true))));
        $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat', true))));
        $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('dosis', true))));
        $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('harga', true))));

        $data = array(
            'nama_obat'         => $nama,
            'id_jenis_obat'     => $jenis,
            'dosis'             => $dosis,
            'harga'             => $harga
        );
        $id['id_obat'] = $id_obat;
        $this->logic->update($this->table, $data, $id);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil diubah</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('obat');
    }

    public function delete($id)
    {
        $where['id_obat'] = $id;
        $this->logic->delete($this->table, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('obat');
    }

    public function search()
    {
        $awal = addslashes(htmlspecialchars(htmlentities($this->input->post('tanggal_awal', true))));
        $akhir = addslashes(htmlspecialchars(htmlentities($this->input->post('tanggal_akhir', true))));

        // $a['tanggal'] = $awal;
        // $b['tanggal'] <$akhir;
        // var_dump($awal, $akhir);die;


        // $data = array(
        //                 'tgl_daftar' => $awal,
        //                 'tgl_daftar' => $akhir 
        //             );
        
        $result = $this->logic->search_lap($awal,$akhir,'tbl_rekam_medis');
        var_dump($result->result());
    }

    public function export()
    {

        $date1 = $this->input->post('tanggal1');
        $date2 = $this->input->post('tanggal2');


        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $csv = new PHPExcel();
        $csv->getProperties()->setCreator('Admin')
            ->setLastModifiedBy('Admin')
            ->setTitle("Data Transaction")
            ->setSubject("Transaction")
            ->setDescription("Report All Data Transaction")
            ->setKeywords("Data Transaction");

        // Buat header tabel nya pada baris ke 1

        $csv->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Kunjungan Pasien");
        $csv->getActiveSheet()->mergeCells('A1:N1');
        $csv->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1    
        $csv->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1    
        $csv->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $csv->setActiveSheetIndex(0)->setCellValue('A2', "No");
        $csv->setActiveSheetIndex(0)->setCellValue('B2', "Identitas Pasien");
        $csv->setActiveSheetIndex(0)->setCellValue('C2', "Tanggal ");
        $csv->setActiveSheetIndex(0)->setCellValue('D2', "Nama Pasien");
        $csv->setActiveSheetIndex(0)->setCellValue('E2', "Jenis Kelamin");
        $csv->setActiveSheetIndex(0)->setCellValue('F2', "Alamat");
        $csv->setActiveSheetIndex(0)->setCellValue('G2', "Telpon");
        $csv->setActiveSheetIndex(0)->setCellValue('H2', "Keluhan");
        $csv->setActiveSheetIndex(0)->setCellValue('I2', "Diagnosa");
        $csv->setActiveSheetIndex(0)->setCellValue('J2', "Nama Dokter");
        $csv->setActiveSheetIndex(0)->setCellValue('K2', "Obat");
        $csv->setActiveSheetIndex(0)->setCellValue('L2', "Total");


        $transaction = $this->logic->getPasien($date1, $date2)->result();
        // var_dump($transaction);die;
        $no = 1;
        $numrow = 3;

        foreach ($transaction as $isi) {
            $csv->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $csv->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $isi->no_ktp);
            $csv->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $isi->tanggal);
            $csv->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $isi->nama_pasien);
            $csv->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $isi->gender);
            $csv->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $isi->alamat);
            $csv->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $isi->no_telp);
            $csv->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $isi->keluhan);
            $csv->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $isi->diagnosa);
            $csv->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $isi->nama_pegawai);
            $csv->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $isi->nama_obat);
            $csv->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $isi->total_harga);
            $no++;
            $numrow++;
        }


        $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $csv->getActiveSheet(0)->setTitle("Laporan Kunjungan Pasien");
        $csv->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Kunjungan Pasien.xls"');
        header('Cache-Control: max-age=0');

        //$write = new PHPExcel_Writer_CSV($csv);
        $write = PHPExcel_IOFactory::createWriter($csv, 'Excel2007');
        $write->save('php://output');
    }
}
