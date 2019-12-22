<?php
$processed=false;
$idAsignatura = $_GET['idAsignatura'];
$updateAsignatura = new Asignatura($idAsignatura);
$updateAsignatura -> select();
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$area="";
if(isset($_POST['area'])){
	$area=$_POST['area'];
}
if(isset($_POST['update'])){
	$updateAsignatura = new Asignatura($idAsignatura, $nombre, $area);
	$updateAsignatura -> update();
	$updateAsignatura -> select();
	$objArea = new Area($area);
	$objArea -> select();
	$nameArea = $objArea -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Asignatura", "Nombre: " . $nombre . ";; Area: " . $nameArea, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Edit Asignatura", "Nombre: " . $nombre . ";; Area: " . $nameArea, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Edit Asignatura", "Nombre: " . $nombre . ";; Area: " . $nameArea, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Asignatura</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/asignatura/updateAsignatura.php") . "&idAsignatura=" . $idAsignatura ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateAsignatura -> getNombre() ?>" required />
						</div>
					<div class="form-group">
						<label>Area*</label>
						<select class="form-control" name="area">
							<?php
							$objArea = new Area();
							$areas = $objArea -> selectAll();
							foreach($areas as $currentArea){
								echo "<option value='" . $currentArea -> getIdArea() . "'";
								if($currentArea -> getIdArea() == $updateAsignatura -> getArea() -> getIdArea()){
									echo " selected";
								}
								echo ">" . $currentArea -> getNombre() . "</option>";
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
