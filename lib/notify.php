<?php

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

/*
caption
content
type
keepOpen
*/

class notify{
	function get_notification(){
		if(isset($_SESSION['Palette_notify'])){
			$msg = $_SESSION['Palette_notify'];
			if(@unserialize($msg) == false){
				return false;
			}			
			$msg = unserialize($msg);
			echo "<script>";
			echo "$.Notify({";
			$flag = true;
			foreach($msg as $key => $value){
				if(!$flag){echo ",";}else{$flag = false;}
				echo $key.":'".$value."'";
			}
			echo "});";
			echo "</script>";
		}else{
			return false;
		}
		if(isset($_SERVER['REDIRECT_STATUS'])){
			if($_SERVER['REDIRECT_STATUS'] == 200){
				$_SESSION['Palette_notify'] = null;
			}
		}
	}

	function setnotification($msg){
		$_SESSION['Palette_notify'] = serialize($msg);
	}
}
