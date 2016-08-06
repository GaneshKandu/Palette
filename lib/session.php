<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class session{
	function isValidSession(){
		if(isset($_SESSION['Palette'])){
			$session = unserialize(base64_decode($_SESSION['Palette']));
			if(isset($session[substr(md5(SECRET),0,6)])){
				if($session[substr(md5(SECRET),0,6)] == SECRET){
					return true;
				}else{
					return false;
				}
			}
		}
		return false;
	}
	function setSession($user){
		$user[substr(md5(SECRET),0,6)] = SECRET;
		$_SESSION['Palette'] = base64_encode(serialize($user));
		$_SESSION['Palette_Login'] = 'false';
	}
	function Login(){
		if(isset($_SESSION['Palette_Login'])){
			$_SESSION['Palette_Login'] = 'true';
		}
	}
	function isLogined(){
		if(isset($_SESSION['Palette_Login'])){
			return $_SESSION['Palette_Login'];
		}
	}
	function UserDetail(){
		if(isset($_SESSION['Palette'])){
			return unserialize(base64_decode($_SESSION['Palette']));
		}
	}
} 
?>