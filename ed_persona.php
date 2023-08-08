<?php
	//Conexión a la BD
	include "includes/conne2.php";
	mysqli_query($mysqli, "SET NAMES 'utf8'");

	//Recibe datos de la forma
	$expediente = sanear_string($_POST['expediente']);
	$id_usr = sanear_string($_POST['id_usr']);
	$ap_paterno = sanear_string($_POST['ap_paterno']);
	$ap_materno = sanear_string($_POST['ap_materno']);
	$nombre = sanear_string($_POST['nombre']);
	$extension = sanear_string($_POST['extension']);
	$area          = sanear_string($_POST['cbx_area']);
	$id_sub_unidad = sanear_string($_POST['cbx_subunidad']);
	$cargo = sanear_string($_POST['cargo']);
	$correo = sanear_string($_POST['correo']);

	//* Verifica que la persona no esté dada de alta
	$sql= "SELECT correo FROM directorio_personas WHERE correo='$correo';";
	$result=mysqli_query($mysqli, $sql);
	if(mysqli_num_rows($result)==1) {
		$sqlUpdate = "UPDATE directorio_personas
			SET expediente       = UPPER('$expediente'),
				apellido_paterno = UPPER('$ap_paterno'),
				apellido_materno = UPPER('$ap_materno'),
				nombre           = UPPER('$nombre'),
				extension        = UPPER('$extension'),
				id_area          = $area,
				id_sub_unidad    = $id_sub_unidad,
				cargo            = UPPER('$cargo'),
				correo           = '$correo'
				WHERE id_persona = $id_usr;";

		$add_persona=mysqli_query($mysqli, $sqlUpdate);
		header('Location: list_persona.php?acc=1');
	}else{
		header('Location: list_persona.php?acc=2');
	};
desconectar();
?>