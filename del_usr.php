<?php
//Conexión a la BD
include 'includes/verificasesion.php';

include "includes/conne2.php";

$usr=$_GET['id'];

	if($usr!==0) {
		$del_persona = mysqli_query($mysqli,"UPDATE directorio_personas SET es_activo = 0 WHERE id_persona = ".$usr);
		header('Location: list_persona.php?acc=3');
	}else{
		header('Location: list_persona.php?acc=4');
	};
//desconectar();
?>