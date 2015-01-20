<?php
/**
	*Clase contenedora de los titulos y contenidos de cada una de las partes de la pagina (cabecera, cuerpo y pie)
*/
class elemento{
	/**
		*@var $titulo string 
		*@var $contenido string 
	*/
	public $titulo;
	public $contenido;
	
	function __construct(){
		$this->titulo = "";	
	}
	
	/**
		*@param $str string contenido de alguna de las partes de la pagina (cabecera, cuerpo, pie)
	*/
	public function setContenido($str){
		$this->contenido=$str;
	}

	/**
		*@param $str string titulo de alguna de las partes de la pagina (cabecera, cuerpo, pie)
	*/
	public function setTitulo($str){
		$this->titulo=$str;
	}
	
	/**
		*@return devuelve el titulo y el contenido
	*/
	function __toString(){
		return "</br>".$this->titulo."</br>".$this->contenido."</br>";
	}
}
?>
