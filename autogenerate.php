<?php 
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', (dirname(__FILE__)) . DS);
	define('DATA_ACCESS', ROOT . 'DataAccess' . DS);

	require(DATA_ACCESS . 'Autogenerate' . DS . 'autogenerate.php');
 ?>