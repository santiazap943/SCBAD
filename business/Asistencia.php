<?php
require_once ("persistence/AsistenciaDAO.php");
require_once ("persistence/Connection.php");

class Asistencia {
	private $idAsistencia;
	private $fecha;
	private $profesor;
	private $asistenciaDAO;
	private $connection;

	function getIdAsistencia() {
		return $this -> idAsistencia;
	}

	function setIdAsistencia($pIdAsistencia) {
		$this -> idAsistencia = $pIdAsistencia;
	}

	function getFecha() {
		return $this -> fecha;
	}

	function setFecha($pFecha) {
		$this -> fecha = $pFecha;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function Asistencia($pIdAsistencia = "", $pFecha = "", $pProfesor = ""){
		$this -> idAsistencia = $pIdAsistencia;
		$this -> fecha = $pFecha;
		$this -> profesor = $pProfesor;
		$this -> asistenciaDAO = new AsistenciaDAO($this -> idAsistencia, $this -> fecha, $this -> profesor);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAsistencia = $result[0];
		$this -> fecha = $result[1];
		$profesor = new Profesor($result[2]);
		$profesor -> select();
		$this -> profesor = $profesor;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> selectAll());
		$asistencias = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($asistencias, new Asistencia($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $asistencias;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> selectAllByProfesor());
		$asistencias = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($asistencias, new Asistencia($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $asistencias;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> selectAllOrder($order, $dir));
		$asistencias = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($asistencias, new Asistencia($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $asistencias;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> selectAllByProfesorOrder($order, $dir));
		$asistencias = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($asistencias, new Asistencia($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $asistencias;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> asistenciaDAO -> search($search));
		$asistencias = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[2]);
			$profesor -> select();
			array_push($asistencias, new Asistencia($result[0], $result[1], $profesor));
		}
		$this -> connection -> close();
		return $asistencias;
	}
}
?>
