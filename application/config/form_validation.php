<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = [
    'user' => [
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ],
        [
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'alpha'
        ],
        [
            'field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'alpha'
        ]
    ],
    'obat' => [
        [
            'field' => 'nama_obat',
            'label' => 'Nama obat',
            'rules' => 'required'
        ],
        [
            'field' => 'jenis_obat',
            'label' => 'Jenis',
            'rules' => 'required'
        ],
        [
            'field' => 'dosis',
            'label' => 'Dosis',
            'rules' => 'required'
        ],
        [
            'field' => 'harga',
            'label' => 'Harga',
            'rules' => 'required|numeric'
        ],
    ],
    'jenis_obat'=> [
        [
            'field' => 'jenis_obat',
            'label' => 'Jenis obat',
            'rules' => 'required|alpha'
        ]
    ],
    'pasien' => [
        [
            'field' => 'no_nik',
            'label' => 'No KTP',
            'rules' => 'numeric|required'
        ],
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
        ],
        [
            'field' => 'j_kelamin',
            'label' => 'Jenis kelamin',
            'rules' => 'in_list[pria,wanita]'
        ],
        [
            'field' => 'tmp_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'required'
        ],
        [
            'field' => 'tgl_lahir',
            'label' => 'Tanggal lahir',
            'rules' => 'required'
        ],
        [
            'field' => 'telepon',
            'label' => 'Telepon',
            'rules' => 'numeric|required'
        ],
        [
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'
        ],
    ],
    'pegawai'=>[
        [
            'field' => 'no_id',
            'label' => 'No KTP',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
        ],
        [
            'field' => 'j_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'in_list[pria,wanita]'
        ],
        [
            'field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required|alpha'
        ],
        [
            'field' => 'tempat_lahir',
            'label' => 'Tempat lahir',
            'rules' => 'required|alpha'
        ],
        [
            'field' => 'tgl_lahir',
            'label' => 'Tanggal lahir',
            'rules' => 'required'
        ],
        [
            'field' => 'telepon',
            'label' => 'Telepon',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'
        ],
    ],
    'pendaftaran'=>[
        [
            'field' => 'nm_pasien',
            'label' => 'Nama Pasien',
            'rules' => 'required'
        ],
        [
            'field' => 'nm_pegawai',
            'label' => 'Nama Dokter',
            'rules' => 'required'
        ],
        [
            'field' => 'tgl_daftar',
            'label' => 'Tanggal Daftar',
            'rules' => 'required'
        ],
        [
            'field' => 'keluhan',
            'label' => 'Keluhan',
            'rules' => 'required'
        ],
        [
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'in_list[selesai,tunggu,periksa]'
        ],
    ],
    'resep' =>[
        [
            'field' => 'pasien',
            'label' => 'Nama Pasien',
            'rules' => 'required'
        ],
        [
            'field' => 'diagnosa',
            'label' => 'Diagnosa',
            'rules' => 'required'
        ],
        [
            'field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'
        ],
        [
            'field' => 'nama_obat[]',
            'label' => 'Nama Obat',
            'rules' => 'required'
        ],
        [
            'field' => 'aturan_pakai[]',
            'label' => 'aturan Pakai',
            'rules' => 'required'
        ],
    ],'rekam'=>[
        [
            'field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'
        ],
        [
            'field' => 'nama',
            'label' => 'Nama Pasien',
            'rules' => 'required'
        ],
        [
            'field' => 'alamat',
            'label' => 'Alamat Pasien',
            'rules' => 'required'
        ],
        [
            'field' => 'keluhan',
            'label' => 'Keluhan',
            'rules' => 'required'
        ],
        [
            'field' => 'diagnosa',
            'label' => 'Diagnosa',
            'rules' => 'required'
        ],
        [
            'field' => 'rujukan',
            'label' => 'Rujukan',
            'rules' => 'in_list[ya,tidak]'
        ]
    ],


];