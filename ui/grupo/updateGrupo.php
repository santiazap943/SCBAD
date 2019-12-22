<?php
$processed=false;
$idGrupo = $_GET['idGrupo'];
$updateGrupo = new Grupo($idGrupo);
$updateGrupo -> select();
$asignatura="";
if(isset($_POST['asignatura'])){
	$asignatura=$_POST['asignatura'];
}
$inscripcion="";
if(isset($_POST['inscripcion'])){
	$inscripcion=$_POST['inscripcion'];
}
if(isset($_POST['update'])){
	$updateGrupo = new Grupo($idGrupo, $asignatura, $inscripcion);
	$updateGrupo -> update();
	$updateGrupo -> select();
	$objAsignatura = new Asignatura($asignatura);
	$objAsignatura -> select();
	$nameAsignatura = $objAsignatura -> getNombre() ;
	$objInscripcion = new Inscripcion($inscripcion);
	$objInscripcion -> select();
	$nameInscripcion = $objInscripcion -> getPeriodo() ;
	$user_ip = getenv('REMOTE_ADDR');
	$agent = $_SERVER["HTTP_USER_AGENT"];
	$browser = "-";
	if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
		$browser = "Internet Explorer";
	} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Chrome";
	} else if (preg_match('/Edge\/\d+/', $agent) ) {
		$browser = "Edge";
	} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Firefox";
	} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Opera";
	} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Safari";
	}
	if($_SESSION['entity'] == 'Administrator'){
		$logAdministrator = new LogAdministrator("","Edit Grupo", "Asignatura: " . $nameAsignatura . ";; Inscripcion: " . $nameInscripcion, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Edit Grupo", "Asignatura: " . $nameAsignatura . ";; Inscripcion: " . $nameInscripcion, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Edit Grupo", "Asignatura: " . $nameAsignatura . ";; Inscripcion: " . $nameInscripcion, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logCoordinador -> insert();
	}
	$processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Grupo</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/grupo/updateGrupo.php") . "&idGrupo=" . $idGrupo ?>" class="bootstrap-form needs-validation"   >
					<div class="form-group">
						<label>Asignatura*</label>
						<select class="form-control" name="asignatura">
							<?php
							$objAsignatura = new Asignatura();
							$asignaturas = $objAsignatura -> selectAll();
							foreach($asignaturas as $currentAsignatura){
								echo "<option value='" . $currentAsignatura -> getIdAsignatura() . "'";
								if($currentAsignatura -> getIdAsignatura() == $updateGrupo -> getAsignatura() -> getIdAsignatura()){
									echo " selected";
								}
								echo ">" . $currentAsignatura -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Inscripcion*</label>
						<select class="form-control" name="inscripcion">
							<?php
							$objInscripcion = new Inscripcion();
							$inscripcions = $objInscripcion -> selectAll();
							foreach($inscripcions as $currentInscripcion){
								echo "<option value='" . $currentInscripcion -> getIdInscripcion() . "'";
								if($currentInscripcion -> getIdInscripcion() == $updateGrupo -> getInscripcion() -> getIdInscripcion()){
									echo " selected";
								}
								echo ">" . $currentInscripcion -> getPeriodo() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn" name="update">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
