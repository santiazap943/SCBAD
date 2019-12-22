<?php
$processed=false;
$idAdministrator = $_GET['idAdministrator'];
$updateAdministrator = new Administrator($idAdministrator);
$updateAdministrator -> select();
$name="";
if(isset($_POST['name'])){
	$name=$_POST['name'];
}
$lastName="";
if(isset($_POST['lastName'])){
	$lastName=$_POST['lastName'];
}
$email="";
if(isset($_POST['email'])){
	$email=$_POST['email'];
}
$phone="";
if(isset($_POST['phone'])){
	$phone=$_POST['phone'];
}
$mobile="";
if(isset($_POST['mobile'])){
	$mobile=$_POST['mobile'];
}
$state="";
if(isset($_POST['state'])){
	$state=$_POST['state'];
}
if(isset($_POST['update'])){
	$updateAdministrator = new Administrator($idAdministrator, $name, $lastName, $email, "", "", $phone, $mobile, $state);
	$updateAdministrator -> update();
	$updateAdministrator -> select();
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
		$logAdministrator = new LogAdministrator("","Edit Administrator", "Name: " . $name . ";; Last Name: " . $lastName . ";; Email: " . $email . ";; Phone: " . $phone . ";; Mobile: " . $mobile . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Edit Administrator", "Name: " . $name . ";; Last Name: " . $lastName . ";; Email: " . $email . ";; Phone: " . $phone . ";; Mobile: " . $mobile . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Edit Administrator", "Name: " . $name . ";; Last Name: " . $lastName . ";; Email: " . $email . ";; Phone: " . $phone . ";; Mobile: " . $mobile . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Administrator</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/administrator/updateAdministrator.php") . "&idAdministrator=" . $idAdministrator ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Name*</label>
							<input type="text" class="form-control" name="name" value="<?php echo $updateAdministrator -> getName() ?>" required />
						</div>
						<div class="form-group">
							<label>Last Name*</label>
							<input type="text" class="form-control" name="lastName" value="<?php echo $updateAdministrator -> getLastName() ?>" required />
						</div>
						<div class="form-group">
							<label>Email*</label>
							<input type="email" class="form-control" name="email" value="<?php echo $updateAdministrator -> getEmail() ?>"  required />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" name="phone" value="<?php echo $updateAdministrator -> getPhone() ?>"/>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" class="form-control" name="mobile" value="<?php echo $updateAdministrator -> getMobile() ?>"/>
						</div>
						<div class="form-group">
							<label>State</label>
							<input type="text" class="form-control" name="state" value="<?php echo $updateAdministrator -> getState() ?>"/>
						</div>
						<button type="submit" class="btn" name="update">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
