<?php
	include 'Conexion.php';
	include 'Header.php';
	$resultado = $mysqli->query("SELECT * FROM departamentos");
?>
<div class="container p-8">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8 mx-auto">
			<h1>Registrar trabajador</h1>
			<div class="card card-body">
				<form action="Formulario.php" method="POST">
					<div class="form-group">
						<label>Nombre:</label>
						<input type="text" name="Nombre" class="form-control" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label>Apellido Parterno:</label>
						<input type="text" name="ApPaterno"class="form-control" placeholder="Apellido Parterno">
					</div>
					<div class="form-group">
						<label>Apellido Materno:</label>
						<input type="text" name="ApMaterno"class="form-control" placeholder="Apellido Materno">
					</div>
					<div class="form-group">
						<label>Puesto:</label>
						<select name = "Puesto" class="browser-default custom-select custom-select-lg mb-8" >
							<?php
							while ($dato = mysqli_fetch_array($resultado)) {
								
							?>
							<option value="<?php echo $dato['Departamento']?>"><?php echo $dato['Departamento']?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Sueldo:</label>
						<input type="text" name="Sueldo"class="form-control" placeholder="Sueldo">
					</div>
					<div class="form-group">
						<label>Fecha de nacimineto:</label>
						<input type="text" name="FecNac"  placeholder="Fecha de nacimineto" class="tcal form-control" value="" />
					</div>
					<div class="form-group">
						<input type="submit" name="guardar" value="Guardar"class="btn btn-success btn-block">
					</div>
					<div class="form-group">
						<a href="index.php">Regresar</a>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>
<?php
	if (isset($_POST['guardar'])) {

		$Nombre = $_POST['Nombre'];
		$ApPaterno = $_POST['ApPaterno'];
		$ApMaterno = $_POST['ApMaterno'];
		$Sueldo = $_POST['Sueldo'];
		$FecNac = $_POST['FecNac'];
		$Puesto = $_POST['Puesto'];

		$mysqli->query("INSERT INTO trabajadores(id,Nombre,ApPaterno,ApMaterno,Sueldo,FecNac,Puesto) VALUES 
			(NULL,'$Nombre','$ApPaterno','$ApMaterno','$Sueldo','$FecNac','$Puesto')");
		header("Location: index.php");
	}
	include 'Footer.php';
?>
