<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/
$file = "";
if(MULTISITE){
	require_once "apps/dashboard.php";
	$file = 'dashboard';
}else{
	if(file_exists(PATH.DS.".palette".DS."site")){
		$project = trim(file_get_contents(PATH.DS.".palette".DS."site"));
	}else{
		echo "site under maintenance";
	}
	$url = str_replace("/",DS,$url);
	if(empty($url)){
		$url = "index.html";
	}
	$path = PATH.DS."sites".DS.$project.DS.$url;
	if(file_exists($path)){
		if(is_dir($path)){
			$path .= "index.html";
		}
		if(file_exists($path)){
			include $path;
		}else{	
			header('HTTP/1.0 404 Not Found', true, 404);
		}
	}else{
		header('HTTP/1.0 404 Not Found', true, 404);
	}
	
}