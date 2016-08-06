<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class notfound extends ctrl{
	
	function index($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette";
		$data['content'] = 'notfound';
		return $data;
	}
	
}

?>