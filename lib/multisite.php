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
	if(is_dir(PATH.DS."sites".DS."palette")){
		$project = "palette";
	}else{
		require_once "data/Maintenance.php";
	}
	if(empty($url)){
		$url = "index.html";
	}
	if(isset($project)){
		$path = PATH.DS."sites".DS.$project.DS.$url;
		if(file_exists($path)){
			if(is_dir($path)){
				$path .= "index.html";
			}
			if(file_exists($path)){
				include $path;
			}else{	
				require_once "data/404.php";
			}
		}else{
			require_once "data/404.php";
		}
	}
	
}