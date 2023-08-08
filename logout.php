<?php 
@session_start();
if($_SESSION['u_name'])
	session_destroy();
	session_commit();
	header("Location:admin.php");
//echo $_SESSION['u_name'];
?>