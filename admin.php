<?php 
session_start();
if (!empty($_SESSION['u_name'])){
	header("Location: list_persona.php");
die();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Directorio CDHCM</title>
	<meta name="description" content="Sistema de administracion del directorio institucional de la CDHCM">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="public/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="public/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="public/css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="public/css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="public/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(public/img/body.jpg) 0% 0 repeat !important; }
		</style>
<!-- start: JavaScript-->

		<script src="public/js/jquery-1.9.1.min.js"></script>
	<script src="public/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="public/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="public/js/jquery.ui.touch-punch.js"></script>
	
		<script src="public/js/modernizr.js"></script>
	
		<script src="public/js/bootstrap.min.js"></script>
	
		<script src="public/js/jquery.cookie.js"></script>
	
		<script src='public/js/fullcalendar.min.js'></script>
	
		<script src='public/js/jquery.dataTables.min.js'></script>

		<script src="public/js/excanvas.js"></script>
	<script src="public/js/jquery.flot.js"></script>
	<script src="public/js/jquery.flot.pie.js"></script>
	<script src="public/js/jquery.flot.stack.js"></script>
	<script src="public/js/jquery.flot.resize.min.js"></script>
	
		<script src="public/js/jquery.chosen.min.js"></script>
	
		<script src="public/js/jquery.uniform.min.js"></script>
		
		<script src="public/js/jquery.cleditor.min.js"></script>
	
		<script src="public/js/jquery.noty.js"></script>
	
		<script src="public/js/jquery.elfinder.min.js"></script>
	
		<script src="public/js/jquery.raty.min.js"></script>
	
		<script src="public/js/jquery.iphone.toggle.js"></script>
	
		<script src="public/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="public/js/jquery.gritter.min.js"></script>
	
		<script src="public/js/jquery.imagesloaded.js"></script>
	
		<script src="public/js/jquery.masonry.min.js"></script>
	
		<script src="public/js/jquery.knob.modified.js"></script>
	
		<script src="public/js/jquery.sparkline.min.js"></script>
	
		<script src="public/js/counter.js"></script>
	
		<script src="public/js/retina.js"></script>

		<script src="public/js/custom.js"></script>
	<!-- end: JavaScript-->
<script language="javascript">
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

$(document).ready(function()
{
	$("#login_form").submit(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validando datos....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("ajax_login.php",{ user_name:$('#user_log').val(),password:$('#pass_log').val(),rand:Math.random() } ,function(data)
        {
		  if(data=='yes') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Accediendo.....').addClass('label label-success').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='list_persona.php';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Datos incorrectos...').addClass('label label-important').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#pass_log").blur(function()
	{
		$("#login_form").trigger('submit');
	});
});
</script>
<style>
	img.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
	
</style>
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<!--<a href="list_persona.php"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>-->
					</div>
					<img src="public/img/directorio_institucional.png" class="center"/>
					<form class="form-horizontal" action="" method="post" id="login_form">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="user_log" id="user_log" type="text" placeholder="Usuario"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="pass_log" id="pass_log" type="password" placeholder="Contrase&ntilde;a"/>
							</div>
							<div class="clearfix"></div>
							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Acceder</button>
							</div>
							
							<div class="clearfix"></div>
							
							<span id="msgbox" style="display:none"></span>
							
					</form>
					<hr>
					<p>
						Sistema de administraci&oacute;n del directorio institucional de la CDHCM.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	
	
</body>
</html>