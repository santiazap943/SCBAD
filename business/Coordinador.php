<?php
require_once ("persistence/CoordinadorDAO.php");
require_once ("persistence/Connection.php");

class Coordinador {
	private $idCoordinador;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;
	private $state;
	private $coordinadorDAO;
	private $connection;

	function getIdCoordinador() {
		return $this -> idCoordinador;
	}

	function setIdCoordinador($pIdCoordinador) {
		$this -> idCoordinador = $pIdCoordinador;
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

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function getState() {
		return $this -> state;
	}

	function setState($pState) {
		$this -> state = $pState;
	}

	function Coordinador($pIdCoordinador = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pClave = "", $pState = ""){
		$this -> idCoordinador = $pIdCoordinador;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> state = $pState;
		$this -> coordinadorDAO = new CoordinadorDAO($this -> idCoordinador, $this -> nombre, $this -> apellido, $this -> correo, $this -> clave, $this -> state);
		$this -> connection = new Connection();
	}

	function logIn($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> logIn($email, $password));
		if($this -> connection -> numRows()==1){
			$result = $this -> connection -> fetchRow();
			$this -> idCoordinador = $result[0];
			$this -> nombre = $result[1];
			$this -> apellido = $result[2];
			$this -> correo = $result[3];
			$this -> clave = $result[4];
			$this -> state = $result[5];
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> update());
		$this -> connection -> close();
	}

	function updatePassword($password){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> updatePassword($password));
		$this -> connection -> close();
	}

	function existEmail($email){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> existEmail($email));
		if($this -> connection -> numRows()==1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function recoverPassword($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> recoverPassword($email, $password));
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCoordinador = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> correo = $result[3];
		$this -> clave = $result[4];
		$this -> state = $result[5];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> selectAll());
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5]));
		}
		$this -> connection -> close();
		return $coordinadors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> selectAllOrder($order, $dir));
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5]));
		}
		$this -> connection -> close();
		return $coordinadors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> search($search));
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5]));
		}
		$this -> connection -> close();
		return $coordinadors;
	}
}
?>
