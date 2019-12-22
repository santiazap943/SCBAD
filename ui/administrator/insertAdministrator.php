<?php
$processed=false;
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
$password="";
if(isset($_POST['password'])){
	$password=$_POST['password'];
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
if(isset($_POST['insert'])){
	$newAdministrator = new Administrator("", $name, $lastName, $email, $password, "", $phone, $mobile, $state);
	$newAdministrator -> insert();
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
		$logAdministrator = new LogAdministrator("","Create Administrator", "Name: " . $name . ";; Last Name: " . $lastName . ";; Email: " . $email . ";; Password: " . $password . ";; Phone: " . $phone . ";; Mobile: " . $mobile . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Administrador'){
		$logAdministrador = new LogAdministrador("","Create Administrator", "Name: " . $name . ";; Last Name: " . $lastName . ";; Email: " . $email . ";; Password: " . $password . ";; Phone: " . $phone . ";; Mobile: " . $mobile . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	else if($_SESSION['entity'] == 'Coordinador'){
		$logCoordinador = new LogCoordinador("","Create Administrator", "Name: " . $name . ";; Last Name: " . $lastName . ";; Email: " . $email . ";; Password: " . $password . ";; Phone: " . $phone . ";; Mobile: " . $mobile . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Administrator</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/administrator/insertAdministrator.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Name*</label>
							<input type="text" class="form-control" name="name" value="<?php echo $name ?>" required />
						</div>
						<div class="form-group">
							<label>Last Name*</label>
							<input type="text" class="form-control" name="lastName" value="<?php echo $lastName ?>" required />
						</div>
						<div class="form-group">
							<label>Email*</label>
							<input type="email" class="form-control" name="email" value="<?php echo $email ?>"  required />
						</div>
						<div class="form-group">
							<label>Password*</label>
							<input type="password" class="form-control" name="password" value="<?php echo $password ?>" required />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" name="phone" value="<?php echo $phone ?>"/>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" class="form-control" name="mobile" value="<?php echo $mobile ?>"/>
						</div>
						<div class="form-group">
							<label>State</label>
							<input type="text" class="form-control" name="state" value="<?php echo $state ?>"/>
						</div>
						<button type="submit" class="btn" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
