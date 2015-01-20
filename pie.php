<?php
	require_once "elemento.php";
/**
    *Clase encargada de la construccion del pie de la pagina
*/
class pie extends elemento{
	function __construct(){
		$this->setTitulo("");	
	}
	
/**
    *Creacion de un texto que sera el valor del contenido del pie
*/
	function setPie(){
		$str="";
		$str="<hr><center>Creado por CNSAKS</center></hr>";
		$this->setContenido($str);
	}
}
?>