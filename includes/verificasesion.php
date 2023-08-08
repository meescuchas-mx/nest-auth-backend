<?php
session_start();
if (empty($_SESSION['u_name'])){
	header("Location: admin.php");
die();
	}

?>
