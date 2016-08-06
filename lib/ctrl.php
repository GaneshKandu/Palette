<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

abstract class ctrl{
	
	public $data = array();
	
	function index($data){
		return $data;
	}
	
	function __construct(){
		$ses = new session();
		$data['user'] = $ses->UserDetail();
		$data['url'] = URL.'/';
		if(!$ses->isValidSession()){
			header('Location:'.URL.'/login');
		}else{
			if($ses->isLogined() == 'false'){
				$ses->Login();
				header('Location:'.URL.'/dashboard');
			}
		}
	}
}