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
		if(MULTISITE){
			$data['tpl'] = "template";
			$data['title'] = "Palette | New Project";
			$data['content'] = 'newproject';
		}else{
			if(is_dir(PATH.DS."sites".DS."palette")){
				header("location:projects/files/palette");
			}else{
				$data['tpl'] = "template";
				$data['title'] = "Palette | New Project";
				$data['content'] = 'newproject';
			}
		}
		
		return $data;
	}
	
	function createproject($data){
		$project = array();
		if(isset($_POST['newproject'])){
			
			$project['project'] = $_POST['newproject'];
						
			if($_POST['newproject'] == ""){
				return false;
			}
			
			$project['title'] = isset($_POST['title'])?(trim($_POST['title'])):null;
			$project['robots'] = isset($_POST['robots'])?(trim($_POST['robots'])):null;
			$project['description'] = isset($_POST['description'])?(trim($_POST['description'])):null;
			$project['keywords'] = isset($_POST['keywords'])?(trim($_POST['keywords'])):null;
			$project['icon'] = isset($_POST['icon'])?(trim($_POST['icon'])):null;
			
			$n = new notify();
			if(make_project($project)){
				$msg = array(
					'caption' => $data['lang']['Project'],
					'content' => $data['lang']['pcs'],
					'type' => "success"
				);
			}else{
				$msg = array(
					'caption' => $data['lang']['Project'],
					'content' => $data['lang']['eo'],
					'type' => "Alert"
				);
			}
			$n->setnotification($msg);
		}
		
		return $data;
	}
	
	function newfile($data){
		$data['tpl'] = "template";
		$data['title'] = "Palette | New File";
		$data['content'] = 'newfile';
		return $data;
	}
	
	function createfile($data){
		if(isset($_POST['file'])){
			if($_POST['file'] == ""){
				return true;
			}
			$file = trim($_POST['file']);
			
			$title = isset($_POST['title'])?(trim($_POST['title'])):null;
			$robots = isset($_POST['robots'])?(trim($_POST['robots'])):null;
			$description = isset($_POST['description'])?(trim($_POST['description'])):null;
			$keywords = isset($_POST['keywords'])?(trim($_POST['keywords'])):null;
			$icon = isset($_POST['icon'])?(trim($_POST['icon'])):null;
			$baseurl = isset($_POST['baseurl'])?(trim($_POST['baseurl'])):0;
			$baseurl = $baseurl + (count(explode("/",$file))-1);
			for($i = 0;$i < $baseurl;$i++){
				$base .= "../";
			}
			
			if(!MULTISITE){
				$base = $data['url'].'sites/palette/';
			}
			
			$indexcont = file_get_contents(PATH.DS.'data'.DS.'default.txt');
			
			$meta = array(
				'{{title}}' => tohtml($title),
				'{{robots}}' => tohtml($robots),
				'{{description}}' => tohtml($description),
				'{{keywords}}' => tohtml($keywords),
				'{{icon}}' => tohtml($icon),
				'{{baseurl}}' => tohtml($base)
			);
			
			$indexcont = strtr($indexcont ,$meta);
			
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
					'caption' => $data['lang']['Project'],
					'content' => $data['lang']['pgcs'],
					'type' => "success"
				);
			}else{
				$msg = array(
					'caption' => $data['lang']['Project'],
					'content' => $data['lang']['utcp'],
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
					if(!file_exists('thumbs'.DS.md5_file($path.$file).'.cache.jpeg')){
						image_snap($path.$file,$data);
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
				'content' => $data['lang']['rs'],
				'type' => "success"
			);
		}else{
			$msg = array(
				'caption' => "",
				'content' => $data['lang']['utd'],
				'type' => "warning"
			);
		}
		$n->setnotification($msg);
		return $data;
	}
	
	function save($data){
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
		$body = $_POST['html'];
		$file = $path.DS.$prosave['file'];
		$body = html_page($body,$file);
		
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
		fwrite($save, $body);
		fclose($save);
	}
	
	function backup($data){
		$project = isset($_POST['project'])?(trim($_POST['project'])):null;
		$action = isset($_POST['action'])?(trim($_POST['action'])):null;
		$source = 'sites'.DS.$project;
		if (!is_dir (PATH.DS.'.palette'.DS."backup")){
			mkdir(PATH.DS.'.palette'.DS."backup", 0770);
		}				
		$destination = PATH.DS.'.palette'.DS."backup".DS.$project."_".date('Y_m_d_H_i_s')."_".time().".zip.backup";
		if(!empty($project)){
			make_zip($source, $destination);
		}
		if(file_exists($destination)){
			$n = new notify();
			$msg = array(
				'caption' => $data['lang']['backup'],
				'content' => $data['lang']['backup']." ".$data['lang']['bct'],
				'type' => "success"
			);
			$n->setnotification($msg);
		}else{
			$n = new notify();
			$msg = array(
				'caption' => $data['lang']['backup'],
				'content' => $data['lang']['utc']." ".$data['lang']['backup'],
				'type' => "warning"
			);
			$n->setnotification($msg);
		}
		return $data;
	}
	
	function downloadzip($data){
		$project = isset($_POST['project'])?(trim($_POST['project'])):null;
		$action = isset($_POST['action'])?(trim($_POST['action'])):null;
		$source = 'sites'.DS.$project;
		if (!is_dir (PATH.DS.'.palette'.DS."downloads")){
			mkdir(PATH.DS.'.palette'.DS."downloads", 0770);
		}
		echo $zip_file = $project."_".date('Y_m_d_H_i_s')."_".time().".zip";	
		$destination = PATH.DS.'.palette'.DS."downloads".DS.$zip_file;
		if(!empty($project)){
			make_zip($source, $destination);
		}
		return $data;
	}
}
?>