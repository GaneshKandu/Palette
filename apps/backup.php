<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class backup{
	function index($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | backup";
		$data['content'] = 'backup';
		return $data;
	}
	
	function restore_backup($data){
		$backup = isset($_POST['backup'])?(trim($_POST['backup'])):null;
		$action = isset($_POST['action'])?(trim($_POST['action'])):null;
		$zip = new ZipArchive();
		if ($zip->open(".palette".DS."backup".DS.$backup) === TRUE){
			if(@$zip->extractTo(PATH.DS.'sites'.DS)){
				$n = new notify();
				$msg = array(
					'caption' => $data['lang']['backup'],
					'content' => $data['lang']['res'],
					'type' => "success"
				);
				$n->setnotification($msg);
			}else{
				$n = new notify();
				$msg = array(
					'caption' => $data['lang']['backup'],
					'content' => $data['lang']['ures'],
					'type' => "warning"
				);
				$n->setnotification($msg);
			}
			$zip->close();
		}
		return $data;
	}
	
	function delete_backup($data){
		$backup = isset($_POST['backup'])?(trim($_POST['backup'])):null;
		$action = isset($_POST['action'])?(trim($_POST['action'])):null;
		$file = ".palette".DS."backup".DS.$backup;
		if(!empty($backup)){
			if(is_file($file)){
				unlink($file);
			}
			if(file_exists($file)){
				$n = new notify();
				$msg = array(
					'caption' => $data['lang']['backup'],
					'content' => $data['lang']['utd'],
					'type' => "warning"
				);
				$n->setnotification($msg);
			}else{
				$n = new notify();
				$msg = array(
					'caption' => $data['lang']['backup'],
					'content' => $data['lang']['rs'],
					'type' => "success"
				);
				$n->setnotification($msg);
			}
		}
		return $data;
	}
}

?>