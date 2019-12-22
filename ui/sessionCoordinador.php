<?php
$coordinador = new Coordinador($_SESSION['id']);
$coordinador -> select();
?>
<div class="container">
	<div>
		<div class="card-header">
			<h3>Profile</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-9">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $coordinador -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td><?php echo $coordinador -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Correo</th>
								<td><?php echo $coordinador -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Clave</th>
								<td><?php echo $coordinador -> getClave() ?></td>
							</tr>
							<tr>
								<th>State</th>
								<td><?php echo $coordinador -> getState() ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Your role is: Coordinador"; ?></p>
		</div>
	</div>
</div>
