<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

	$dlang= include "lang/en.php";

	if( LANG == "AUTO"){
		if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
			$lf = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		}
	}else{
		$lf = LANG;
	}

	if(file_exists("lang/".$lf.".php")){
		$lang = include "lang/".$lf.".php";
	}else{
		$lang = include "lang/en.php";
	}

	$data['lang'] = array_merge($dlang,$lang);
	$data['lang']['Auto-lang'] = $lf; 
	
?>