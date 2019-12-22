<?php
require_once ("persistence/AsignaturaDAO.php");
require_once ("persistence/Connection.php");

class Asignatura {
	private $idAsignatura;
	private $nombre;
	private $area;
	private $asignaturaDAO;
	private $connection;

	function getIdAsignatura() {
		return $this -> idAsignatura;
	}

	function setIdAsignatura($pIdAsignatura) {
		$this -> idAsignatura = $pIdAsignatura;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getArea() {
		return $this -> area;
	}

	function setArea($pArea) {
		$this -> area = $pArea;
	}

	function Asignatura($pIdAsignatura = "", $pNombre = "", $pArea = ""){
		$this -> idAsignatura = $pIdAsignatura;
		$this -> nombre = $pNombre;
		$this -> area = $pArea;
		$this -> asignaturaDAO = new AsignaturaDAO($this -> idAsignatura, $this -> nombre, $this -> area);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAsignatura = $result[0];
		$this -> nombre = $result[1];
		$area = new Area($result[2]);
		$area -> select();
		$this -> area = $area;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> selectAll());
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			$area = new Area($result[2]);
			$area -> select();
			array_push($asignaturas, new Asignatura($result[0], $result[1], $area));
		}
		$this -> connection -> close();
		return $asignaturas;
	}

	function selectAllByArea(){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> selectAllByArea());
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			$area = new Area($result[2]);
			$area -> select();
			array_push($asignaturas, new Asignatura($result[0], $result[1], $area));
		}
		$this -> connection -> close();
		return $asignaturas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> selectAllOrder($order, $dir));
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			$area = new Area($result[2]);
			$area -> select();
			array_push($asignaturas, new Asignatura($result[0], $result[1], $area));
		}
		$this -> connection -> close();
		return $asignaturas;
	}

	function selectAllByAreaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> selectAllByAreaOrder($order, $dir));
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			$area = new Area($result[2]);
			$area -> select();
			array_push($asignaturas, new Asignatura($result[0], $result[1], $area));
		}
		$this -> connection -> close();
		return $asignaturas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> asignaturaDAO -> search($search));
		$asignaturas = array();
		while ($result = $this -> connection -> fetchRow()){
			$area = new Area($result[2]);
			$area -> select();
			array_push($asignaturas, new Asignatura($result[0], $result[1], $area));
		}
		$this -> connection -> close();
		return $asignaturas;
	}
}
?>
