<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class downloads extends ctrl{
	
	function __construct(){
		
	}
	
	function index($data){
		
		$zip = isset($_GET['zip'])?(trim($_GET['zip'])):null;
		
		$file = ".palette".DS."downloads".DS.$zip;
		
		header('Content-type:  application/zip');
		header('Content-Length: ' . filesize($file));
		header('Content-Disposition: attachment; filename="'.$zip.'"');
		readfile($file);
		unlink($file);
		return $data;
	}
	
}

?>