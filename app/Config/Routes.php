<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/autentikasi-login', 'Admin::autentikasi');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/logout', 'Admin::logout');

$routes->get('/admin/master-data-pasien', 'Admin::master_data_pasien');
$routes->get('/admin/input-data-pasien', 'Admin::input_data_pasien');
$routes->post('/admin/simpan-pasien', 'Admin::simpan_data_pasien');
$routes->get('/admin/edit-data-pasien/(:alphanum)', 'Admin::edit_data_pasien/$1');
$routes->post('/admin/update-pasien', 'Admin::update_pasien');
$routes->get('/admin/hapus-data-pasien/(:alphanum)', 'Admin::hapus_data_pasien/$1');

$routes->get('/admin/master-data-dokter', 'Admin::master_data_dokter');
$routes->get('/admin/input-data-dokter', 'Admin::input_data_dokter');
$routes->post('/admin/simpan-dokter', 'Admin::simpan_data_dokter');
$routes->get('/admin/edit-data-dokter/(:alphanum)', 'Admin::edit_data_dokter/$1');
$routes->post('/admin/update-dokter', 'Admin::update_dokter');
$routes->get('/admin/hapus-data-dokter/(:alphanum)', 'Admin::hapus_data_dokter/$1');

$routes->get('/admin/master-data-jadwal', 'Admin::master_data_jadwal');
$routes->get('/admin/input-data-jadwal', 'Admin::input_data_jadwal');
$routes->post('/admin/simpan-jadwal', 'Admin::simpan_data_jadwal');
$routes->get('/admin/edit-data-jadwal/(:alphanum)', 'Admin::edit_data_jadwal/$1');
$routes->post('/admin/update-jadwal', 'Admin::update_jadwal');
$routes->get('/admin/hapus-data-jadwal/(:alphanum)', 'Admin::hapus_data_jadwal/$1');

$routes->get('/frontend/index', 'Admin::index');
$routes->post('/reservasi/simpan', 'Admin::simpan_data_booking');
$routes->get('/admin/master-data-janji', 'Admin::master_data_janji');
$routes->get('/admin/edit-data-janji/(:alphanum)', 'Admin::edit_data_janji/$1');
$routes->post('/admin/update-janji', 'Admin::update_janji');
$routes->get('/admin/hapus-data-janji/(:alphanum)', 'Admin::hapus_data_janji/$1');

$routes->get('/reservasi/bukti/(:alphanum)', 'Admin::bukti/$1');
$routes->get('/admin/ubah-status-janji/(:any)', 'Admin::ubahStatusJanji/$1');
