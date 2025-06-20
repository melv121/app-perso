<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

$route['artisan/dashboard'] = 'artisan/dashboard';
$route['artisan/devenir'] = 'artisan/devenir';

$route['products/add'] = 'products/add';
$route['products/edit/(:num)'] = 'products/edit/$1';
$route['products/delete/(:num)'] = 'products/delete/$1';
$route['products/filter'] = 'products/filter_by_category';

$route['collections'] = 'products/collections';

$route['about'] = 'welcome/about';
$route['contact'] = 'welcome/contact';
$route['conditions'] = 'welcome/conditions';

$route['orders/create'] = 'orders/create';
$route['orders/success/(:num)'] = 'orders/success/$1';
