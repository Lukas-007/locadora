<?php
require 'environment.php';

define('VERSION', '1.0.0');
define('KEY_API_GOOGLE', 'AIzaSyCQCEHpwO38cwlUuyZcPWTxi_kfSvsKte4');

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://".$_SERVER['HTTP_HOST']."/locadora/");
	$config['dbname'] = 'locadora';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "https://www.lucas.locadora.sisvisio.com.br/");
	$config['dbname'] = '';
	$config['host'] = 'localhost';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}

$db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8;host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>