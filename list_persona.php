<?php
	include 'includes/verificasesion.php';

	$usuario = $_SESSION['u_name'];
	$acc = isset($_GET['acc']) ? $_GET['acc'] : null;

	// API
	require 'app/ApiClient.php';
	$apiClient = new ApiClient();
	$personas = $apiClient->getApiResponse('/personas');
	$actualizacion = $apiClient->getApiResponse('/personas/ultimaActualizacion')['fecha_actualizacion'];
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Directorio CDHCM</title>
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
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="public/img/favicon.ico">
	<!-- end: Favicon -->
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
	<script>
		function confirmDelete(url) {
		    if (confirm("Está seguro que desea eliminar éste usuario?")) {
		    	window.location="del_usr.php?id="+url;
		    } else {
		        false;
		    }
		}
	</script>
</head>
<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="list_persona.php"><span><img src="public/img/mail.png" width="25" height="28"/> Directorio Institucional CDHCM</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: Notifications Dropdown -->

						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <? echo $usuario; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Cerrar sesi&oacute;n</span>
								</li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Salir</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">

						<li><a href="list_persona.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Inicio</span></a></li>
						<li><a href="add_persona.php"><i class="icon-edit"></i><span class="hidden-tablet"> Agregar Persona</span></a></li>
						<li><a href="edit_administrador.php"><i class="icon-edit"></i><span class="hidden-tablet"> Cambiar Contraseña</span></a></li>
            <li><a href="reporte.php"><i class="icon-download"></i><span class="hidden-tablet"> Generar Reporte</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Inicio</a>
					<i class="icon-angle-right"></i>
				</li>
			</ul>
			<?php
$msj = htmlspecialchars($acc);
switch ($msj) {
    case 1:
        echo '<div id="msjinf" class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Usuario registrado!</strong> El usuario ha sido registrado exitosamente.
						</div>';
        break;
	case 2:
        echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Error!</strong> No fue posible realizar el registro, verifique que el usuario no se encuentre registrado.
						</div>';
        break;
	case 3:
        echo '<div id="msjinf" class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Usuario eliminado!</strong> El usuario ha sido eliminado exitosamente.
						</div>';
        break;
	case 4:
        echo '<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Error!</strong> Intente nuevamente.
						</div>';
        break;
 case 5:
 echo '<div id="msjinf" class="alert alert-success">
			 <button type="button" class="close" data-dismiss="alert">×</button>
			 <strong>Usuario actualizado!</strong> El usuario se ha actualizado exitosamente.
		 </div>';
				break;
}
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Directorio Institucional </h2>
						<div class="box-icon">
							Ultima actualizaci&oacute;n: <?php echo $actualizacion;?>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>Expediente</th>
								  <th>Nombre</th>
								  <th>Extensi&oacute;n</th>
								  <th>Area de la CDHCM</th>
								  <th>SubUnidad</th>
								  <th>Cargo</th>
								  <th>Correo electr&oacute;nico</th>
								  <th>Acciones</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								foreach($personas as $clave => $valor){
									echo "<tr>
									<td>{$valor['expediente']}</td>
									<td>{$valor['nombre']} {$valor['apellido_paterno']} {$valor['apellido_materno']}</td>
									<td>{$valor['extension']}</td>
									<td>{$valor['id_area']['nombre']}</td>
									<td>{$valor['id_sub_unidad']['nombre']}</td>
									<td>{$valor['cargo']}</td>
									<td>{$valor['correo']}</td>
									<td width='8%' class='center'>
										<a class='btn btn-info' href='edit_usuario.php?id={$valor['id_persona']}'>
											<i class='halflings-icon white edit'></i> Editar
										</a>
									</td>
                                </tr>";
								}
							?>
						  </tbody>
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row-->
	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Atenci&oacute;n!!!</h3>
		</div>
		<div class="modal-body">
			<p>Esta seguro que desea eliminar a la persona?</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
			<a href="#" class="btn btn-primary">Eliminar</a>
		</div>
	</div>

	<div class="clearfix"></div>
	<footer>
		<p> <span style="text-align:left;float:left"><?php echo date("Y"); ?> | Comisi&oacute;n de Derechos Humanos del Ciudad de México | CTIyC | DGA</span></p>
	</footer>
</body>
</html>
