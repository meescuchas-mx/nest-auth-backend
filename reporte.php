<?php
//include "includes/conne2.php";
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=reporte_directorio.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
    <tr>
		<th>Expediente</th>
		<th>Nombre</th>
		<th>Extensi&oacute;n</th>
		<th>Area de la CDHCM</th>
		<th>SubUnidad</th>
		<th>Cargo</th>
		<th>Correo electr&oacute;nico</th>
	</tr>
    
<?php
	include "includes/conne2.php";
	//mysqli_set_charset($mysqli, "utf8");
	$sql_personas="SELECT directorio_personas.expediente, directorio_personas.apellido_paterno, directorio_personas.apellido_materno, directorio_personas.nombre, directorio_personas.extension, directorio_areas.nombre, directorio_subunidades.nombre, directorio_personas.cargo, directorio_personas.correo, directorio_personas.id_persona
								from directorio_personas
								left JOIN directorio_areas
								on directorio_personas.id_area = directorio_areas.id_area
								left JOIN directorio_subunidades
								ON directorio_personas.id_sub_unidad = directorio_subunidades.id_sub_unidad
								order by directorio_personas.id_persona";
	$ejecutar=mysqli_query($mysqli, $sql_personas);
		while ($persona_lista=mysqli_fetch_array($ejecutar, MYSQLI_NUM)){
echo '<tr>
		<td width="20%">'.$persona_lista[0].'</td>
		<td width="8%" class="center">'.$persona_lista[1].' '.$persona_lista[2].' '.$persona_lista[3].'</td>
		<td width="24%" class="center">'.$persona_lista[4].'</td>
		<td width="20%" class="center">'.$persona_lista[5].'</td>
		<td width="20%" class="center">'.$persona_lista[6].'</td>
		<td width="20%" class="center">'.$persona_lista[7].'</td>
		<td width="20%" class="center">'.$persona_lista[8].'</td>

	</tr>';
}

?>
</table>

<br/>
<?php 

ini_set('date.timezone','America/Mexico_City');
$time1 = date("d/m/Y, g:i a");

//echo 'Fecha de creaci&oacute;n: '.date("d/m/Y, g:i a") .$time1;

echo 'Fecha de creaci&oacute;n: ' . $time1;
?>