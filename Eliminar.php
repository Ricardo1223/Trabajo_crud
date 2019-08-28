<?php
include 'Conexion.php';

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$mysqli->query("DELETE FROM trabajadores WHERE id=$id");
	header("location: index.php");
	}
?>