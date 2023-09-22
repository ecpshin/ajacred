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
$route['default_controller'] = 'autenticacao';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login']='autenticacao';
$route['logout']='autenticacao/logout';
$route['register']='admin/usuarios/register_new';
$route['forget']='admin/usuarios/forget_password';
$route['recovery']='admin/usuarios/recovery_password';
$route['admin']='admin/home';
$route['manager']='manager/manager';
$route['cliente/novo']='clientes/cadastro';
$route['cliente/contrato']='clientes/cliente_contrato';
$route['cliente/editar/(:any)']='clientes/editar/$1';
$route['cliente/gerenciar/(:any)']='clientes/contratos_cliente/$1';
$route['clientes/info-basic']='clientes/info_basic';
$route['clientes/infos/(:any)/(:any)']='clientes/client_infos/$1/$2';
$route['clientes/paginacao']='clientes/paginacao';
$route['cliente/ficha/(:any)']='clientes/ficha/$1';
$route['comissoes']='comissoes';
$route['comissoes/pesquisar']='comissoes/vendas_periodo';
$route['contrato/new'] = 'contratos/formulario'; 
$route['contrato/editar/(:any)']='contratos/editar/$1';
$route['contrato/visualizar/(:any)']='contratos/view/$1';
$route['contrato/excluir/(:any)'] = 'contratos/delete_contrato/$1';
$route['correspondente/novo']='correspondentes/novo';
$route['correspondente/editar/(:any)']='correspondentes/editar/$1';
$route['ecivil/editar/(:num)']='estadoscivil/editar/$1';
$route['financeira/nova']='financeiras/nova';
$route['financeira/editar/(:num)']='financeiras/editar/$1';
$route['orgao/novo']='orgaos/novo';
$route['orgao/editar/(:num)']='orgaos/editar/$1';
$route['operacao/editar/(:any)']='operacoes/editar/$1';
$route['operacao/excluir/(:any)']='operacoes/excluir/$1';
$route['relatorio']='relatorios';
$route['pages'] = 'pages';
$route['profile/(:num)']='usuarios/profile/$1';
$route['situacao/nova']='situacoes/nova';
$route['situacao/editar/(:any)']='situacoes/editar/$1';
$route['situacao/excluir/(:any)']='situacoes/excluir/$1';
$route['usuario/novo'] = 'usuarios/register';
$route['usuarios/editar/(:num)'] = 'usuarios/update_user/$1';
$route['password/forgot/(:any)']='usuarios/forgot/$1';
