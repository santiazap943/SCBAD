<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$inscripcion = new Inscripcion($_GET['idInscripcion']); 
$inscripcion -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Grupo of Inscripcion: <em><?php echo $inscripcion -> getPeriodo() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th>Asignatura</th>
						<th>Inscripcion</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$grupo = new Grupo("", "", $_GET['idInscripcion']);
					if($order!="" && $dir!="") {
						$grupos = $grupo -> selectAllByInscripcionOrder($order, $dir);
					} else {
						$grupos = $grupo -> selectAllByInscripcion();
					}
					$counter = 1;
					foreach ($grupos as $currentGrupo) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentGrupo -> getAsignatura() -> getNombre() . "</td>";
						echo "<td>" . $currentGrupo -> getInscripcion() -> getPeriodo() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/grupo/updateGrupo.php") . "&idGrupo=" . $currentGrupo -> getIdGrupo() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Grupo' ></span></a> ";
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
