<?php
	session_start();
	//Conexión a la BD
	include "includes/conne2.php";
	mysqli_set_charset($mysqli, "utf8");

	//get the posted values
	$user_name = htmlspecialchars($_POST['user_name'],ENT_QUOTES);
	$pass      = md5($_POST['password']);

	//now validating the username and password
	$sql    = "SELECT id_usuario,contrasena FROM directorio_usuario WHERE usuario= '$user_name';";
	$result = mysqli_query($mysqli, $sql);
	$row    = mysqli_query($mysqli,"SELECT max(fecha) from directorio_personas");
	$row    = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if( mysqli_num_rows($result) > 0 ){
		//compare the password
		if(strcmp($row['contrasena'],$pass)==0){
			echo trim('yes');
			$_SESSION['u_name']=$user_name;
		}else{
			echo"no"; 
		}
	}
?>