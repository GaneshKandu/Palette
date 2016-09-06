<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

if(!isAjax()){
	echo "You don't have permission to direct access";
	die;
}

class popup extends ctrl{
	function __construct(){
		
	}
	
	function index($data){
		$_SESSION['Palette_notify'] = null;
		return $data;
	}
	
}

?>