<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class logout extends ctrl{
	
	function index($data){
		$data['tpl'] = "login";
		$data['title'] = "Palette";
		session_destroy();
		return $data;
	}
	
}