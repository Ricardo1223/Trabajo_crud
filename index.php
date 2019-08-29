
<?php
	include'Conexion.php';
	include'Header.php';
?>
	<div class="col-xs-12 col-sm-6 col-md-8 mx-auto">
		<h1>Trabajadores</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido Parterno</th>
					<th>Apellido Materno</th>
					<th>Sueldo</th>
					<th>Fecha de nacimineto</th>
					<th>Puesto</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$resultado = $mysqli->query("SELECT * FROM trabajadores");

				while($row = mysqli_fetch_array($resultado)){     ?>
					<tr>
						<td><?php echo $row['Nombre'] ?></td>
						<td><?php echo $row['ApPaterno'] ?></td>
						<td><?php echo $row['ApMaterno'] ?></td>
						<td><?php echo $row['Sueldo'] ?></td>
						<td><?php echo $row['FecNac'] ?></td>
						<td><?php echo $row['Puesto'] ?></td>
						<td>
							<a href="Editar.php?id=<?php echo $row ['id']?>">
								Editar
							</a>
							<a href="Eliminar.php?id=<?php echo $row ['id']?>" onclick="return ConfirmarEliminar()">
								Eliminar
							</a>
						</td>
					</tr>
				
				<?php }?>
			</tbody>
		</table>
	</div>

<?php
	include'Footer.php';
?> 
