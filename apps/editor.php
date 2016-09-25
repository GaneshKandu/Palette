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
		if(isset($_GET['B'])){
			$data['tpl'] = "beditor";
		}
		$data['title'] = "Site Editor";
		return $data;
	}
	
}