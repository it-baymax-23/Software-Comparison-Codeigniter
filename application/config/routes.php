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

//The router for the frontend
$route['default_controller'] = 'HomeController';
$route['resource'] = 'HomeController/resource';
$route['vendors'] = 'HomeController/vendors';
$route['vendors/(:any)'] = 'VendorController/$1';
$route['reviews'] = 'ReviewController';
$route['reviews/(:any)'] = 'ReviewController/$1';
$route['reviews/(:any)/(:any)'] = 'ReviewController/$1/$2';
$route['blogs/(:any)'] = 'HomeController/blogs/$1';
$route['compare-(:any)-review-(:any)'] = 'HomeController/category/$1/$2';
$route['compare/(:any)/(:any)'] = 'HomeController/compare/$1/$2';
$route['productdetail/(:any)/(:any)/(:any)'] = 'HomeController/productdetail/$1/$2/$3';
$route['productdetail/(:any)/(:any)/(:any)/(:any)'] = 'HomeController/productdetail/$1/$2/$3/$4';
$route['signin'] = 'UserController/signin';
$route['register'] = 'UserController/register';
$route['forget'] = 'UserController/forget';
$route['contact'] = 'HomeController/contact';
$route['categories'] = 'HomeController/categories';
$route['reset/(:any)/(:any)'] = 'UserController/reset/$1/$2';
$route['user'] = 'UserController';
$route['user/(:any)'] = 'UserController/$1';
$route['search'] = 'HomeController/search';
$route['search/(:any)'] = 'HomeController/search/$1';
$route['review/getreview'] = 'HomeController/getreview';
$route['review/reviewcount'] = 'HomeController/reviewcount';
$route['review/help'] = 'HomeController/reviewhelp';
$route['searchmore'] = 'HomeController/searchmore';
$route['logout'] = 'UserController/logout';
$route['priceinfo'] = 'HomeController/priceinfo';
$route['searchapps'] = 'HomeController/searchapps';
$route['loginuser'] = 'HomeController/login';
//The router for the backend
$route['admin/category'] = 'AdminCategory';
$route['admin/category/(:any)'] = 'AdminCategory/$1';
$route['admin/category/(:any)/(:any)'] = 'AdminCategory/$1/$2';
$route['admin/feature'] = 'AdminFeature';
$route['admin/feature/(:any)'] = 'AdminFeature/$1/$2';
$route['admin/feature/(:any)/(:any)'] = 'AdminFeature/$1/$2';
$route['admin/product'] = 'AdminProduct';
$route['admin/product/(:any)'] = 'AdminProduct/$1';
$route['admin/product/(:any)/(:any)'] = 'AdminProduct/$1/$2';
$route['admin/review'] = 'AdminReview';
$route['admin/review/(:any)'] = 'AdminReview/$1';
$route['admin/review/(:any)/(:any)'] = 'AdminReview/$1/$2';
$route['admin/resource/(:any)'] = 'AdminReviewSetting/resource_review/$1';
// $route['admin/user'] = 'AdminUser';
$route['admin/reviewsetting/(:any)'] = 'AdminReviewSetting/setting/$1';
$route['admin/user/(:any)'] = 'AdminUser/$1';
$route['admin/user/(:any)/(:any)'] = 'AdminUser/$1/$2';
$route['admin/user/(:any)/(:any)/(:any)'] = 'AdminUser/$1/$2/$3';
$route['admin/blog']  = 'AdminBlog';
$route['admin/blog/(:any)'] = 'AdminBlog/$1';
$route['admin/blog/(:any)/(:any)'] = 'AdminBlog/$1/$2';
$route['admin/comparetable'] = 'AdminCompareTable';
$route['admin/comparetable/(:any)'] = 'AdminCompareTable/$1';
$route['admin/comparetable/(:any)/(:any)'] = 'AdminCompareTable/$1/$2';
$route['admin/menu'] = 'MenuController';
$route['admin/menu/(:any)'] = 'MenuController/$1';
$route['admin/(:any)'] = 'Admin/$1';
//$route['resetpassword/(:any)'] = 'AuthController/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
