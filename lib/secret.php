<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class secrert{
	function encrypt($in){
		return md5($in);
	}
	function str_shift($str, $len) {
		$len = $len % strlen($str);
		return substr($str, $len) . substr($str, 0, $len);
	}
	function isValidPass($hash,$pass){ 
		if($hash == $this->encrypt($pass)){
			return true;
		}else{
			return false;
		}
	}
}
