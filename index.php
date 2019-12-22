<?php 
session_start();
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Profesor.php");
require("business/Area.php");
require("business/Tipo.php");
require("business/Inscripcion.php");
require("business/Horario.php");
require("business/Asignatura.php");
require("business/Grupo.php");
require("business/Asistencia.php");
require("business/ExcepcionPersonal.php");
require("business/Excepcion.php");
require("business/LogCoordinador.php");
require("business/Coordinador.php");
ini_set("display_errors","1");
date_default_timezone_set("America/Bogota");
$webPages = array(
	'ui/recoverPassword.php',
	'ui/sessionAdministrator.php',
	'ui/administrator/insertAdministrator.php',
	'ui/administrator/updateAdministrator.php',
	'ui/administrator/selectAllAdministrator.php',
	'ui/administrator/searchAdministrator.php',
	'ui/administrator/updateProfileAdministrator.php',
	'ui/administrator/updatePasswordAdministrator.php',
	'ui/administrator/updatePictureAdministrator.php',
	'ui/logAdministrator/searchLogAdministrator.php',
	'ui/profesor/insertProfesor.php',
	'ui/profesor/updateProfesor.php',
	'ui/profesor/selectAllProfesor.php',
	'ui/profesor/searchProfesor.php',
	'ui/inscripcion/selectAllInscripcionByProfesor.php',
	'ui/excepcionPersonal/selectAllExcepcionPersonalByProfesor.php',
	'ui/area/insertArea.php',
	'ui/area/updateArea.php',
	'ui/area/selectAllArea.php',
	'ui/area/searchArea.php',
	'ui/asignatura/selectAllAsignaturaByArea.php',
	'ui/tipo/insertTipo.php',
	'ui/tipo/updateTipo.php',
	'ui/tipo/selectAllTipo.php',
	'ui/tipo/searchTipo.php',
	'ui/excepcion/selectAllExcepcionByTipo.php',
	'ui/excepcionPersonal/selectAllExcepcionPersonalByTipo.php',
	'ui/inscripcion/insertInscripcion.php',
	'ui/inscripcion/updateInscripcion.php',
	'ui/inscripcion/selectAllInscripcion.php',
	'ui/inscripcion/searchInscripcion.php',
	'ui/horario/selectAllHorarioByInscripcion.php',
	'ui/grupo/selectAllGrupoByInscripcion.php',
	'ui/horario/insertHorario.php',
	'ui/horario/updateHorario.php',
	'ui/horario/selectAllHorario.php',
	'ui/horario/searchHorario.php',
	'ui/asignatura/insertAsignatura.php',
	'ui/asignatura/updateAsignatura.php',
	'ui/asignatura/selectAllAsignatura.php',
	'ui/asignatura/searchAsignatura.php',
	'ui/grupo/selectAllGrupoByAsignatura.php',
	'ui/grupo/insertGrupo.php',
	'ui/grupo/updateGrupo.php',
	'ui/grupo/selectAllGrupo.php',
	'ui/grupo/searchGrupo.php',
	'ui/asistencia/insertAsistencia.php',
	'ui/asistencia/updateAsistencia.php',
	'ui/asistencia/selectAllAsistencia.php',
	'ui/asistencia/searchAsistencia.php',
	'ui/excepcionPersonal/insertExcepcionPersonal.php',
	'ui/excepcionPersonal/updateExcepcionPersonal.php',
	'ui/excepcionPersonal/selectAllExcepcionPersonal.php',
	'ui/excepcionPersonal/searchExcepcionPersonal.php',
	'ui/excepcion/insertExcepcion.php',
	'ui/excepcion/updateExcepcion.php',
	'ui/excepcion/selectAllExcepcion.php',
	'ui/excepcion/searchExcepcion.php',
	'ui/logAdministrador/searchLogAdministrador.php',
	'ui/sessionAdministrador.php',
	'ui/administrador/insertAdministrador.php',
	'ui/administrador/updateAdministrador.php',
	'ui/administrador/selectAllAdministrador.php',
	'ui/administrador/searchAdministrador.php',
	'ui/administrador/updateProfileAdministrador.php',
	'ui/administrador/updatePasswordAdministrador.php',
	'ui/logCoordinador/searchLogCoordinador.php',
	'ui/sessionCoordinador.php',
	'ui/coordinador/insertCoordinador.php',
	'ui/coordinador/updateCoordinador.php',
	'ui/coordinador/selectAllCoordinador.php',
	'ui/coordinador/searchCoordinador.php',
	'ui/coordinador/updateProfileCoordinador.php',
	'ui/coordinador/updatePasswordCoordinador.php',
);
if(isset($_GET['logOut'])){
	$_SESSION['id']="";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SCBAD</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="img/logo.png" />
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
		<script charset="utf-8">
			$(function () { 
				$("[data-toggle='tooltip']").tooltip(); 
			});
		</script>
	</head>
	<body>
		<?php
		if(empty($_GET['pid'])){
			include('ui/home.php' );
		}else{
			$pid=base64_decode($_GET['pid']);
			if($webPages[0]==$pid){
				include($pid);
			}else{
				if($_SESSION['id']==""){
					header("Location: index.php");
					die();
				}
				if($_SESSION['entity']=="Administrator"){
					include('ui/menuAdministrator.php');
				}
				if($_SESSION['entity']=="Administrador"){
					include('ui/menuAdministrador.php');
				}
				if($_SESSION['entity']=="Coordinador"){
					include('ui/menuCoordinador.php');
				}
				if (in_array($pid, $webPages)){
					include($pid);
				}else{
					include('ui/error.php');
				}
			}
		}
		?>
		<div class="text-center text-muted">ITI &copy; <?php echo date("Y")?></div>
	</body>
</html>
