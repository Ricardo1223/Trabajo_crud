<?php
	include 'Conexion.php';
	include 'header.php';

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$resultado = $mysqli->query("SELECT * FROM trabajadores WHERE id=$id");
		$resul = $mysqli->query("SELECT * FROM departamentos");
		if (mysqli_num_rows($resultado) == 1) {
			$fila = mysqli_fetch_array($resultado);
			$Nombre = $fila['Nombre'];
			$ApPaterno = $fila['ApPaterno'];
			$ApMaterno = $fila['ApMaterno'];
			$Puesto = $fila['Puesto'];
			$Sueldo = $fila['Sueldo'];
			$FecNac = $fila['FecNac'];
		}
	}

	if (isset($_POST['guardar'])) {
		$id=$_GET['id'];
		$Nombre = $_POST['Nombre'];
		$ApPaterno = $_POST['ApPaterno'];
		$ApMaterno = $_POST['ApMaterno'];
		$Puesto = $_POST['Puesto'];
		$Sueldo = $_POST['Sueldo'];
		$FecNac = $_POST['FecNac'];

		$mysqli->query("UPDATE trabajadores SET Nombre = '$Nombre', ApPaterno = '$ApPaterno' , ApMaterno = '$ApMaterno' , Puesto = '$Puesto',Sueldo = '$Sueldo', FecNac = '$FecNac' WHERE id=$id");
		header("Location: index.php");
	}
	
?>

<div class="container p-8">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8 mx-auto">
			<div class="card card-body">
				<form action="Editar.php?id=<?php echo $_GET['id'] ?>" method="POST">
					<div class="for-group">
						<label>Nombre:</label>
						<input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre?>">
					</div>
					<div class="for-group">
						<label>Apellido Parterno:</label>
						<input type="text" name="ApPaterno"class="form-control" value="<?php echo $ApPaterno; ?>">
					</div>
					<div class="for-group">
						<label>Apellido Materno:</label>
						<input type="text" name="ApMaterno"class="form-control" value="<?php echo $ApMaterno; ?>">
					</div>
					<div class="for-group">
						<label>Puesto:</label>
						<select class="browser-default custom-select custom-select-lg mb-8" name="Puesto">
							<?php
							while ($dato = mysqli_fetch_array($resul)) {
								
							?>
							<option value="<?php echo $dato['Departamento']?>"><?php echo $dato['Departamento']?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="for-group">
						<label>Sueldo:</label>
						<input type="text" name="Sueldo"class="form-control" value="<?php echo $Sueldo; ?>">
					</div>
					<div class="form-group">
						<label>Fecha de nacimineto:</label>
						<input type="text" name="FecNac" class="tcal form-control" value="<?php echo $FecNac; ?>" />	
					</div>
					<div class="form-group">
						<button class="btn btn-success" name="guardar"> Guardar</button>
					</div> 
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include'Footer.php';
?>