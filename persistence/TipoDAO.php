<?php
class TipoDAO{
	private $idTipo;
	private $nombre;

	function TipoDAO($pIdTipo = "", $pNombre = ""){
		$this -> idTipo = $pIdTipo;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Tipo(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update Tipo set 
				nombre = '" . $this -> nombre . "'	
				where idTipo = '" . $this -> idTipo . "'";
	}

	function select() {
		return "select idTipo, nombre
				from Tipo
				where idTipo = '" . $this -> idTipo . "'";
	}

	function selectAll() {
		return "select idTipo, nombre
				from Tipo";
	}

	function selectAllOrder($orden, $dir){
		return "select idTipo, nombre
				from Tipo
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idTipo, nombre
				from Tipo
				where nombre like '%" . $search . "%'";
	}
}
?>
