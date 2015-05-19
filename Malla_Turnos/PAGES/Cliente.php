<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Clientes</title>
<link rel="stylesheet" href="../STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="../STYLES/bootstrap-theme.min.css" />
<script type="text/javascript" src="../SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/bootstrap.min.js"></script>
<link rel="stylesheet" href="../STYLES/validationEngine.jquery.css" />
<script type="text/javascript" src="../SCRIPTS/mensajes.js"></script>
<link rel="stylesheet" href="../STYLES/animsition.min.css" />
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine-es.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../SCRIPTS/PAGES/cliente.js"></script>
<script type="text/javascript" src="../SCRIPTS/animsitionActive.js"></script>
<script type="text/javascript" src="../SCRIPTS/jquery.animsition.min.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
	<div class="container-fluid animsition">
		<h2 class="title">
			<strong>Clientes</strong>
		</h2>
		<hr>
		<form id="form_cliente"
			style="width: 90%; margin: 0 auto; margin-top: 20px;">
			<input type="hidden" id="txtId" name="txtId" />
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Cliente</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="selLinServ">Nombre <span class="required">*</span></label>
								<input type="text" class="form-control validate[required]"
									id="txtNombre" placeholder="Escriba el nombre del cliente"
									name="txtNombre" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="selLinServ">NIT <span class="required">*</span></label>
								<input type="text" class="form-control validate[required]"
									id="txtNit" placeholder="Escriba el NIT correspondiente"
									name="txtNit" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="selLinServ">Línea de Servicios <span
									class="required">*</span></label> <select
									class="form-control validate[required]" id="selLinServ"
									name="selLinServ">
									<option value="">Cargando...</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="checkbox">
								<label> <input name="chkActivo" id="chkActivo" type="checkbox">Activo
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
			<button type="button" id="btnConsultar" class="btn btn-primary">Consultar</button>
			<button type="button" id="btnLimpiar" class="btn btn-primary">Limpiar</button>
			<button type="button" id="btnHorario" class="btn btn-primary">Ver Horario</button>
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
									<th>Nit</th>
									<th>Editar</th>
								</tr>
							</thead>
							<tbody id="tbody"></tbody>
						</table>
					</div>
				</div>
			</div>
<!-- 			<a id="linkNext"><button type="button" id="linkNext" -->
<!-- 					class="btn btn-primary"> -->
<!-- 					<i class="glyphicon glyphicon-triangle-right"></i> Siguiente -->
<!-- 				</button></a> -->
		</form>
		<hr>
	</div>
</body>
</html>