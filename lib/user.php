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
		global $userdetail;
		
		/* DO NOT REMOVE
		$conn = new mysqli(DBHOST,DBUSER,DBPASS,DATABASE);
		// check connection
		if (mysqli_connect_errno()) {
		  echo mysqli_connect_error();
		}
		$query = "SELECT id, password FROM `".DBPREFIX."user` WHERE username = '".$user."' limit 1;";
		$result = $conn->query($query);
		while ($row = $result->fetch_object()) {
			if(($row->password) == md5($pass)){
				$userdetail = array('id'=>$row->id,'user'=>$user,'$pass'=>$pass);
				return true;
			}else{
				return false;
			}
		}
		return false;
		*/
		
		$admin = unserialize(ADMIN);
		if(isset($admin[$user])){
			if(md5($pass) == $admin[$user]){
				$userdetail = array('id'=>'1','user'=>$user,'$pass'=>$pass);
				return true;
			}
		}
		return false;
	}
	function getUserDetail(){
		global $userdetail;
		return $userdetail;
	}
}