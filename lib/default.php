<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

$data = array();
$data['projects'] = glob(PATH.DS.'sites'.DS.'*');
$l1 = strlen(PATH.DS.'sites'.DS);
foreach($data['projects'] as $key => $value){
	$l2 = strlen($value);
	$data['projects'][$key] = substr($value,$l1,($l2-$l1));
}
$session = new session();
$data['user'] = $session->UserDetail();
$data['url'] = URL.'/';

