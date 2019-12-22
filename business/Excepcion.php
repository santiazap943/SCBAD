<?php
require_once ("persistence/ExcepcionDAO.php");
require_once ("persistence/Connection.php");

class Excepcion {
	private $idExcepcion;
	private $descripcion;
	private $tipo;
	private $excepcionDAO;
	private $connection;

	function getIdExcepcion() {
		return $this -> idExcepcion;
	}

	function setIdExcepcion($pIdExcepcion) {
		$this -> idExcepcion = $pIdExcepcion;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getTipo() {
		return $this -> tipo;
	}

	function setTipo($pTipo) {
		$this -> tipo = $pTipo;
	}

	function Excepcion($pIdExcepcion = "", $pDescripcion = "", $pTipo = ""){
		$this -> idExcepcion = $pIdExcepcion;
		$this -> descripcion = $pDescripcion;
		$this -> tipo = $pTipo;
		$this -> excepcionDAO = new ExcepcionDAO($this -> idExcepcion, $this -> descripcion, $this -> tipo);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idExcepcion = $result[0];
		$this -> descripcion = $result[1];
		$tipo = new Tipo($result[2]);
		$tipo -> select();
		$this -> tipo = $tipo;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> selectAll());
		$excepcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipo = new Tipo($result[2]);
			$tipo -> select();
			array_push($excepcions, new Excepcion($result[0], $result[1], $tipo));
		}
		$this -> connection -> close();
		return $excepcions;
	}

	function selectAllByTipo(){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> selectAllByTipo());
		$excepcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipo = new Tipo($result[2]);
			$tipo -> select();
			array_push($excepcions, new Excepcion($result[0], $result[1], $tipo));
		}
		$this -> connection -> close();
		return $excepcions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> selectAllOrder($order, $dir));
		$excepcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipo = new Tipo($result[2]);
			$tipo -> select();
			array_push($excepcions, new Excepcion($result[0], $result[1], $tipo));
		}
		$this -> connection -> close();
		return $excepcions;
	}

	function selectAllByTipoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> selectAllByTipoOrder($order, $dir));
		$excepcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipo = new Tipo($result[2]);
			$tipo -> select();
			array_push($excepcions, new Excepcion($result[0], $result[1], $tipo));
		}
		$this -> connection -> close();
		return $excepcions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> excepcionDAO -> search($search));
		$excepcions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipo = new Tipo($result[2]);
			$tipo -> select();
			array_push($excepcions, new Excepcion($result[0], $result[1], $tipo));
		}
		$this -> connection -> close();
		return $excepcions;
	}
}
?>
