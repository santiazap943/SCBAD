<?php
$processed=false;
$idExcepcion = $_GET['idExcepcion'];
$updateExcepcion = new Excepcion($idExcepcion);
$updateExcepcion -> select();
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$tipo="";
if(isset($_POST['tipo'])){
	$tipo=$_POST['tipo'];
}
if(isset($_POST['update'])){
	$updateExcepcion = new Excepcion($idExcepcion, $descripcion, $tipo);
	$updateExcepcion -> update();
	$updateExcepcion -> select();
	$objTipo = new Tipo($tipo);
	$objTipo -> select();
	$nameTipo = $objTipo -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Excepcion", "Descripcion: " . $descripcion . ";; Tipo: " . $nameTipo, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Edit Excepcion", "Descripcion: " . $descripcion . ";; Tipo: " . $nameTipo, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Edit Excepcion", "Descripcion: " . $descripcion . ";; Tipo: " . $nameTipo, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Excepcion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/excepcion/updateExcepcion.php") . "&idExcepcion=" . $idExcepcion ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $updateExcepcion -> getDescripcion() ?>" required />
						</div>
					<div class="form-group">
						<label>Tipo*</label>
						<select class="form-control" name="tipo">
							<?php
							$objTipo = new Tipo();
							$tipos = $objTipo -> selectAll();
							foreach($tipos as $currentTipo){
								echo "<option value='" . $currentTipo -> getIdTipo() . "'";
								if($currentTipo -> getIdTipo() == $updateExcepcion -> getTipo() -> getIdTipo()){
									echo " selected";
								}
								echo ">" . $currentTipo -> getNombre() . "</option>";
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
