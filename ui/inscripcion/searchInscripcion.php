<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Search Inscripcion</h4>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<input type="text" class="form-control" id="search" placeholder="Search Inscripcion" autocomplete="off" />
					</div>
				</div>
			</div>
			<div id="searchResult"></div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#search").keyup(function(){
		if($("#search").val().length > 2){
			var search = $("#search").val().replace(" ", "%20");
			var path = "indexAjax.php?pid=<?php echo base64_encode("ui/inscripcion/searchInscripcionAjax.php"); ?>&search="+search+"&entity=<?php echo $_SESSION['entity'] ?>";
			$("#searchResult").load(path);
		}
	});
});
</script>
