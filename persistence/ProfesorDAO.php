<?php
class ProfesorDAO{
	private $idProfesor;
	private $nombre;
	private $apellido;
	private $correo;
	private $huella;

	function ProfesorDAO($pIdProfesor = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pHuella = ""){
		$this -> idProfesor = $pIdProfesor;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> huella = $pHuella;
	}

	function insert(){
		return "insert into Profesor(nombre, apellido, correo, huella)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', '" . $this -> huella . "')";
	}

	function update(){
		return "update Profesor set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				correo = '" . $this -> correo . "',
				huella = '" . $this -> huella . "'	
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function select() {
		return "select idProfesor, nombre, apellido, correo, huella
				from Profesor
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function selectAll() {
		return "select idProfesor, nombre, apellido, correo, huella
				from Profesor";
	}

	function selectAllOrder($orden, $dir){
		return "select idProfesor, nombre, apellido, correo, huella
				from Profesor
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idProfesor, nombre, apellido, correo, huella
				from Profesor
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or correo like '%" . $search . "%' or huella like '%" . $search . "%'";
	}
}
?>
