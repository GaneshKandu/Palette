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
	$zip = new ZipArchive();
	//open the archive
	if ($zip->open(PATH.DS.'data'.DS.'data.zip') === TRUE) {
		$zip->extractTo(PATH.DS.'sites'.DS.$project.DS);
		$zip->close();
		if(is_dir(PATH.DS.'sites'.DS.$project.DS)){
			return true;
		}else{
			return false;
		}
	} else {
		return false;
	}
}

function html_page($body){

return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Palette</title>
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icon.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/metro.js"></script>
	<script src="js/palette.js"></script>
</head>
<body>$body</body>
</html>
HTML;
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
		echo $body;
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

function image_snap($file,$width = 64,$height = 48){
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
