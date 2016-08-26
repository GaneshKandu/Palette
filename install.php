<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/


$prereq = false;

if(file_exists("config".DIRECTORY_SEPARATOR ."INSTALL")){
	header("Location:index.php");	
}

if(isset($_POST['action'])){
	$admin = $password = $repassword = "";
	if(isset($_POST['admin'])){
		$admin = $_POST['admin'];
	}
	
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	
	if(isset($_POST['repassword'])){
		$repassword = $_POST['repassword'];
	}
	
	if(($admin == "") || ($password == "") || ($repassword = "")){
		echo "fail";
		die();
	}
	if($password == $repassword){
		echo "fail";
		die();
	}
$pass = md5($password);

$protocol = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')=== FALSE) ? 'http' : 'https';
$host     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$Url = $protocol . '://' . $host . $script;
$Url = substr($Url,0,(strlen($Url) - 12));

$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
$secret='';
for($i=0;$i<64; $i++)
{
	$secret .= $chars[ rand(0,strlen($chars)-1)];

}
	
$config = <<<CONFIG
<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

define('DS', DIRECTORY_SEPARATOR); 
define('SECRET','$secret');
define('URL','$Url');
define('PATH', getcwd());
\$admin = array(
	'$admin'=> '$pass'
);
define('ADMIN',serialize(\$admin));

?>
CONFIG;

$relpath = $_SERVER['SCRIPT_NAME'];
$relpath = substr($relpath,0,(strlen($relpath) - 11));

$htaccess = <<<HTACCESS
<IfModule mod_rewrite.c>
	RewriteEngine On
	Options -Indexes
	RewriteBase $relpath
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-l
	RewriteCond %{REQUEST_URI} !\.(js|css|jpeg|gif|png|bmp|ico)$ [NC]
	RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
</IfModule>
HTACCESS;


$save = fopen(".htaccess", "w");
fwrite($save, $htaccess);
fclose($save);

$save = fopen("config" . DIRECTORY_SEPARATOR . "config.php", "w");
fwrite($save, $config);
fclose($save);

$INSTALL = fopen("config".DIRECTORY_SEPARATOR ."INSTALL", "w");
fwrite($INSTALL,time());
fclose($INSTALL);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Palette Install</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="css/metro.css" rel="stylesheet" >
    <link href="css/metro-icon.css" rel="stylesheet" >
    <script src="js/jquery.min.js"></script>
    <script src="js/metro.js"></script>
	<style>
	body {
		-moz-user-select: text;
		background-color: #71b1d1;
	}

	#installac {
		background-color: #0072c6;
		padding: 25px;
	}
	</style>
</head>
<body class="bg-darkTeal" >
<div class="login-form padding20 block-shadow" style="width:500px;margin-left:auto;margin-right:auto;margin-top: 50px;background-color: #666;">
	<?php if(checkprereq()){ ?>
	<h1 style="font-size: 40px; line-height: 1; color:#fff; " class="text-shadow metro-title text-light">Palette Install</h1>
	<hr class="thin bg-grayLighter">
	<h1 style="font-size: 25px; line-height: 1; color:#fff; " class="text-shadow metro-title text-light">Admin</h1>
	<div class="input-control text" style="width:100%" >
		<input id="admin" type="text">
	</div>
	<h1 style="font-size: 25px; line-height: 1; color:#fff; " class="text-shadow metro-title text-light">Password</h1>
	<div class="input-control text" style="width:100%" >
		<input id="password" type="password">
	</div>
	<h1 style="font-size: 25px; line-height: 1; color:#fff; " class="text-shadow metro-title text-light">Repeat Password</h1>
	<div class="input-control text" style="width:100%" >
		<input id="repassword" type="password">
	</div>
	<button class="button info" id="install" style="font-size: 25px; line-height:0; color:#fff;" >Install</button>
	<hr class="thin bg-grayLighter">
	<?php } ?>
</div>
<script>
	document.body.addEventListener('keydown', function(e) {
		if(e.keyCode == 13){
			install();
		}
	});
</script>
<script src="js/palettecms.js"></script>
</body>
</html>
<?php 

function checkprereq(){
	$done = true;
	$extensions = array(
		"gd",
		"zip"
	);
	
	$files = array(
		"logs" . DIRECTORY_SEPARATOR . "error.log",
		"config",
		"thumbs",
		"sites",
		".htaccess"
	);

	foreach($extensions as $extension){
		if(!extension_loaded($extension)){
			echo "<div class=\"grid\">
					<div class=\"row\">
						<div class=\"cell\" style=\"padding:10px;color:#FFF;background-color:#F00;font-size:20px\">Extension ".$extension." is Installed</div>
					</div>
				 </div>";
				$done = false;
		}
	}
	
	foreach($files as $file){
		if(!is_writable($file)){
			echo "<div class=\"grid\">
					<div class=\"row\">
						<div class=\"cell\" style=\"padding:10px;color:#FFF;background-color:#F00;font-size:20px\">".$file." is Not Writable</div>
					</div>
				 </div>";
				$done = false;
		}
	}
	return $done;
}

?>
