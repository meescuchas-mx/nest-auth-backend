<?php
	//Conexión a la BD
	include "includes/conne2.php";
	mysqli_set_charset($mysqli, "utf8");

	//Recibe datos de la forma
	$expediente    = sanear_string($_POST['expediente']);
	$ap_paterno    = sanear_string($_POST['ap_paterno']);
	$ap_materno    = sanear_string($_POST['ap_materno']);
	$nombre        = sanear_string($_POST['nombre']);
	$extension     = sanear_string($_POST['extension']);
	$area          = sanear_string($_POST['cbx_area']);
	$id_sub_unidad = sanear_string($_POST['cbx_subunidad']);
	$cargo         = sanear_string($_POST['cargo']);
	$correo        = sanear_string($_POST['correo']);

	//Verifica que la persona no esté dada de alta
	$verifica_persona="SELECT correo FROM directorio_personas WHERE correo='$correo';";
	$result=mysqli_query($mysqli,$verifica_persona);

	if( mysqli_num_rows($result) === 0 ) {
		$sql="INSERT INTO directorio_personas(
			expediente,
			apellido_paterno,
			apellido_materno,
			nombre,
			extension,
			id_area,
			id_sub_unidad,
			cargo,
			correo,
			fecha_creacion
		)VALUES(
			UPPER('$expediente'),
			UPPER('$ap_paterno'),
			UPPER('$ap_materno'),
			UPPER('$nombre'),
			'$extension',
			UPPER('$area'),
			UPPER('$id_sub_unidad'),
			UPPER('$cargo'),
			'$correo',
			NOW()
		);";
		header('Location: list_persona.php?acc=1');
		$result=mysqli_query($mysqli, $sql);
	}else{
		header('Location: list_persona.php?acc=2');
	};
desconectar();
?>