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
<script type="text/javascript" src="SCRIPTS/menu.js"></script> 
<title>Malla de Turnos</title>
</head>
<body>
	<div class="row show-grid">
		<div class="col-xs-6 col-sm-12">
			<div id="header">
				<div>
					<a href="menu.php"><img src="IMAGES/logo.png"></img></a>
					<h1 class="title">Malla de turnos</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row show-grid">
		<div class="col-xs-6 col-sm-3">
			<div id="medium">
				<div id="mediumContent">
					<!-- Start SideBarMenu -->
					<div id="sideBarMenu">
						<h2>Menú</h2>
						<ul id="menu">
							<li><a target="contenido" href="pages/gUsuarios.php">Gestionar
									Usuarios</a></li>
							<li><a target="contenido" href="PAGES/GenerarModelo.php">Generar Modelo</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-8">
			<iframe id="contenido" name="contenido"></iframe>
		</div>
	</div>
</body>
</html>