<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class dashboard extends ctrl{
	
	function index($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette";
		$data['content'] = 'dashboard';
		return $data;
	}
	
	function about($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | About";
		$data['content'] = 'about';
		return $data;
	}
	
	function profile($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | profile";
		$data['content'] = 'profile';
		return $data;
	}
	
}

?>