<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth\Auth::index');
$routes->post('/Auth-login-main', 'Auth\Auth::Process');
$routes->get('/Logout', 'Auth\Auth::Logout');

// $routes->get('/Administrator', 'Administrator\Administrator::Home');


$routes->get('/Local-order', 'Staff\Staff::Home');

//routes part divisi
$routes->get('/Parts-Division', 'Staff\Staff::Part_div');
$routes->post('/show-data', 'Staff\Staff::Part_div');
$routes->get('/Add-Part-Division', 'Staff\Staff::Add_Part_div');
$routes->post('/View-Parts-Master', 'Staff\Staff::View_parts_master');
$routes->post('/Store-data-part-divisi', 'Staff\Staff::Store_data_part_divisi');
$routes->get('/update-part-divisi/(:any)', 'Staff\Staff::update_Part_div/$1');
$routes->post('/Update-data-part-divisi', 'Staff\Staff::update_data_part_divisi');
$routes->get('/delete-part-divisi/(:any)', 'Staff\Staff::delete_Part_div/$1');


// $routes->get('/Staff', 'Staff\Staff::Home');
$routes->get('/Form-Local-Order', 'Staff\Staff::Form_Lo');
$routes->get('/Data-Part-Divisi', 'Staff\Staff::Get_Part_Divisi');
$routes->post('send-data-request-order', 'Staff\Staff::Accept_data_local_order');


$routes->get('/Reports', 'Staff\Staff::Reports_LO');
$routes->post('/send-divisi', 'Staff\Staff::get_Divisi');
$routes->post('/List-Report-Data', 'Staff\Staff::result_report');
$routes->post('/Print', 'Staff\Staff::print_report');


$routes->get('/Update-Local-Order', 'Staff\Staff::Form_Lo_update');
$routes->get('/get-Data-Local-Order', 'Staff\Staff::getDetailLo');
$routes->post('/send-data-update', 'Staff\Staff::save_lo_data_update');
$routes->get('/check-getFP', 'Staff\Staff::check_nopr_in_tbl_transPa');



$routes->get('/Check-Stock-Last', 'Staff\Staff::Check_stock');
$routes->get('/Notfound', 'Notfound\ErrorNotfound::index');
