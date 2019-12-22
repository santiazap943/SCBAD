<?php
require_once ("persistence/InscripcionDAO.php");
require_once ("persistence/Connection.php");

class Inscripcion {
	private $idInscripcion;
	private $periodo;
	private $profesor;
	private $inscripcionDAO;
	private $connection;

	function getIdInscripcion() {
		return $this -> idInscripcion;
	}

	function setIdInscripcion($pIdInscripcion) {
		$this -> idInscripcion = $pIdInscripcion;
	}

	function getPeriodo() {
		return $this -> periodo;
	}

	function setPeriodo($pPeriodo) {
		$this -> periodo = $pPeriodo;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function Inscripcion($pIdInscripcion = "", $pPeriodo = "", $pProfesor = ""){
		$this -> idInscripcion = $pIdInscripcion;
		$this -> periodo = $pPeriodo;
		$this -> profesor = $pProfesor;
		$this -> inscripcionDAO = new InscripcionDAO($this -> idInscripcion, $this -> periodo, $this -> profesor);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idInscripcion = $result[0];
		$this -> periodo = $result[1];
		$profesor = new Profesor($result[2]);
		$profesor -> select();
		$this -> profesor = $profesor;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> selectAll());
		$inscripcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($inscripcions, new Inscripcion($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $inscripcions;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> selectAllByProfesor());
		$inscripcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($inscripcions, new Inscripcion($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $inscripcions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> selectAllOrder($order, $dir));
		$inscripcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($inscripcions, new Inscripcion($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $inscripcions;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> selectAllByProfesorOrder($order, $dir));
		$inscripcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($inscripcions, new Inscripcion($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $inscripcions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> inscripcionDAO -> search($search));
		$inscripcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($inscripcions, new Inscripcion($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $inscripcions;
	}
}
?>
