<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class login{
	
	function index($data){
		$data['tpl'] = "login";
		$data['title'] = "Palette Login";
		return $data;
	}
	
	function getlogin($data){
		$login = new user();
		$session = new session();
		if(isset($_POST['user_login'])){
			$user = $_POST['user_login'];
			if(isset($_POST['user_password'])){
				$pass = $_POST['user_password'];
			}
			else{
				return false;
			}	
		}
		else{
			return false;
		}
		if($login->isValidUser($user,$pass)){
			$user = $login->getUserDetail();
			$session->setSession($user);
			$n = new notify();
			$msg = array(
				'caption' => $data['lang']['Login'],
				'content' => $data['lang']['ls'],
				'type' => "success"
			);
			$n->setnotification($msg);
		}
		return $data;
	}
	
}

?>