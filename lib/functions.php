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
		return true;
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