<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class dashboard extends ctrl{
	
	function index($data){
		if(MULTISITE){
			$data['tpl'] = "template";
			$data['title'] = "Palette";
			$data['content'] = 'dashboard';
		}else{
			if(file_exists(PATH.DS.".palette".DS."site")){
				$project = trim(file_get_contents(PATH.DS.".palette".DS."site"));
				if(is_dir(PATH.DS."sites".DS.$project)){
					if(!empty($project)){
						header("location:projects/files/".$project);
					}
				}else{
					header("location:projects/newproject");
				}
			}else{
				header("location:projects/newproject");
			}
		}
		return $data;
	}
	
	function about($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | About";
		$data['content'] = 'about';
		return $data;
	}
	
	function profile($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | profile";
		$data['content'] = 'profile';
		return $data;
	}
	
}

?>