<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class projects extends ctrl{
	
	function newproject($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | New Project";
		$data['content'] = 'newproject';
		return $data;
	}
	
	function createproject($data){
		if(isset($_POST['newproject'])){
			if($_POST['newproject'] == ""){
				return true;
			}
			$n = new notify();
			if(make_project($_POST['newproject'])){
				$msg = array(
					'caption' => "Project",
					'content' => "Project Successfully Created",
					'type' => "success"
				);
			}else{
				$msg = array(
					'caption' => "Project",
					'content' => "Error Occured",
					'type' => "Alert"
				);
				
			}
			$n->setnotification($msg);
		}
	}
	
	function createfile($data){
		if(isset($_POST['file'])){
			if($_POST['file'] == ""){
				return true;
			}
			$file = trim($_POST['file']);
			$index = fopen(PATH.DS.'template'.DS.'default.txt', "r");
			$indexcont = "";
			while(!feof($index)) { 
				$indexcont .= fgets($index);
			}
			$f = explode('/',$file);
			$ds = "";
			for($i = 0;$i < (count($f)-1);$i++ ){
				$ds .= $f[$i].DS;
				mkdir($_POST['directory'].$ds);
			}
			$default = fopen($_POST['directory'].$file.'.html', "w");
			fwrite($default, $indexcont);
			fclose($default);
			$n = new notify();
			if(is_file($_POST['directory'].$file.'.html')){
				$msg = array(
					'caption' => "Project",
					'content' => "Page Created Successfully",
					'type' => "success"
				);
			}else{
				$msg = array(
					'caption' => "Project",
					'content' => "Unable Create Page",
					'type' => "warning"
				);
				
			}
			$n->setnotification($msg);
		}
		return $data;
	}

	function files($data){
		$imgext = array("jpeg", "png", "gif", "bmp","jpg");
		$path = $data['project']['path'];
		if(isset($data['project']['files'])){
			foreach($data['project']['files'] as $file){
				$filext = explode(".",$file);
				$filext = end($filext);
				if(in_array($filext,$imgext)){
					if(!file_exists('thumbs'.DS.md5_file($path.$file))){
						image_snap($path.$file);
					}
				}
			}
		}
		$data['tpl'] = "template";
		$data['title'] = "Palette | ".$data['project']['project'];
		$data['content'] = 'files';
		return $data;
	}
	
	function remove($data){
		if(isset($_POST['project'])){
			$proj = $_POST['project'];
		}else{
			echo "fail";
			return false;
		}
		
		$n = new notify();
		if(delete_project(PATH.DS.'sites'.DS.$proj)){
			$msg = array(
				'caption' => "",
				'content' => "Removed Successfully",
				'type' => "success"
			);
		}else{
			$msg = array(
				'caption' => "",
				'content' => "Unable To Delete",
				'type' => "warning"
			);
		}
		$n->setnotification($msg);
		return $data;
	}
	
	function save(){
		$path = '';
		if(isset($_POST['project'])){
			$prosave = unserialize(base64_decode(trim($_POST['project'])));
		}
		if(!isset($prosave['name'])){
			echo "unsuccess";
			return false;
		}
		if(isset($prosave['file'])){
			if(strlen($prosave['file']) == 0){
				echo "unsuccess";
				return false;
			}
		}
		if (!is_dir (PATH.DS.'sites'.DS.$prosave['name'])){
			mkdir(PATH.DS.'sites'.DS.$prosave['name'], 0770);
		}
		$path .= PATH.DS.'sites'.DS.$prosave['name'];
		foreach($prosave['dirs'] as $dir){
			if (!is_dir ($path.DS.$dir)){
				mkdir($path.DS.$dir, 0770);
			}				
			$path .= DS.$dir;
		}
		$html = $_POST['html'];
		$html = html_page($html);
		$file = $path.DS.$prosave['file'];
		if(!is_writable($file)){
			echo 'unsuccess';
			return false;
		}else{
			$save = @fopen($file, "w");
			$info = stat($file);
			if((time() - $info['mtime']) <= 5){
				echo "success";
			}
		}
		fwrite($save, $html);
		fclose($save);
	}
}
?>