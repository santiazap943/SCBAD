<?php
$processed=false;
$idInscripcion = $_GET['idInscripcion'];
$updateInscripcion = new Inscripcion($idInscripcion);
$updateInscripcion -> select();
$periodo="";
if(isset($_POST['periodo'])){
	$periodo=$_POST['periodo'];
}
$profesor="";
if(isset($_POST['profesor'])){
	$profesor=$_POST['profesor'];
}
if(isset($_POST['update'])){
	$updateInscripcion = new Inscripcion($idInscripcion, $periodo, $profesor);
	$updateInscripcion -> update();
	$updateInscripcion -> select();
	$objProfesor = new Profesor($profesor);
	$objProfesor -> select();
	$nameProfesor = $objProfesor -> getNombre() . " " . $objProfesor -> getApellido() ;
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
		$logAdministrator = new LogAdministrator("","Edit Inscripcion", "Periodo: " . $periodo . ";; Profesor: " . $nameProfesor, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Edit Inscripcion", "Periodo: " . $periodo . ";; Profesor: " . $nameProfesor, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Edit Inscripcion", "Periodo: " . $periodo . ";; Profesor: " . $nameProfesor, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Inscripcion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/inscripcion/updateInscripcion.php") . "&idInscripcion=" . $idInscripcion ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Periodo*</label>
							<input type="text" class="form-control" name="periodo" value="<?php echo $updateInscripcion -> getPeriodo() ?>" required />
						</div>
					<div class="form-group">
						<label>Profesor*</label>
						<select class="form-control" name="profesor">
							<?php
							$objProfesor = new Profesor();
							$profesors = $objProfesor -> selectAll();
							foreach($profesors as $currentProfesor){
								echo "<option value='" . $currentProfesor -> getIdProfesor() . "'";
								if($currentProfesor -> getIdProfesor() == $updateInscripcion -> getProfesor() -> getIdProfesor()){
									echo " selected";
								}
								echo ">" . $currentProfesor -> getNombre() . " " . $currentProfesor -> getApellido() . "</option>";
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
