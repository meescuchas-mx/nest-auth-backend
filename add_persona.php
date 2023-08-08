<?php
	include 'includes/verificasesion.php';
	include "includes/conne2.php";
	mysqli_set_charset($mysqli, "utf8");
	$query = "SELECT id_area, nombre FROM directorio_areas ORDER BY nombre";
	$resultado=$mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Directorio CDHCM</title>
	<!-- end: Meta -->
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="public/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="public/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="public/img/favicon.ico">
	<link rel="stylesheet" href="includes/test.css" type="text/css" />
	<link rel="stylesheet" href="includes/validation.css" type="text/css" />
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
				<a class="brand" href="list_persona.php"><span><img src="public/img/mail.png" width="25" height="28"/> Directorio Institucional CDHCM - Direcci&oacute;n General de Administraci&oacute;n</span></a>
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
							<li><a href="add_persona.php"><i class="icon-edit"></i><span class="hidden-tablet"> Agregar persona</span></a></li>
							<li><a href="edit_administrador.php"><i class="icon-edit"></i><span class="hidden-tablet"> Cambiar Contraseña</span></a></li>
							<li><a href="reporte.php"><i class="icon-download"></i><span class="hidden-tablet"> Generar Reporte</span></a></li>
						</ul>
					</div>
				</div>
				<!-- end: Main Menu -->

			<!-- start: Content -->
			<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="list_persona.php">Inicio</a>
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Agregar persona</a>
				</li>
			</ul>

			<div class="row-fluid sortable">

			</div><!--/row-->

			<div class="row-fluid sortable">
				<div class="box span7">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Agregar persona</h2>
						<div class="box-icon">
						</div>
					</div>
					<!--  -->
					<div class="box-content">
						<form autocomplete="off" id=combo name="combo" class="form-horizontal" method="POST" action="reg_persona.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="expediente">Expediente</label>
								<div class="controls">
								  <input class="input-small" id="expediente" name="expediente" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="ap_paterno">Primer apellido</label>
								<div class="controls">
								  <input class="input-xlarge" id="ap_paterno" name="ap_paterno" type="text">
								  <script type="text/javascript">
									var app = new LiveValidation('ap_paterno');
										app.add( Validate.Presence, { failureMessage: 'Ingrese el apellido parteno' } );
								  </script>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="ap_materno">Segundo apellido</label>
								<div class="controls">
								  <input class="input-xlarge" id="ap_materno" name="ap_materno" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="nombre">Nombre</label>
								<div class="controls">
								  <input class="input-xlarge" id="nombre" name="nombre" type="text" >
								  <script type="text/javascript">
									var nom = new LiveValidation('nombre');
										nom.add( Validate.Presence, { failureMessage: 'Ingrese el nombre' } );
								  </script>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="extension">Extensi&oacute;n</label>
								<div class="controls">
								  <input class="input-small" id="extension" name="extension" type="text">

								</div>
							  </div>

							   <div class="control-group">
							   	<label class="control-label" for="area">&Aacute;rea de la CDHCM </label>
							   	<div class="controls">
							   	<select name="cbx_area" id="cbx_area">

								<option value="0"> - Seleccione una opci&oacute;n - </option>
								<?php while($row = $resultado->fetch_assoc()) { ?>
								<option value="<?php echo $row['id_area']; ?>"><?php echo $row['nombre']; ?></option>
								<?php } ?>

								</select>
								 </div>
							    </div>

								<br />

								<div class="control-group">
									<label class="control-label" for="id_sub_unidad">SubUnidad</label>
									<div class="controls">
									<select name="cbx_subunidad" id="cbx_subunidad">
									</select>
									</div>
								</div>
								<br />


							  	<div class="control-group">
								<label class="control-label" for="cargo">Cargo / Funciones</label>
								<div class="controls">
								  <input class="input-xlarge" id="cargo" name="cargo" type="text" >
								  <script type="text/javascript">
									var puesto = new LiveValidation('cargo');
										puesto.add( Validate.Presence, { failureMessage: 'Ingrese el cargo' } );
								  </script>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="correo">Correo electr&oacute;nico</label>
								<div class="controls">
								  <input class="input-xlarge" id="correo" name="correo" type="text" >
								  <script type="text/javascript">
									var ma1l = new LiveValidation('correo');
										ma1l.add(Validate.Email, { failureMessage: "Ingrese un correo válido" } );

								  </script>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Guardar</button>
								<button class="btn" onclick="window.location.href='list_persona.php'">Cancelar</button>
							  </div>
							</fieldset>
						  </form>
					</div>
				</div><!--/span
			</div><!--/row-->
			</div><!--/row-->

	</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>
		<p>
			<span style="text-align:left;float:left"><?php echo date("Y"); ?> | Comisi&oacute;n de Derechos Humanos del Ciudad de México | CTIyC | DGA</span>
		</p>
	</footer>
</body>
<script language="javascript" src="public/js/jquery-3.1.1.min.js"></script>
	<script language="javascript">
		$(document).ready(function(){
			$("#cbx_area").change(function () {
				$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
				$("#cbx_area option:selected").each(function () {
					id_area = $(this).val();
					$.post("includes/getSubUnidad.php", { id_area: id_area }, function(data){
						$("#cbx_subunidad").html(data);
					});
				});
			})
		});
	</script>
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
	<script src="public/js/jquery.masonry.min.js"></script>
	<script src="public/js/jquery.imagesloaded.js"></script>
	<script src="public/js/jquery.knob.modified.js"></script>
	<script src="public/js/jquery.sparkline.min.js"></script>
	<script src="public/js/counter.js"></script>
	<script src="public/js/retina.js"></script>
	<script src="public/js/custom.js"></script>
	<!-- end: JavaScript-->
	<!-- Live validator -->
	<script type="text/javascript" src="includes/livevalidation_standalone.js"></script>
</html>
