<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Línea de Servicio</title>
<link rel="stylesheet" href="../STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="../STYLES/bootstrap-theme.min.css" />
<link rel="stylesheet" href="../STYLES/validationEngine.jquery.css" />
<script type="text/javascript" src="../SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/bootstrap.min.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine-es.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../SCRIPTS/mensajes.js"></script>
<script type="text/javascript" src="../SCRIPTS/PAGES/lds.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
	<div class="container-fluid">
		<h2 class="title">
			<strong>Líneas de Servicio</strong>
		</h2>
		<hr>
		<form id="form_lds"
			style="width: 90%; margin: 0 auto; margin-top: 20px;">
			<input type="hidden" id="txtId" name="txtId">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Línea de Servicio</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="txtNombre">Denominación <span class="required">*</span></label>
								<input type="text" class="form-control validate[required]" placeholder="Nombre de la línea de servicio"
									id="txtNombre" name="txtNombre" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="txtDescrip">Descripción<span class="required">*</span></label>
								<textarea id="txtDescrip" name="txtDescrip" placeholder="Escriba una descripción de la línea"
									class="form-control validate[required]" rows="6"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
			<button type="button" id="btnConsultar" class="btn btn-primary">Consultar</button>
			<button type="button" id="btnLimpiar" class="btn btn-primary">Limpiar</button>
			<br /> <br />
			<div class="panel panel-primary">
				<div class="panel-heading">Clientes registrados</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody id="tbody"></tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
		<hr>
	</div>
</body>
</html>