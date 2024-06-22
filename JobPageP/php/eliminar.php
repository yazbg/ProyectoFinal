<?php

$idTrabajo = $_GET['id'];

$conex = mysqli_connect("localhost:3306", "root", "", "tam");
$consultaEliminar = "DELETE FROM trabajos WHERE id = $idTrabajo";
$resultEliminar = mysqli_query($conex, $consultaEliminar);
mysqli_close($conex);
header("Location:  ./misTrabajos.php");




?>