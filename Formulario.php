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
				<form action="Formulario.php" method="POST" class="needs-validation" novalidate="">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip01">Nombre:</label>
							<input type="text" name="Nombre" id="validationTooltip01" class="form-control" placeholder="Nombre" required>
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip02">Apellido Parterno:</label>
							<input type="text" name="ApPaterno" id="validationTooltip02" class="form-control" placeholder="Apellido Parterno" required>
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip03">Apellido Materno:</label>
							<input type="text" name="ApMaterno" id="validationTooltip02" class="form-control" placeholder="Apellido Materno" required>
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
						<div class="form-group">
							<label>Departamento:</label>
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
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip04">Sueldo:</label>
							<input type="text" name="Sueldo" id="validationTooltip04" class="form-control" placeholder="Sueldo" required>
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-12 md-12">
							<label for="validationTooltip05">Fecha de nacimineto:</label>
							<input type="text" required name="FecNac"  id="validationTooltip05" placeholder="Fecha de nacimineto" class="tcal form-control" value="" />
							<div class="valid-tooltip">Bien</div>
							<div class="invalid-tooltip">Obligatorio</div>
							</div>
						</div>
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

		$mysqli->query("INSERT INTO trabajadores(Nombre,ApPaterno,ApMaterno,Sueldo,FecNac,Puesto) VALUES 
			('$Nombre','$ApPaterno','$ApMaterno','$Sueldo','$FecNac','$Puesto')");
	header("Location: index.php");
	}
	include 'Footer.php';
?>
