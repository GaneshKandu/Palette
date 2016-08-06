<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class loadtpl{
	function __construct($data){
		require_once "template/".$data['tpl'].".php";
		new tpl($data);
	}
}