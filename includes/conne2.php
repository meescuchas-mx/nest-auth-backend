<?php
	// $mysqli = mysqli_connect("localhost","root","","intranet");
	$mysqli = mysqli_connect("172.17.0.27","admin","qwEC01or5?s*","intranet3");
	function conectar(){
		// $mysqli = mysqli_connect("localhost","root","","intranet");
		$mysqli = mysqli_connect("172.17.0.27","admin","qwEC01or5?s*","intranet3");
	}
	function desconectar(){

	}

	function sanear_string($string){
		$string = trim($string);
			//Esta parte se encarga de eliminar cualquier caracter extraño
			$string = str_replace(
				array("\\", "¨", "º", "~",
					"#", "|", "!", "\"",
					"·", "$", "%", "&","?",
					"'", "¡","¿", "[", "^", "`", "]",
					"+", "}", "{", "¨", "´",
					">", "< ","<", ";", ":",
					"*","=","UNION", "union",
					"select","SELECT","DELETE"
					,"delete","WHERE","where"
				),'',$string
			);
		return $string;
	}
?>