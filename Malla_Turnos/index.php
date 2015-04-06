<html lang="es-es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="language" content="es-ES">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<link rel="stylesheet" href="STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="STYLES/bootstrap-theme.min.css" />
<link rel="stylesheet" href="STYLES/header.css" />
<link rel="stylesheet" href="STYLES/menu.css" />
<link rel="stylesheet" href="STYLES/index.css" />
<script type="text/javascript" src="SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="SCRIPTS/bootstrap.min.js"></script>
<title>Malla de Turnos</title>
</head>
<body>
	<div id="headerDiv" class="row show-grid">
		<div class="col-xs-6 col-sm-2">
			<div id="logo">
				<a href="menu.php"><img src="IMAGES/logo.png"></img></a>
			</div>
		</div>
		<div class="col-xs-6 col-sm-10">
			<h1 class="title">Malla de turnos</h1>
		</div>
	</div>

	<div class="row show-grid">
		<div class="col-xs-6 col-sm-2">
			<!-- 			<div id="medium"> -->
			<!-- 				<div id="mediumContent"> -->
			<!-- Start SideBarMenu -->
			<!-- 					<div id="sideBarMenu"> -->
			<!-- 						<h2>Menú</h2> -->
			<!-- 						<ul id="menu"> -->
			<!-- 							<li><a target="contenido" href="pages/gUsuarios.php">Gestionar -->
			<!-- 									Usuarios</a></li> -->
			<!-- 							<li><a target="contenido" href="PAGES/GenerarModelo.php">Generar Modelo</a></li> -->
			<!-- 							<li><a target="contenido" href="PAGES/Configuracion.html">Configuración</a></li> -->
			<!-- 						</ul> -->
			<!-- 					</div> -->
			<!-- 				</div> -->
			<!-- 			</div> -->

			<!-- Main -->
			<div id="menu">
				<ul class="nav nav-stacked">

					<li class="active"><a href="#"><i class="glyphicon glyphicon-home"></i>
							Gestionar Usuarios</a></li>
					<li><a target="contenido" href="PAGES/GenerarModelo.php"><i class="glyphicon glyphicon-calendar"></i>
							Generar Modelo</a></li>
					<li class="nav-header"><a href="#" data-toggle="collapse"
						data-target="#config"> Configuración <i
							class="glyphicon glyphicon-chevron-right"></i></a>
						<ul class="nav nav-stacked collapse" id="config">
							<li><a target="contenido" href="PAGES/LineaServicio.php"><i class="glyphicon glyphicon-menu-hamburger"></i> Línea de
									Servicio</a></li>
							<li><a href="#">Views</a></li>
						</ul></li>
				</ul>
			</div>
			<!-- /Main -->
		</div>

		<div class="col-xs-6 col-sm-8">
			<iframe id="contenido" name="contenido"></iframe>
		</div>
	</div>
</body>
<script type="text/javascript" src="SCRIPTS/menu.js"></script>
</html>