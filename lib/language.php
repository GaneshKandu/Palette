<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

	$dlang= include "lib/en.php";

	if( LANG == "AUTO"){
		if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
			$lf = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		}
	}else{
		$lf = "en";
	}

	if(file_exists("lang/".$lf.".php")){
		$lang = include "lang/".$lf.".php";
	}elseif(file_exists("lang/".$lf.".lang")){
		$lang = language($dlang,$lf);
	}else{
		$lang = include "lib/en.php";
	}

	$data['lang'] = array_merge($dlang,$lang);
	___($data)
	
?>