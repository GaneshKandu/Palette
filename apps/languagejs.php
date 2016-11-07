<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class languagejs extends ctrl{
	
	function index($data){
		if(true){
			header("Content-Type: text/js");
			echo "\nvar lang = new Object();\n";
			foreach($data['lang'] as $key => $value){
				$key = str_replace("-","_",$key);
				echo "lang.".$key." = \"".$value."\";\n";
			}
			
		}
	}
}
?>    