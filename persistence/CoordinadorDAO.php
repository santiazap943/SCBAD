<?php
class CoordinadorDAO{
	private $idCoordinador;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;
	private $state;

	function CoordinadorDAO($pIdCoordinador = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pClave = "", $pState = ""){
		$this -> idCoordinador = $pIdCoordinador;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> state = $pState;
	}

	function logIn($email, $password){
		return "select idCoordinador, nombre, apellido, correo, clave, state
				from Coordinador
				where email = '" . $email . "' and password = '" . md5($password) . "'";
	}

	function insert(){
		return "insert into Coordinador(nombre, apellido, correo, clave, state)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', '" . $this -> clave . "', '" . $this -> state . "')";
	}

	function update(){
		return "update Coordinador set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				correo = '" . $this -> correo . "',
				clave = '" . $this -> clave . "',
				state = '" . $this -> state . "'	
				where idCoordinador = '" . $this -> idCoordinador . "'";
	}

	function updatePassword($password){
		return "update Coordinador set 
				where idCoordinador = '" . $this -> idCoordinador . "'";
	}

	function existEmail($email){
		return "select idCoordinador, nombre, apellido, correo, clave, state
				from Coordinador
				where email = '" . $email . "'";
	}

	function recoverPassword($email, $password){
		return "update Coordinador set 
				where  = '" . $email . "'";
	}

	function select() {
		return "select idCoordinador, nombre, apellido, correo, clave, state
				from Coordinador
				where idCoordinador = '" . $this -> idCoordinador . "'";
	}

	function selectAll() {
		return "select idCoordinador, nombre, apellido, correo, clave, state
				from Coordinador";
	}

	function selectAllOrder($orden, $dir){
		return "select idCoordinador, nombre, apellido, correo, clave, state
				from Coordinador
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCoordinador, nombre, apellido, correo, clave, state
				from Coordinador
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or correo like '%" . $search . "%' or clave like '%" . $search . "%'";
	}
}
?>
