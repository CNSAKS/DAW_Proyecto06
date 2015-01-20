<?php
	require "pagina.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<?php

	function getURL(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		return $url;
	}

	$auth = new auth();

	if(isset($_GET["id"])){$selPag = $_GET["id"];}else{$selPag = "";}
	if(isset($_GET["event"])){
		switch($_GET["event"]){
			case 'login':
				$auth->login();
				break;
			case 'exit':
				$auth->logout();
				break;
			case 'SmartInsert':
				$db=new db("UserViajes","verify");
				$db->conectar_base_datos();
				$db->SmartInsert();
				break;
			case 'Upper':
				$db=new db("UserViajes","verify");
				$db->conectar_base_datos();
				$db->setPerfil();
				break;
			default:
				break;	
		}
	}
	
	//$url = getURL();
	//$selPag = strstr($url, "id=");

	switch ($selPag) {
		case '1':
		case '':
			$text = "Esta es la pagina de inicio. Para acceder totalmente a la pagina inicie sesion.";
			$pagina = new pagina("Inicio",$text,1);
			$pagina->getPagina();
			break;
		case '2':
			$auth->forbidden();
			$pagina = new pagina(1,4,2);
			$pagina->getPagina();
		break;

		case '3':
			$auth->forbidden();
			$pagina = new pagina(NULL,NULL,3);
			$pagina->getPagina();
		break;

		case '4':
			$text = "Pagina de contacto con el autor. <a href='mailto:cnsaks@gmail.com?Subject=>PaginaWeb'>Click aqui</a> para enviar un correo.";
			$pagina = new pagina("Contacto",$text,1);
			$pagina->getPagina();
		break;
				
		case '5':
			$auth->forbidden();
			$pagina = new pagina(NULL,NULL,4);
			$pagina->getPagina();
		break;
		
		case 'errorperm':
			$text = "<h3 style='color:red;'>No tiene permisos para acceder a esta seccion. Por favor acreditese iniciando sesion.</h3>";
			$pagina = new pagina("Inicio",$text,1);
			$pagina->getPagina();
		break;
		
		case 'gz':
			$text = "<h3 style='color:red;'>GZ</h3>";
			$pagina = new pagina("Inicio",$text,1);
			$pagina->getPagina();
		break;
		
		case 'exit':
			$text = "<h3 style='color:red;'>Se ha desconectado de su sesion</h3>";
			$pagina = new pagina("Inicio",$text,1);
			$pagina->getPagina();
		break;

		case 'erroruser':
			$text = "<h3 style='color:red;'>El nombre de usuario o la contraseña son incorrectos. Por favor vuelva a intentarlo.</h3>";
			$pagina = new pagina("Inicio",$text,1);
			$pagina->getPagina();
		break;

		default:
			$text = "Esta es la pagina de inicio.";
			$pagina = new pagina("Inicio",$text,1);
			$pagina->getPagina();
			break;
	}
	
		
?>
<body>
</body>
</html>