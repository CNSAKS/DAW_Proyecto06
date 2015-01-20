<?php
	class cManager{
		function addError(){
			if(!isset($_COOKIE["failUser"])){
							setcookie("failUser",1,time()+60);
						}else{
							setcookie("failUser",$_COOKIE["failUser"]+1,time()+60);
						}	
			}
	}
?>