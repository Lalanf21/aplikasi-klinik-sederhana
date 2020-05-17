<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logic extends CI_model{

    public function get_all($table, $sort=null, $limit=null, $start=null){
        $this->db->order_by($sort);
        return $this->db->get($table,$limit,$start);
        // return $query;
    }

    public function require_get($table, $where, $sort=null, $limit=null, $start=null) {
        $this->db->where($where);
        $this->db->order_by($sort);
        $query = $this->db->get($table,$limit,$start);
        return $query;
    }

    public function add($table, $data) {
        $this->db->insert($table,$data);
    }

    public function update($table, $data, $where) {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table, $where);
    }

    public function search($table, $search) {
        $this->db->like($search);
        $this->db->or_like($search);
        return $this->db->get($table);
    }

    public function search_join($table, $join, $search, $key) {
        $this->db->like($search);
        $this->db->or_like($search);
        $this->db->from($table);
        $this->db->join($join, $key);
        return $this->db->get();
    }

    public function search_lap($fil1,$fil2,$table){
        $query = $this->db->query("SELECT * FROM $table WHERE DATE(tanggal) >= '$fil1' AND DATE(tanggal) <= '$fil2'");
        // $this->db->from($table);
        // $this->db->where($fil1);
        // $this->db->where($fil2);
        // $query = $this->db->get();
        return $query;
    }

    public function getPasien($date1, $date2)
    {
        $this->db->select('tbl_pasien.*,tbl_pendaftaran.keluhan,tbl_rekam.*,tbl_pegawai.nama_pegawai,tbl_resep.nama_obat,tbl_pembayaran.total_harga');
        $this->db->from('tbl_rekam');
        $this->db->join('tbl_pendaftaran', 'tbl_pendaftaran.no_pendaftaran = tbl_rekam.no_pendaftaran');
        $this->db->join('tbl_pasien', 'tbl_pendaftaran.kd_pasien = tbl_pasien.kd_pasien');
        $this->db->join('tbl_pegawai', 'tbl_pendaftaran.nik_pegawai = tbl_pegawai.nik_pegawai');
        $this->db->join('tbl_resep', 'tbl_pendaftaran.no_pendaftaran = tbl_resep.no_pendaftaran');
        $this->db->join('tbl_pembayaran', 'tbl_pembayaran.id_resep = tbl_resep.id_resep');
        $this->db->where('tbl_rekam.tanggal >=', $date1);
        $this->db->where('tbl_rekam.tanggal <=', $date2);
        return $this->db->get();
    }

    public function join($table,$join,$select, $key, $sort = null){

        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($join, $key);
        $this->db->order_by($sort);
        return $this->db->get();
    }

    public function require_join($table, $join, $select, $key, $where = null)
    {

        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($join, $key);
        $this->db->where($where);
        return $this->db->get();
    }
}
?>