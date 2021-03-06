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
/*$route['^en/(.+)$'] = "$1";
$route['^fr/(.+)$'] = "$1";
$route['^cn/(.+)$'] = "$1";

$route['^en$'] = $route['default_controller'] = 'front';
$route['^fr$'] = $route['default_controller'] = 'front';
$route['^cn$'] = $route['default_controller'] = 'front';*/

$route['default_controller'] = 'front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//digitalauth
$route['dacadmin'] = 'dacadmin/index';
$route['dacadmin/(:any)'] = "dacadmin/$1";

// front page
$route['(:any)'] = "front/$1";
$route['pages/(:any)'] = "front/pages/$1";
$route['news/(:any)'] = "front/news/$1";
$route['product/(:any)'] = "front/product/$1";
$route['applications/(:any)'] = "front/applications/$1";
$route['category/(:any)'] = "front/category/$1";