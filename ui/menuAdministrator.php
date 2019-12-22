<?php
$administrator = new Administrator($_SESSION['id']);
$administrator -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionAdministrator.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Create</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/insertAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/insertProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/area/insertArea.php") ?>">Area</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipo/insertTipo.php") ?>">Tipo</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/inscripcion/insertInscripcion.php") ?>">Inscripcion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/horario/insertHorario.php") ?>">Horario</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/insertAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asistencia/insertAsistencia.php") ?>">Asistencia</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/excepcionPersonal/insertExcepcionPersonal.php") ?>">Excepcion Personal</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/excepcion/insertExcepcion.php") ?>">Excepcion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/insertAdministrador.php") ?>">Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/insertCoordinador.php") ?>">Coordinador</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Get All</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/selectAllAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/area/selectAllArea.php") ?>">Area</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipo/selectAllTipo.php") ?>">Tipo</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/inscripcion/selectAllInscripcion.php") ?>">Inscripcion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorario.php") ?>">Horario</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asistencia/selectAllAsistencia.php") ?>">Asistencia</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/excepcionPersonal/selectAllExcepcionPersonal.php") ?>">Excepcion Personal</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/excepcion/selectAllExcepcion.php") ?>">Excepcion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/selectAllAdministrador.php") ?>">Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinador.php") ?>">Coordinador</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Search</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/searchAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/searchProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/area/searchArea.php") ?>">Area</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipo/searchTipo.php") ?>">Tipo</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/inscripcion/searchInscripcion.php") ?>">Inscripcion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/horario/searchHorario.php") ?>">Horario</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/searchAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asistencia/searchAsistencia.php") ?>">Asistencia</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/excepcionPersonal/searchExcepcionPersonal.php") ?>">Excepcion Personal</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/excepcion/searchExcepcion.php") ?>">Excepcion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/searchAdministrador.php") ?>">Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/searchCoordinador.php") ?>">Coordinador</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Log</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logAdministrator/searchLogAdministrator.php") ?>">Log Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logAdministrador/searchLogAdministrador.php") ?>">Log Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logCoordinador/searchLogCoordinador.php") ?>">Log Coordinador</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Administrator: <?php echo $administrator -> getName() . " " . $administrator -> getLastName() ?><span class="caret"></span></a>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/updateProfileAdministrator.php") ?>">Edit Profile</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/updatePasswordAdministrator.php") ?>">Change Password</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Log out</a>
			</li>
		</ul>
	</div>
</nav>
