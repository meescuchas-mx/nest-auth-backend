<?php

//Conexión a la BD
include "includes/conne2.php";
mysqli_set_charset($mysqli, "utf8");

$clave= sanear_string($_POST['clave']);
    // if (mysqli_num_rows($result)==0) {
    $sql="update directorio_usuario
    set contrasena = MD5('$clave')
    WHERE usuario = 'saul.duenas'";
    // header('Location: list_persona.php?acc=1');
      $result=mysqli_query($mysqli, $sql);
  // }else{
    header('Location: list_persona.php?acc=5');
  // };
?>
