<?php
//comprobamos que el nombre de usuario y la contraseña sean correctos
require "cManager.php";

class auth {

function __construct(){
	}
	

	function login(){
		if ($_POST["user"]=="asd" && $_POST["pass"]=="asd"){
			//en caso afirmativo iniciamos sesion y volvemos a index.php
			@session_start();
			$_SESSION["autentificado"]= "SI";
			header("Location:index.php?id=gz");
		}else {
			//en caso negativo nos devuelve a index.php con id=erroruser , indicando que el usuario ha cometido un error al indicar la contraseña y el nombre de usuario
			$cManager = new cManager();
			$cManager->addError();
			header("Location:index.php?id=erroruser");
		}
	}
	
	function logged(){
		@session_start();
		//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
		if(isset($_SESSION["autentificado"])){
			if ($_SESSION["autentificado"] = "SI") {
				return true;
			}
		}
		return false;
	}
	
	function forbidden(){
		@session_start();

		//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
		if ($_SESSION["autentificado"] != "SI") {
			//si no existe, envio a la página de autentificacion
			header("Location: index.php?id=errorperm");
			//ademas salgo de este script
		}
	}
	
	function logout(){
		//iniciamos sesion
		@session_start();
		//liberamos las variables de sesion
		session_unset();
		//destruimos toda la información asociada con la sesión actual
		session_destroy();
		//regresamos a index.php
		header ("Location:index.php?id=exit");
		}
	
}


?> 