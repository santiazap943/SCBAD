<?php
require_once ("persistence/ProfesorDAO.php");
require_once ("persistence/Connection.php");

class Profesor {
	private $idProfesor;
	private $nombre;
	private $apellido;
	private $correo;
	private $huella;
	private $profesorDAO;
	private $connection;

	function getIdProfesor() {
		return $this -> idProfesor;
	}

	function setIdProfesor($pIdProfesor) {
		$this -> idProfesor = $pIdProfesor;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getApellido() {
		return $this -> apellido;
	}

	function setApellido($pApellido) {
		$this -> apellido = $pApellido;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getHuella() {
		return $this -> huella;
	}

	function setHuella($pHuella) {
		$this -> huella = $pHuella;
	}

	function Profesor($pIdProfesor = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pHuella = ""){
		$this -> idProfesor = $pIdProfesor;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> huella = $pHuella;
		$this -> profesorDAO = new ProfesorDAO($this -> idProfesor, $this -> nombre, $this -> apellido, $this -> correo, $this -> huella);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idProfesor = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> correo = $result[3];
		$this -> huella = $result[4];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAll());
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllOrder($order, $dir));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> search($search));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $profesors;
	}
}
?>
