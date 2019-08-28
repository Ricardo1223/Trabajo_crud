<?php
	include 'Conexion.php';
	include 'Header.php';
?>
<div class="container p-8">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8 mx-auto">
			<h1>Registrar departamento</h1>
			<div class="card card-body">
				<form action="Departamento.php" method="POST">
					<div class="form-group">
						<label>Departamento:</label>
						<input type="text" name="Departamento" class="form-control" placeholder="Departamento">
					</div>
					<div class="form-group">
						<label>Descripción:</label>
						<input type="text" name="Descripcion" class="form-control" placeholder="Descripcion">
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


	
