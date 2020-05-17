<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_controller{
    
    public $table   = 'tbl_obat';
    public $view    = 'admin/obat/view';
    public $add     = 'admin/obat/form_add';
    public $edit    = 'admin/obat/form_edit';

    public function __construct(){
        parent::__construct();
        $this->load->model('logic');
        $this->load->library('form_validation');
    }

    public function index(){
        $sort = 'id_obat DESC';
        $data['query']  = $this->logic->join($this->table,'tbl_jenis_obat','*','tbl_obat.id_jenis_obat = tbl_jenis_obat.id_jenis_obat',$sort);
        $data['konten'] = $this->view;
        $this->load->view('template',$data);
    }

    public function form_add(){

        $data['jenis']  = $this->logic->get_all('tbl_jenis_obat');
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
        $this->form_validation->set_message('alpha','silahkan pilih option dahulu !');
        
        if( $this->form_validation->run('obat') == false ){
            $this->form_add();
        } else {
            $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama_obat',true))));
            $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat',true))));
            $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('dosis',true))));
            $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('harga',true))));
    
            $data = array(
                            'nama_obat'     => $nama,
                            'id_jenis_obat'    => $jenis,
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
    }

    public function edit(){

        $id_obat = addslashes(htmlspecialchars(htmlentities($this->input->post('id',true))));
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('nama_obat',true))));
        $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('jenis_obat',true))));
        $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('dosis',true))));
        $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('harga',true))));

        $data = array(
                        'nama_obat'         => $nama,
                        'id_jenis_obat'     => $jenis,
                        'dosis'             => $dosis,
                        'harga'             => $harga
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

    public function search() {
        $nama = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $dosis = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $harga = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
        $jenis = addslashes(htmlspecialchars(htmlentities($this->input->post('search', true))));
      
      
        $data = [
          'nama_obat' => $nama,
          'dosis' =>$dosis,
          'harga' => $harga,
          'jenis_obat' => $jenis
        ];

        $data['query'] = $this->logic->search_join($this->table,'tbl_jenis_obat',$data,'tbl_jenis_obat.id_jenis_obat = tbl_obat.id_jenis_obat');
        $data['konten'] = $this->view;
        $this->load->view('template', $data);

    }


}