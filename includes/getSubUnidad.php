<?php
	include "conne2.php";
	mysqli_set_charset($mysqli, "utf8");
	$id_area = $_POST['id_area'];
	$id_sub_unidad_value = $_POST['id_sub_unidad_value'];

	$queryM = "SELECT
		directorio_area_subunidad.id_area,
		directorio_area_subunidad.id_subunidad,
		directorio_subunidades.nombre
		FROM
			directorio_area_subunidad
		RIGHT OUTER JOIN directorio_subunidades
		ON directorio_area_subunidad.id_subunidad = directorio_subunidades.id_sub_unidad 
		WHERE id_area = $id_area
		ORDER BY directorio_subunidades.nombre ASC;";
	$resultadoM = $mysqli->query($queryM);
	
	$seleccionado='';

	$html= "<option value='0'>Seleccione</option>";
	while($rowM = $resultadoM->fetch_assoc()){
		if($rowM['id_subunidad'] == $id_sub_unidad_value) { $seleccionado='selected' ;} 
		$html.= "<option $seleccionado value='".$rowM['id_subunidad']."'>".$rowM['nombre']."</option>";
		$seleccionado='';
	}
	echo $html;
?>		