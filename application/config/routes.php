<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['dashboard']             = 'user/page';
$route['logout']             = 'login/logout';

// route user
$route['user']                     = 'user';
$route['tambah-user']            = 'user/form_add';
$route['ubah-user/(:any)']        = 'user/form_edit/$1';
$route['add-user']                = 'user/add';
$route['edit-user']                = 'user/edit';
$route['delete-user/(:any)']    = 'user/delete/$1';

// route kategori
$route['kategori']                     = 'kategori';
$route['tambah-kategori']            = 'kategori/form_add';
$route['ubah-kategori/(:any)']        = 'kategori/form_edit/$1';
$route['add-kategori']                = 'kategori/add';
$route['edit-kategori']                = 'kategori/edit';
$route['delete-kategori/(:any)']    = 'kategori/delete/$1';

// route jenis obat
$route['jenis-obat']                     = 'jenis_obat';
$route['tambah-jenis-obat']                = 'jenis_obat/form_add';
$route['ubah-jenis-obat/(:any)']        = 'jenis_obat/form_edit/$1';
$route['add-jenis-obat']                = 'jenis_obat/add';
$route['edit-jenis-obat']                = 'jenis_obat/edit';
$route['delete-jenis-obat/(:any)']        = 'jenis_obat/delete/$1';

// route pasien
$route['pasien']                         = 'pasien';
$route['tambah-pasien']                    = 'pasien/form_add';
$route['ubah-pasien/(:any)']            = 'pasien/form_edit/$1';
$route['add-pasien']                    = 'pasien/add';
$route['edit-pasien']                    = 'pasien/edit';
$route['delete-pasien/(:any)']            = 'pasien/delete/$1';

// route pegawai
$route['pegawai']                     = 'pegawai';
$route['tambah-pegawai']            = 'pegawai/form_add';
$route['ubah-pegawai/(:any)']        = 'pegawai/form_edit/$1';
$route['add-pegawai']                = 'pegawai/add';
$route['edit-pegawai']                = 'pegawai/edit/';
$route['delete-pegawai/(:any)']        = 'pegawai/delete/$1';

// route detail
$route['detail']                     = 'detail';
$route['tambah-detail']                = 'detail/form_add';
$route['ubah-detail/(:any)']        = 'detail/form_edit/$1';
$route['add-detail']                = 'detail/add';
$route['edit-detail']                = 'detail/edit/';
$route['delete-detail/(:any)']        = 'detail/delete/$1';

// route obat
$route['obat']                     = 'obat';
$route['tambah-obat']            = 'obat/form_add';
$route['ubah-obat/(:any)']        = 'obat/form_edit/$1';
$route['add-obat']                = 'obat/add';
$route['edit-obat']                = 'obat/edit/$1';
$route['delete-obat/(:any)']    = 'obat/delete/$1';

// route pendaftaran
$route['pendaftaran']                     = 'pendaftaran';
$route['tambah-pendaftaran']            = 'pendaftaran/form_add';
$route['ubah-pendaftaran/(:any)']        = 'pendaftaran/form_edit/$1';
$route['add-pendaftaran']                = 'pendaftaran/add';
$route['edit-pendaftaran']                = 'pendaftaran/edit';
$route['delete-pendaftaran/(:any)']        = 'pendaftaran/delete/$1';

// route pembayaran
$route['pembayaran']                     = 'pembayaran';
$route['tambah-pembayaran/(:any)']        = 'pembayaran/form_add/$1';
$route['add-pembayaran']                = 'pembayaran/add';
$route['edit-pembayaran']                = 'pembayaran/edit';
$route['delete-pembayaran/(:any)']        = 'pembayaran/delete/$1';
$route['list-pembayaran']                = 'pembayaran/list';
$route['print-struk/(:any)']             = 'pembayaran/print/$1';

// route Resep
$route['resep']                 = 'resep';
$route['tambah-resep']            = 'resep/form_add';
$route['ubah-resep/(:any)']        = 'resep/form_edit/$1';
$route['add-resep']                = 'resep/add';
$route['edit-resep']            = 'resep/edit';
$route['delete-resep/(:any)']    = 'resep/delete/$1';

// route Rekam medis
$route['rekam-medis']           = 'rekam_medis';
$route['tambah-rekam']          = 'rekam_medis/form_add';
$route['ubah-rekam/(:any)']     = 'rekam_medis/form_edit/$1';
$route['add-rekam']             = 'rekam_medis/add';
$route['edit-rekam']            = 'rekam_medis/edit';
$route['delete-rekam/(:any)']   = 'rekam_medis/delete/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = true;
