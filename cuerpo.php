<?php
	require_once "elemento.php";
	require "db.php";

/**
    *Clase encargada de la construccion del cuerpo de la pagina
*/
class cuerpo extends elemento{
	function __construct(){
		
	}
	/**
		*Crea una tabla con fotos segun la especificacion de filas y columnas
		*@var $filas integer Numero de filas
		*@var $columnas integer Numero de columnas
	*/
	function setTabla($filas,$columnas){
		$this->setTitulo("Fotos");	
		$str="";
		$contador=1;
		$str="<table>";
		for($i=0;$i<$filas;$i++){
			$str=$str."<tr>";
			for($j=0;$j<$columnas;$j++){
				$photo="photo_".$contador++.".png";
				$str=$str."<td><img src='".$photo."' width='150' height='150'></td>";
			}
			$str=$str."</tr>";
		}
		$str=$str."</table>";
		$this->setContenido($str);
	}
	
	/**
		*Añade un titulo y un texto a la pagina
		*@var $tit string Titulo de la pagina
		*@var $str string Texto de la pagina
	*/
	function setTexto($tit,$str){
		$this->setTitulo("<h2>".$tit."</h2>");
		$this->setContenido($str);		
	}

	/**
		*Añade un formulario para insertar contenido en la base de datos
	*/

	function setForm(){
		$this->setTitulo("<h2>Formulario</h2>");
		$value="";
		$disabled="";
		if(isset($_GET['event'])){$value = $_GET['event'];}	
		$str='<form method="post" action="index.php?id=1&event=SmartInsert" class="pure-form pure-form-aligned">
		<div class="pure-control-group">
		<label for="ID">ID</label>
        <input type="text" pattern="[1-9]{1}[0-9]{0,4}" name="ID" placeholder="ID" value="'.$value.'"/>
		</div>
		<div class="pure-control-group">
		<label for="pais">Pais</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="pais" placeholder="pais" required />
		</div>
		<div class="pure-control-group">
		<label for="ciudad">Ciudad</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="ciudad" placeholder="ciudad" required />
		</div>
		<div class="pure-control-group">
		<label for="lugar">Lugar</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="lugar" placeholder="lugar" required />
		</div>
		<div class="pure-control-group">
		<label for="descripcion">Descripcion</label>
        <textarea class="form-control" rows="3" pattern="[A-Za-zñÑ]{4,255}" name="descripcion" placeholder="descripcion"></textarea>
		</div>
		<div class="pure-control-group">
		<label for="fecha">Fecha</label>
        <input name="fecha" min="1994-01-01" max="2015-01-01" type="date">
		</div>
		<div class="pure-controls">
        <input type="submit" value="Enviar" class="pure-button pure-button-primary">
		</div>
   		</form>';
		$this->setContenido($str);
	}
	
	function setFormP(){
		$this->setTitulo("<h2>Perfil</h2>");
		$value="";
		$db=new db("UserViajes","verify");
		$db->conectar_base_datos();		
		$perf = $db->getPerfil();
		$img = $perf['imagen'];
		$name = $perf['nombre'];
		$surname = $perf['apellido'];
		$str='<form method="post" action="index.php?id=5&event=Upper" enctype="multipart/form-data" class="pure-form pure-form-aligned">
		<div class="pure-control-group">
		<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" width="150" height="150" style="margin-left:100px;"/>
		</div>
		<div class="pure-control-group">
		<input class="file" type="file" name="file" style="margin-left:25px;"></input>
		</div>
		<div class="pure-control-group">
		<label for="nombre">Nombre</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="nombre" placeholder="nombre" value="'.$name.'" required />
		</div>
		<div class="pure-control-group">
		<label for="apellido">Apellido</label>
         <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="apellido" placeholder="apellido" value="'.$surname.'" required />
		<div class="pure-controls">
        <input type="submit" value="Enviar" class="pure-button pure-button-primary">
		</div>
   		</form>';
		$this->setContenido($str);
	}
}
?>