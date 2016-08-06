<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

define('DS', DIRECTORY_SEPARATOR);
/* CAN CHANGE USED IN SESSION */ 
define('SECRET','{SECRET}');
/* URL */
define('URL','http://localhost/Palette');
define('PATH', getcwd());
$admin = array(
	'admin'=> '{PASSWORD}'
);
define('ADMIN',serialize($admin));

?>