<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class tpl{ 
	function __construct($tpl){
		require_once "template/".$tpl['tpl'].".php";
	}
}

class loadtpl{
	function __construct($data){
		//require_once "template/".$data['tpl'].".php";
		new tpl($data);
	}
}