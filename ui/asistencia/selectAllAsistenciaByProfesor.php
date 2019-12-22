<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$profesor = new Profesor($_GET['idProfesor']); 
$profesor -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Asistencia of Profesor: <em><?php echo $profesor -> getNombre() . " " . $profesor -> getApellido() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/asistencia/selectAllAsistenciaByProfesor.php") ?>&idProfesor=<?php echo $_GET['idProfesor'] ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/asistencia/selectAllAsistenciaByProfesor.php") ?>&idProfesor=<?php echo $_GET['idProfesor'] ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Profesor</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$asistencia = new Asistencia("", "", $_GET['idProfesor']);
					if($order!="" && $dir!="") {
						$asistencias = $asistencia -> selectAllByProfesorOrder($order, $dir);
					} else {
						$asistencias = $asistencia -> selectAllByProfesor();
					}
					$counter = 1;
					foreach ($asistencias as $currentAsistencia) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentAsistencia -> getFecha() . "</td>";
						echo "<td>" . $currentAsistencia -> getProfesor() -> getNombre() . " " . $currentAsistencia -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/asistencia/updateAsistencia.php") . "&idAsistencia=" . $currentAsistencia -> getIdAsistencia() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Asistencia' ></span></a> ";
						}
						echo "</td>";
						echo "</tr>";
						$counter++;
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
