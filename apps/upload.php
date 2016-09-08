<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class upload extends ctrl{
	
	function index($data){
		if(isset($_POST['path'])){
			$path = $_POST['path'];
		}
		if(!isset($path)){
			$path = PATH.'sites'.DS.'images'.DS;
		}
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$targetPath = $path;
			if(!is_dir($targetPath)){
				mkdir($targetPath);
			}
			$targetFile =  $targetPath. $_FILES['file']['name'];
			move_uploaded_file($tempFile,$targetFile);
		}
		return $data;
	}
	
}
?>    