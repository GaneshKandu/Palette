<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class user{

	var $userdetail = array();
	
	function isValidUser($user,$pass){
		$admin = unserialize(ADMIN);
		if(isset($admin[$user])){
			if(md5($pass) == $admin[$user]){
				$this->userdetail = array('id'=>'1','user'=>$user,'$pass'=>$pass);
				return true;
			}
		}
		return false;
	}
	function getUserDetail(){
		return $this->userdetail;
	}
}