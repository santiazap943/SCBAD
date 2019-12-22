<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$tipo = new Tipo($_GET['idTipo']); 
$tipo -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Excepcion of Tipo: <em><?php echo $tipo -> getNombre() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/excepcion/selectAllExcepcionByTipo.php") ?>&idTipo=<?php echo $_GET['idTipo'] ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/excepcion/selectAllExcepcionByTipo.php") ?>&idTipo=<?php echo $_GET['idTipo'] ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Tipo</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$excepcion = new Excepcion("", "", $_GET['idTipo']);
					if($order!="" && $dir!="") {
						$excepcions = $excepcion -> selectAllByTipoOrder($order, $dir);
					} else {
						$excepcions = $excepcion -> selectAllByTipo();
					}
					$counter = 1;
					foreach ($excepcions as $currentExcepcion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentExcepcion -> getDescripcion() . "</td>";
						echo "<td>" . $currentExcepcion -> getTipo() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/excepcion/updateExcepcion.php") . "&idExcepcion=" . $currentExcepcion -> getIdExcepcion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Excepcion' ></span></a> ";
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
