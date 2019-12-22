<?php
$coordinador = new Coordinador($_SESSION['id']);
$coordinador -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionCoordinador.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Coordinador: <?php echo $coordinador -> getNombre() . " " . $coordinador -> getApellido() ?><span class="caret"></span></a>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/updateProfileCoordinador.php") ?>">Edit Profile</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/updatePasswordCoordinador.php") ?>">Change Password</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Log out</a>
			</li>
		</ul>
	</div>
</nav>
