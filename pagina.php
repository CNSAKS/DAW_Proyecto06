<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";
require_once "db.php";

/**
    *Clase encargada de organizar la estructura de la pagina
*/
class pagina{
	/**
		*@var $titulo string titulo de la pagina
		*@var $cabecera class clase cabecera
		*@var $cuerpo class clase cuerpo
		*@var $pie class clase pie
	*/
	public $titulo="Titulo de la pagina";
	private $cabecera,$cuerpo,$pie;
	//id action 1 = texto puro; 2 = table; 3 = form insertar; 4 = form perfil;
	function __construct($param1,$param2,$idAction){
		$this->cabecera = new cabecera();
		//$this->cabecera->setDireccion("Contacto","http://169.254.154.238/Proyecto03/contacto.php");
		$this->cabecera->setMenu();		
		$this->cuerpo = new cuerpo();
		switch($idAction){
			
		case '1':	
			if(!is_null($param1) && !is_null($param2)){
				$this->cuerpo->setTexto($param1,$param2);
			}
			break;
			
		case '2':	
			if(!is_null($param1) && !is_null($param1)){
			$db=new db("UserViajes","verify");
			$db->conectar_base_datos();
			$this->cuerpo->setTexto("Tabla", $db->getLugares());
			}
			break;
			
		case '3':
			$this->cuerpo->setForm();
			break;
		
		case '4':
			$this->cuerpo->setFormP();
			break;
			
		default:
			$this->cuerpo->setForm();
			break;
		}
		

		$this->pie = new pie();
		$this->pie->setPie();	
	}
	
	/**
    	*Recupera la pagina mediante las clases creadas anteriormente en el constructor
	*/
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}

}
?>