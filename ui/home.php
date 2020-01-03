<?php
$logInError = false;
if (isset($_POST['logIn'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$user_ip = getenv('REMOTE_ADDR');
		$agent = $_SERVER["HTTP_USER_AGENT"];
		$browser = "-";
		if (preg_match('/MSIE (\d+\.\d+);/', $agent)) {
			$browser = "Internet Explorer";
		} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent)) {
			$browser = "Chrome";
		} else if (preg_match('/Edge\/\d+/', $agent)) {
			$browser = "Edge";
		} else if (preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent)) {
			$browser = "Firefox";
		} else if (preg_match('/OPR[\/\s](\d+\.\d+)/', $agent)) {
			$browser = "Opera";
		} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent)) {
			$browser = "Safari";
		}
		$email = $_POST['email'];
		$password = $_POST['password'];
		$administrator = new Administrator();
		if ($administrator->logIn($email, $password)) {
			$_SESSION['id'] = $administrator->getIdAdministrator();
			$_SESSION['entity'] = "Administrator";
			$logAdministrator = new LogAdministrator("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $administrator->getIdAdministrator());
			$logAdministrator->insert();
			echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionAdministrator.php") . "'</script>";
		}
		$administrador = new Administrador();
		if ($administrador->logIn($email, $password)) {
			$_SESSION['id'] = $administrador->getIdAdministrador();
			$_SESSION['entity'] = "Administrador";
			$logAdministrador = new LogAdministrador("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $administrador->getIdAdministrador());
			$logAdministrador->insert();
			echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionAdministrador.php") . "'</script>";
		}
		$coordinador = new Coordinador();
		if ($coordinador->logIn($email, $password)) {
			$_SESSION['id'] = $coordinador->getIdCoordinador();
			$_SESSION['entity'] = "Coordinador";
			$logCoordinador = new LogCoordinador("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $coordinador->getIdCoordinador());
			$logCoordinador->insert();
			echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionCoordinador.php") . "'</script>";
		}
		$logInError = true;
	}
}
?>
<style>
	body {

		background-image: url("img/fondoalo.jpeg");
		background-repeat: no-repeat;
		background-size: cover;
	}

	#inicio{
		border-radius: 15px;
	}

	#login{
		width: 19em;
		border-radius: 15px;
	}

	.form-control {
		
		width: 100%;
		border: 2px solid #aaa;
		margin: 8px 0;
		outline: none;
		padding: 8px;
		box-sizing: border-box;
		transition: 0.3s;
		border-radius: 15px;
		padding-left: 40px;
	}

	.form-control:focus {
		border-color:rgb(39, 174, 96);
		box-shadow: 0 0 8px 0 rgb(39, 174, 96);
	}

	.icono {
		position: relative;
	}

	.icono i {
		position: absolute;
		left: 0;
		top: 3px;
		padding: 8px 11px;
		color: #aaa;
		transition: 0.3s;
	}

	.icono .form-control:focus+i {
		color: rgb(39, 174, 96);
	}
</style>
</br>
</br>
</br>
<section>
	<div class="container ">
		<div class="row">
			<div class="col-4 offset-4 text-center">
				<div id="inicio" class="shadow card">									
					<div class="card-body">
					<div class="row">
						<div class="col-md-12 text-center">&nbsp;</div>
					</div>
					<div class="row">
						<div class="col-md-6 offset-3 text-center">
							<img src="img/SCBAD.jpeg" width="150px" />
						</div>
					</div>
						<div class="row">
							<div class="col-md-12 text-center">&nbsp;</div>
						</div>
						<form id="form" method="post" action="index.php" class="bootstrap-form needs-validation">
							<div class="form-group">
								<div class="icono">

									<input id="email" type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required />
									<i id="icono" class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
								</div>

							</div>
							<div class="form-group">
							<div class="icono">
								<input id="password" type="password" class="form-control" name="password" placeholder="Password" required />
								<i id="icono" class="fas fa-lock fa-lg fa-fw" aria-hidden="true"></i>
								</div>
							</div>
							<?php if ($logInError) {
								echo "<div class='alert alert-danger' >Wrong email or password</div>";
							} ?>
							<div class="form-group">
								<button id="login" type="submit" class="btn btn-outline-secondary" name="logIn">Log In</button>
							</div>
							<div class="form-group">
								<a style="color:rgb(127, 140, 141)" href="index.php?pid=<?php echo base64_encode("ui/recoverPassword.php") ?>">Recover Password</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
