<?php
require_once ("persistence/ExcepcionPersonalDAO.php");
require_once ("persistence/Connection.php");

class ExcepcionPersonal {
	private $idExcepcionPersonal;
	private $descripcion;
	private $profesor;
	private $tipo;
	private $excepcionPersonalDAO;
	private $connection;

	function getIdExcepcionPersonal() {
		return $this -> idExcepcionPersonal;
	}

	function setIdExcepcionPersonal($pIdExcepcionPersonal) {
		$this -> idExcepcionPersonal = $pIdExcepcionPersonal;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function getTipo() {
		return $this -> tipo;
	}

	function setTipo($pTipo) {
		$this -> tipo = $pTipo;
	}

	function ExcepcionPersonal($pIdExcepcionPersonal = "", $pDescripcion = "", $pProfesor = "", $pTipo = ""){
		$this -> idExcepcionPersonal = $pIdExcepcionPersonal;
		$this -> descripcion = $pDescripcion;
		$this -> profesor = $pProfesor;
		$this -> tipo = $pTipo;
		$this -> excepcionPersonalDAO = new ExcepcionPersonalDAO($this -> idExcepcionPersonal, $this -> descripcion, $this -> profesor, $this -> tipo);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idExcepcionPersonal = $result[0];
		$this -> descripcion = $result[1];
		$profesor = new Profesor($result[2]);
		$profesor -> select();
		$this -> profesor = $profesor;
		$tipo = new Tipo($result[3]);
		$tipo -> select();
		$this -> tipo = $tipo;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> selectAll());
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> selectAllByProfesor());
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}

	function selectAllByTipo(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> selectAllByTipo());
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> selectAllOrder($order, $dir));
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> selectAllByProfesorOrder($order, $dir));
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}

	function selectAllByTipoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> selectAllByTipoOrder($order, $dir));
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionPersonalDAO -> search($search));
		$excepcionPersonals = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			$tipo = new Tipo($result[3]);
			$tipo -> select();
			array_push($excepcionPersonals, new ExcepcionPersonal($result[0], $result[1], $profesor, $tipo));
		}
		$this -> connection -> close();
		return $excepcionPersonals;
	}
}
?>
