<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

$route['jurusan'] = "admin/crudjurusan";
// Route untuk melakukan login
$route['loginGuru'] = "login/login";
$route['loginAdmin'] = "login/loginadm";

// Route untuk guru
$route['guru'] = 'guru/guru';
// Route untuk paket soal
$route['tampilPaket'] = 'guru/pilgan/tampilPaket';
$route['tambahPaket'] = 'guru/pilgan/tambahPaket';
$route['detailPaket/(:any)'] = 'guru/pilgan/tampilDetailPaket/$1';
$route['editPaket/(:any)'] = 'guru/pilgan/editPaket/$1';
$route['hapusPaket/(:any)'] = 'guru/pilgan/hapusPaket/$1';
// Route untuk soal
$route['soal/(:any)'] = 'guru/pilgan/index/$1';
// Route untuk soal pilihan ganda
$route['tambahPilgan/(:any)'] = 'guru/pilgan/tambah/$1';
$route['editPilgan/(:any)/(:any)'] = 'guru/pilgan/edit/$1/$2';
$route['hapusPilgan/(:any)/(:any)'] = 'guru/pilgan/hapus/$1/$2';
// Route untuk soal essay
$route['tambahEssay/(:any)'] = 'guru/pilgan/tambah_soalEssay/$1';
$route['editEssay/(:any)/(:any)'] = 'guru/pilgan/edit_soalEssay/$1/$2';
$route['hapusEssay/(:any)/(:any)'] = 'guru/pilgan/hapus_soalEssay/$1/$2';
// Route untuk soal benar salah
$route['tambahBenarSalah/(:any)'] = 'guru/pilgan/tambah_benarSalah/$1';
$route['editBenarSalah/(:any)/(:any)'] = 'guru/pilgan/edit_benarSalah/$1/$2';
$route['hapusBenarSalah/(:any)/(:any)'] = 'guru/pilgan/hapus_benarSalah/$1/$2';
// Route untuk soal mengurutkan
$route['tambahSorting/(:any)'] = 'guru/pilgan/tambah_sorting/$1';
$route['editSorting/(:any)/(:any)'] = 'guru/pilgan/edit_sorting/$1/$2';
$route['hapusSorting/(:any)/(:any)'] = 'guru/pilgan/hapus_sorting/$1/$2';

