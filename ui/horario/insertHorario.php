<?php
$processed=false;
$dia="";
if(isset($_POST['dia'])){
	$dia=$_POST['dia'];
}
$hora="";
if(isset($_POST['hora'])){
	$hora=$_POST['hora'];
}
$inscripcion="";
if(isset($_POST['inscripcion'])){
	$inscripcion=$_POST['inscripcion'];
}
if(isset($_GET['idInscripcion'])){
	$inscripcion=$_GET['idInscripcion'];
}
if(isset($_POST['insert'])){
	$newHorario = new Horario("", $dia, $hora, $inscripcion);
	$newHorario -> insert();
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
		$logAdministrator = new LogAdministrator("","Create Horario", "Dia: " . $dia . ";; Hora: " . $hora . ";; Inscripcion: " . $nameInscripcion, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Create Horario", "Dia: " . $dia . ";; Hora: " . $hora . ";; Inscripcion: " . $nameInscripcion, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Create Horario", "Dia: " . $dia . ";; Hora: " . $hora . ";; Inscripcion: " . $nameInscripcion, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Horario</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/horario/insertHorario.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Dia*</label>
							<input type="text" class="form-control" name="dia" value="<?php echo $dia ?>" required />
						</div>
						<div class="form-group">
							<label>Hora*</label>
							<input type="text" class="form-control" name="hora" value="<?php echo $hora ?>" required />
						</div>
					<div class="form-group">
						<label>Inscripcion*</label>
						<select class="form-control" name="inscripcion">
							<?php
							$objInscripcion = new Inscripcion();
							$inscripcions = $objInscripcion -> selectAll();
							foreach($inscripcions as $currentInscripcion){
								echo "<option value='" . $currentInscripcion -> getIdInscripcion() . "'";
								if($currentInscripcion -> getIdInscripcion() == $inscripcion){
									echo " selected";
								}
								echo ">" . $currentInscripcion -> getPeriodo() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
