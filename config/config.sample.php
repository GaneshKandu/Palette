<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

define('DS', DIRECTORY_SEPARATOR); 
define('SECRET','SECRET TO BE CHANGE');
define('URL','http://localhost/Palette');
define('PATH', getcwd());
define('VERSION', 'VERSION');
/*
	Change "LANG" value to Change language
	Note : Keep "DEFAULT" value for auto language selection
*/
define('LANG', 'DEFAULT');
$admin = array(
	'admin'=> md5('admin')
);
define('ADMIN',serialize($admin));

?>