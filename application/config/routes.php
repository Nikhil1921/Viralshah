<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['adminPanel'] = 'adminPanel/home';
$route['adminPanel/logout'] = 'adminPanel/home/logout';
$route['adminPanel/dashboard'] = 'adminPanel/home';
$route['adminPanel/employees']['post'] = 'adminPanel/employees/get';
$route['adminPanel/city']['post'] = 'adminPanel/city/get';
$route['adminPanel/task']['post'] = 'adminPanel/task/get';
$route['adminPanel/make']['post'] = 'adminPanel/make/get';
$route['adminPanel/variant']['post'] = 'adminPanel/variant/get';
$route['adminPanel/trim']['post'] = 'adminPanel/trim/get';
$route['adminPanel/vehicleClass']['post'] = 'adminPanel/vehicleClass/get';
$route['adminPanel/bodyType']['post'] = 'adminPanel/bodyType/get';
$route['adminPanel/fuel']['post'] = 'adminPanel/fuel/get';
$route['adminPanel/vehicleSender']['post'] = 'adminPanel/vehicleSender/get';
$route['adminPanel/vehicleSenderEmployee']['post'] = 'adminPanel/vehicleSenderEmployee/get';

$route['adminPanel/profile'] = 'adminPanel/home/profile';
$route['adminPanel/changePassword'] = 'adminPanel/home/changePassword';
$route['adminPanel/forgotPassword'] = 'adminPanel/login/forgotPassword';
$route['adminPanel/checkOtp'] = 'adminPanel/login/checkOtp';
$route['adminPanel/unauthorized'] = 'adminPanel/home/unauthorized';