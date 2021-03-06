<html lang="es-es">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="language" content="es-ES">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<link href="IMAGES/favicon.ico" rel="shortcut icon"
	type="image/vnd.microsoft.icon">
<link rel="stylesheet" href="STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="STYLES/bootstrap-theme.min.css" />
<link rel="stylesheet" href="STYLES/header.css" />
<link rel="stylesheet" href="STYLES/menu.css" />
<link rel="stylesheet" href="STYLES/index.css" />
<script type="text/javascript" src="SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="SCRIPTS/bootstrap.min.js"></script>
<script type="text/javascript" src="SCRIPTS/jquery.animsition.min.js"></script>
<script type="text/javascript" src="SCRIPTS/animsitionActive.js"></script>
<title>Malla de Turnos - Flag Soluciones</title>
</head>
<body>
	<div class="container-fluid">
		<div id="headerDiv" class="row show-grid">
			<div class="col-sm-2">
				<div id="logo">
					<a href="index.php"><img src="IMAGES/logo.png"></img></a>
				</div>
			</div>
			<div class="col-sm-8">
				<h2 class="title">
					<strong>Malla de turnos</strong>
				</h2>
			</div>
		</div>

		<div class="row show-grid">
			<div class="col-lg-2">
				<div id="menu">
					<ul class="nav nav-stacked">

						<li class="active"><a href="#"><i class="glyphicon glyphicon-user"></i>
								Gestionar Usuarios</a></li>
						<li><a target="contenido" class="animsition-link" href="PAGES/GenerarModelo.php"><i
								class="glyphicon glyphicon-calendar"></i> Generar Modelo</a></li>
						<li class="nav-header"><a href="#" data-toggle="collapse"
							data-target="#config"> Configuración <i
								class="glyphicon glyphicon-chevron-right"></i></a>
							<ul class="nav nav-stacked collapse" id="config">
								<li><a target="contenido" class="animsition-link" href="PAGES/LineaServicio.php"><i
										class="glyphicon glyphicon-menu-hamburger"></i> Línea de
										Servicio</a></li>
								<li><a target="contenido" class="animsition-link" href="PAGES/Cliente.php"><i
										class="glyphicon glyphicon-globe"></i> Clientes</a></li>
							</ul></li>
					</ul>
				</div>
				<!-- /Main -->
			</div>
			<div class="col-lg-8">
				<iframe id="contenido" name="contenido"></iframe>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="SCRIPTS/menu.js"></script>
</html>