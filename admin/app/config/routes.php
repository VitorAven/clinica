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

$route['default_controller'] = "principal";
$route['404_override'] = 'principal';

// Usuários
$route['usuario'] = 'usuario';
$route['login'] = 'usuario/login';
$route['logout'] = 'usuario/logout';
$route['alterar-senha'] = 'usuario/alterarsenha';
$route['usuario/adicionar'] = 'usuario/adicionar';
$route['usuario/(:num)/editar'] = 'usuario/editar/$1';
$route['usuario/(:num)/editar'] = 'usuario/editar/$1';
$route['usuario/(:num)/excluir'] = 'usuario/excluir/$1';

// Alunos
$route['aluno'] = 'aluno/listar';
$route['aluno/adicionar'] = 'aluno/adicionar';
$route['aluno/(:num)/editar'] = 'aluno/editar/$1';
$route['aluno/(:num)/excluir'] = 'aluno/excluir/$1';

// Funcionario
$route['func'] = 'funcionario/listar';
$route['func/add'] = 'funcionario/adicionar';
$route['func/add'] = 'funcionario/adicionar';
$route['func/(:num)/edit'] = 'funcionario/editar/$1';
$route['func/(:num)/exc'] = 'funcionario/excluir/$1';
$route['func/(:num)/horario'] = 'funcionario/listarHorario/$1';


// Galeria
$route['galeria/list'] = 'galeria';
$route['galeria/add'] = 'galeria/adicionar';
$route['galeria/(:num)'] = 'galeria/editar/$1';
$route['galeria/(:num)/excluir'] = 'galeria/excluir/$1';
$route['galeria/desativar/(:num)'] = 'galeria/desativar/$1';
$route['galeria/ativar/(:num)'] = 'galeria/ativar/$1';

// Galeria imagens
$route['galeria/(:num)/imagens'] = 'galeria/adicionarimagem/$1';
$route['galeria/(:num)/imagens/ativar/(:num)'] = 'galeria/ativarImagem/$1/$2';
$route['galeria/(:num)/imagens/desativar/(:num)'] = 'galeria/desativarImagem/$1/$2';
$route['galeria/(:num)/imagens/excluir/(:num)'] = 'galeria/excluirImagem/$1/$2';

// banner
$route['banner/list'] = 'banner';
$route['banner/desativar/(:num)'] = 'banner/desativar/$1';
$route['banner/ativar/(:num)'] = 'banner/ativar/$1';
$route['banner/(:num)'] = 'banner/editar/$1';
$route['banner/(:num)/excluir'] = 'banner/excluir/$1';

// NOticias
$route['noticia/list'] = 'noticias';
$route['noticia/add'] = 'noticias/adicionar';
$route['noticia/desativar/(:num)'] = 'noticias/desativar/$1';
$route['noticia/ativar/(:num)'] = 'noticias/ativar/$1';
$route['noticia/(:num)'] = 'noticias/editar/$1';
$route['noticia/excluir/(:num)'] = 'noticias/excluir/$1';

// Contato
$route['contatos'] = 'contato/listar';
$route['contato/(:num)'] = 'contato/exibir/$1';
$route['contato/(:num)/excluir'] = 'contato/excluir/$1';


