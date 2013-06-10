<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['sys_title'] = 'Rose CMS';

$config['adm_sys_title'] = 'Rose CMS';
$config['cms_version'] = '0.1';
$config['adm_username'] = 'admin';
$config['adm_password'] = 'admin';
$config['adm_template']	= '/templates/adm_default';
$config['adm_segment']	= 'rcmsadm';
$config['adm_login_segment'] = 'auth';

$config['adm_sess_username'] = 'adm_username';
$config['adm_sess_status'] = 'adm_status';
$config['adm_sess_level']	= 9999;

$config['image_upload_config'] = array(
	'upload_path' => './data/',
	'allowed_types' => 'gif|jpg|png',
	'max_size' => '1000',
	'max_width' => '1024',
	'max_height' => '768',
);


//栏目菜单所允许深度级别
$config['max_menu_level'] = 2;

$config['yui_version']	= '3.7.3';
$config['fd_yui_version'] = '3.10.0';

