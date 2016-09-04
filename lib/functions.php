<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

function getURL(){
	$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} 
	else 
	{
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
	
}
function nFURL(){
	$protocol = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')=== FALSE) ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];
    $currentUrl = $protocol . '://' . $host . $script;
    return $currentUrl;
}

function make_project($project){
	$return = false;
	$zip = new ZipArchive();
	//open the archive
	if ($zip->open(PATH.DS.'data'.DS.'data.zip') === TRUE) {
		$zip->extractTo(PATH.DS.'sites'.DS.$project['project'].DS);
		$zip->close();
		if(is_dir(PATH.DS.'sites'.DS.$project['project'].DS)){
			$return =  true;
		}else{
			$return =  false;
		}
	} else {
		$return =  false;
	}
	
	$indexcont = file_get_contents(PATH.DS.'sites'.DS.$project['project'].DS.'index.html');
	
	$meta = array(
		'{{title}}' => tohtml($project['title']),
		'{{robots}}' => tohtml($project['robots']),
		'{{description}}' => tohtml($project['description']),
		'{{keywords}}' => tohtml($project['keywords']),
		'{{icon}}' => tohtml($project['icon']),
		'{{baseurl}}' => ''
	);
			
	$indexcont = strtr($indexcont ,$meta);
	
	$indexcont = file_put_contents(PATH.DS.'sites'.DS.$project['project'].DS.'index.html',$indexcont);
	
	return $return; 
}

function html_page($body,$file){
	$html = file_get_contents($file);
	$old_body = get_body_content($file);
	return str_replace($old_body,$body,$html);
}

function delete_project($dir) {
	
	if(is_dir($dir)){
		$files = glob($dir.DS.'*');
		foreach($files as $file){
			delete_project($file);
		}
		rmdir($dir);
	}else{
		if(file_exists($dir)){
			unlink($dir);	
		}
	}
	if(!is_dir($dir)){
		if(!file_exists($dir)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function gen_random_string($length=16)
{
    $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
    $final_rand='';
    for($i=0;$i<$length; $i++)
    {
        $final_rand .= $chars[ rand(0,strlen($chars)-1)];
 
    }
    return $final_rand;
}

function get_body_content($path){
	$html = file_get_contents($path);
	preg_match('/<body>(.*?)<\/body>/is', $html, $body);
	$body = $body[1];
	if(isset($body)){
		return $body;
	}
}

function checkMemAvailableForResize($filename, $targetX, $targetY,$returnRequiredMem = false, $gdBloat = 1.68) {
    $maxMem = ((int) ini_get('memory_limit') * 1024) * 1024;
    $imageSizeInfo = getimagesize($filename);
    $srcGDBytes = ceil((($imageSizeInfo[0] * $imageSizeInfo[1]) * 3) * $gdBloat);
    $targetGDBytes = ceil((($targetX * $targetY) * 3) * $gdBloat);
    $totalMemRequired = $srcGDBytes + $targetGDBytes + memory_get_usage();
	if($totalMemRequired >= $maxMem){
		$n = new notify();
		$msg = array(
			'caption' => "Memory",
			'content' => "Memory Limit ".ceil(((($totalMemRequired)/1024)/1024))." MB Required",
			'type' => "warning",
			'keepOpen' => "true"
		);
		$n->setnotification($msg);
	}
    if ($returnRequiredMem) return $srcGDBytes + $targetGDBytes;
    if ($totalMemRequired >= $maxMem) return false;
    return true;
}

function image_snap($file,$data,$width = 32,$height = 24){
	$filexport = explode(".",$file);
	$ext = end($filexport);
	$org_info = getimagesize($file);
	
	if (!checkMemAvailableForResize($file, $width, $height)){	
		return false;
	}
	
	if(!extension_loaded("gd")){
		$n = new notify();
		$msg = array(
			'caption' => "Extension",
			'content' => "gd Extension Not Found",
			'type' => "warning",
			'keepOpen' => "true"
		);
		$n->setnotification($msg);
		return false;
	}
	
	if(!is_writable("thumbs")){
		$n = new notify();
		$msg = array(
			'caption' => "Permission",
			'content' => "thumbs is Not Writable",
			'type' => "warning"
		);
		$n->setnotification($msg);
		return false;
	}
	
	switch($ext){
		case 'jpg':
			$rsr_org = @imagecreatefromjpeg($file);
		break;
		case 'png':
			$rsr_org = @imagecreatefrompng($file);
		break;
		case 'gif':
			$rsr_org = @imagecreatefromgif($file);
		break;
		case 'bmp':
			$rsr_org = @imagecreatefromwbmp($file);	
	}
	$thumb = imagecreatetruecolor($width, $height);
	list($swidth, $sheight) = getimagesize($file);
	imagecopyresized($thumb, $rsr_org, 0, 0, 0, 0, $width, $height, $swidth, $sheight);
	imagedestroy($rsr_org);
	imagejpeg($thumb, "thumbs".DS.md5_file($file).".cache.jpeg");
}

function isAjax()
{
    $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return ($header === 'XMLHttpRequest');
}

function ListIn($dir, $prefix = '') {
  $dir = rtrim($dir, '\\/');
  $result = array();

    foreach (scandir($dir) as $f) {
      if ($f !== '.' and $f !== '..') {
          $result[] = $dir.$prefix.$f;
      }
    }
  return $result;
}

$images = array();

function project_images($dir,$length){
	global $images;
	$imgext = array("jpeg", "png", "gif", "bmp","jpg");
	if(is_dir($dir)){
		$files = glob($dir.DS.'*');
		foreach($files as $file){
			project_images($file,$length);
		}
	}else{
		if(file_exists($dir)){
			$arr = explode('.',$dir);
			$ext = end($arr);
			if(in_array($ext,$imgext)){
				$images['images'][md5_file($dir)] = substr($dir,$length,strlen($dir));
			}
		}
	}
	
	if(isset($images['images'])){
		return $images['images'];
	}else{
		return array();
	}
}

function tohtml($txt){
	$arr = array(
		'<' => '&lt;',
		'>' => '&gt;'
	);
	return strtr($txt,$arr);
}
