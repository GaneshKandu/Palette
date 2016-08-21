<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

session_start();
$data = array();
$start_time = microtime(true);
require_once "lib/session.php";
require_once '__pallete.php';
if(file_exists("config/config.php")){
	require_once "config/config.php";
}
require_once "lib/functions.php";
require_once "lib/default.php";
require_once "lib/notify.php";
require_once "lib/ctrl.php";
require_once "lib/user.php";
if(isset($_GET['url'])){
	$url = $_GET['url'];
	$urldata = explode("/",$url);
	if(isset($urldata[0])){
		$file = $urldata[0];
		if(file_exists("apps/".$file.".php")){
			require_once "apps/".$file.".php";
		}else{
			require_once "apps/dashboard.php";
			$file = 'dashboard';
			/* throw 404 error */
		}
	}else{
		require_once "apps/dashboard.php";
		$file = 'dashboard';
		/* throw 404 error */
	}
}else{
	require_once "apps/dashboard.php";
	$file = 'dashboard';
}
$ctrl = new $file;

/* Project filemanager */
if(isset($urldata[0])){
	$faf = array();
	if($urldata[0] == 'projects'){
		if(isset($urldata[1]) && isset($urldata[2])){
			$path = PATH.DS.'sites'.DS.$urldata[2].DS;
			$i = 3;
			$url = URL.'/projects/files/'.$urldata[2];
			$realurl = URL.'/sites/'.$urldata[2];
			$editurl = URL.'/editor/'.$urldata[2];
			$relative = $urldata[2];
			while(isset($urldata[$i])){
				$path .= $urldata[$i].DS;
				$url .= '/'.$urldata[$i];
				$editurl .= '/'.$urldata[$i];
				$realurl .= '/'.$urldata[$i];
				$relative .= DS.$urldata[$i];
				$i++;
			}
			$data['project'] = glob($path.DS.'*');
			$len = strlen($path.DS);
			$faf['a'] = array();
			$faf['b'] = array();
			foreach($data['project'] as $qazxsw){
				if (is_dir($qazxsw)){
					$faf['a']['folders'][] = substr($qazxsw,$len,strlen($qazxsw)-$len);
				}else{
					$faf['b']['files'][] = substr($qazxsw,$len,strlen($qazxsw)-$len);
				}
			}
			if(isset($faf['a']) && isset($faf['b'])){
				if(is_array($faf['a']) && is_array($faf['b'])){
					$data['project'] = array_merge($faf['a'],$faf['b']);
				}
			}
			$data['project']['project'] = $urldata[2];
			$data['project']['path'] = $path;
			$data['project']['url'] = $url;
			$data['project']['editurl'] = $editurl;
			$data['project']['realurl'] = $realurl;
			$data['project']['relatpath'] = $relative;
		}
	}
}
/* Project editor */
if(isset($urldata[0])){
	if($urldata[0] == 'editor'){
		$data['project']['path'] = PATH.DS.'sites'.DS;
		if(isset($urldata[1])){
			$data['project']['name'] = $urldata[1];
			$data['project']['path'] .= $data['project']['name'];
			$data['project']['url'] = $data['url'].'sites'.'/'.$data['project']['name'];
			$data['project']['dashurl'] = $data['url'].'projects/files'.'/'.$data['project']['name'];
			for($i = 2 ; isset($urldata[$i]) ; $i++){
				$dfvdfg[] = $urldata[$i];
				$data['project']['path'] .= DS.$urldata[$i];
				$data['project']['url'] .= '/'.$urldata[$i];
			}
			if(isset($dfvdfg)){
				$data['project']['file'] = $dfvdfg[(count($dfvdfg) - 1)];
				unset($dfvdfg[(count($dfvdfg) - 1)]);
				$data['project']['dirs'] = $dfvdfg;
			}else{
				$data['project'] = array();
			}
		}
	}
}

if(isset($urldata[1])){
	$func = $urldata[1];
	if(method_exists($ctrl,$func)){
		$data = $ctrl->{$func}($data);
	}else{
		$data = $ctrl->index($data);
	}
}else{
	$data = $ctrl->index($data);
}
if(isset($data['tpl'])){
	$tpl = $data['tpl'];
	if(file_exists("template/".$tpl.".php")){
		require_once "lib/loadtpl.php";
		new loadtpl($data);
	}
}else{
	require_once "apps/dashboard.php";
	$file = 'dashboard';
	/* throw 404 error */
}
require_once "lib/logs.php";
$end_time = microtime(true);
$data['time2respond'] = 'Script executed in '. round(($end_time - $start_time), 3) . 'seconds.';
__pallete($data,1);
?>