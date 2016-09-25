<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class language extends ctrl{
	
	function index($data){
		if(true){
			header("Content-Type: text/css");
			echo "*{ direction: ".$data['lang']['lang-align']."; }";
		}
	}
}
?>    