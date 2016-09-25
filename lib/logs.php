<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

if(!file_exists("logs/error.log")){
	$myfile = fopen("logs/error.log", "w");
}

$error = error_get_last();

if(!empty($error)){
	if(!is_writable("logs/error.log")){
		$n = new notify();
		$msg = array(
			'type' => "warning",
			'caption' => "",
			'content' => "error.log is Not Writable"
		);
		$n->setnotification($msg);
	}
	$log = "[".date("d-m-Y h:i:sa")."] Error Type ".$error['type']." ".$error['message']." in ".$error['file']." on ".$error['line']."\n";
	$logfile = fopen("logs/error.log", 'a');
	fwrite($logfile, $log);
	fclose($logfile);
}
