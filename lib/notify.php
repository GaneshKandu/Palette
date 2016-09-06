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
		$result = true;
		if(isset($_SESSION['Palette_notify'])){
			$msg = $_SESSION['Palette_notify'];
			if(@unserialize($msg) == false){
				$result =  false;
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
			echo "$.get(\"popup\",function(data, status){});";
			echo "</script>";
		}else{
			$result =  false;
		}
		
		return $result;
	}

	function setnotification($msg){
		$_SESSION['Palette_notify'] = serialize($msg);
	}
}
