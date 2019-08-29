<?php
	include 'Conexion.php';
	include 'Header.php';
?>
<div class="container p-8">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8 mx-auto mb-3">
			<h1>Registrar departamento</h1>
			<div class="card card-body">
				<form action="Departamento.php" method="POST" class="needs-validation" novalidate="">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip01">Departamento:</label>
							<input type="text" name="Departamento" id="validationTooltip01" class="form-control" placeholder="Departamento" required>
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip02">Descripción:</label>
							<textarea  required name="Descripcion" id="validationTooltip02" class="form-control" placeholder="Descripción"></textarea>
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<input type="submit" name="guardar" value="Guardar"class="btn btn-success btn-block">
					</div>
					<div class="form-group">
						<a href="Trabajadores.php">Regresar</a>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>
<?php
	if (isset($_POST['guardar'])) {

		$Departamento = $_POST['Departamento'];
		$Descripcion = $_POST['Descripcion'];

		$mysqli->query("INSERT INTO departamentos(id,Departamento,Descripcion) VALUES (NULL,'$Departamento','$Descripcion')");
		header("Location: index.php");
	}
	include 'Footer.php';
?>


	
