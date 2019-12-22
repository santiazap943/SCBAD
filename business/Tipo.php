<?php
require_once ("persistence/TipoDAO.php");
require_once ("persistence/Connection.php");

class Tipo {
	private $idTipo;
	private $nombre;
	private $tipoDAO;
	private $connection;

	function getIdTipo() {
		return $this -> idTipo;
	}

	function setIdTipo($pIdTipo) {
		$this -> idTipo = $pIdTipo;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Tipo($pIdTipo = "", $pNombre = ""){
		$this -> idTipo = $pIdTipo;
		$this -> nombre = $pNombre;
		$this -> tipoDAO = new TipoDAO($this -> idTipo, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idTipo = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDAO -> selectAll());
		$tipos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipos, new Tipo($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDAO -> selectAllOrder($order, $dir));
		$tipos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipos, new Tipo($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDAO -> search($search));
		$tipos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipos, new Tipo($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipos;
	}
}
?>
