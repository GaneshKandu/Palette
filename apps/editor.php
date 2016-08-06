<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class editor extends ctrl{
	
	function index($data){
		$data['tpl'] = "editor";
		$data['title'] = "Site Editor";
		return $data;
	}
	
}