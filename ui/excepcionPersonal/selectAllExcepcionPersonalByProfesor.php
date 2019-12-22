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
			<h4 class="card-title">Get All Excepcion Personal of Profesor: <em><?php echo $profesor -> getNombre() . " " . $profesor -> getApellido() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Descripcion 
						<?php if($order=="descripcion" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/excepcionPersonal/selectAllExcepcionPersonalByProfesor.php") ?>&idProfesor=<?php echo $_GET['idProfesor'] ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/excepcionPersonal/selectAllExcepcionPersonalByProfesor.php") ?>&idProfesor=<?php echo $_GET['idProfesor'] ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Profesor</th>
						<th>Tipo</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$excepcionPersonal = new ExcepcionPersonal("", "", $_GET['idProfesor'], "");
					if($order!="" && $dir!="") {
						$excepcionPersonals = $excepcionPersonal -> selectAllByProfesorOrder($order, $dir);
					} else {
						$excepcionPersonals = $excepcionPersonal -> selectAllByProfesor();
					}
					$counter = 1;
					foreach ($excepcionPersonals as $currentExcepcionPersonal) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentExcepcionPersonal -> getDescripcion() . "</td>";
						echo "<td>" . $currentExcepcionPersonal -> getProfesor() -> getNombre() . " " . $currentExcepcionPersonal -> getProfesor() -> getApellido() . "</td>";
						echo "<td>" . $currentExcepcionPersonal -> getTipo() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcionPersonal/updateExcepcionPersonal.php") . "&idExcepcionPersonal=" . $currentExcepcionPersonal -> getIdExcepcionPersonal() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Excepcion Personal' ></span></a> ";
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
