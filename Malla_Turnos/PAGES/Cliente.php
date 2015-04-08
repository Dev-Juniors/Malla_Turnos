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
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine-es.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../SCRIPTS/PAGES/cliente.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
	<div class="container-fluid">
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
									name="txtNombre" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="selLinServ">NIT <span class="required">*</span></label>
								<input type="text" class="form-control validate[required]"
									id="txtNit" placeholder="Escriba el NIT correspondiente"
									name="txtNit" required />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="selLinServ">Línea de Servicios <span
									class="required">*</span></label> <select
									class="form-control validate[required]" id="selLinServ"
									name="selLinServ" required>
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

				<!-- Modal Horario -->
				<div class="modal fade" id="modalHorario" tabindex="-1"
					role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Horarios Cliente</h4>
							</div>
							<div class="modal-body">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Horario</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Hora inicio <span class="required">*</span>
														</div>
														<input type="time" class="form-control validate[required]" id="txtInicio"
															name="txtInicio" required>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Hora Fin <span class="required">*</span>
														</div>
														<input type="time" class="form-control validate[required]" id="txtFin"
															name="txtFin" required>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Lunes">Lunes</label>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Martes">Martes</label>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Miércoles">Miércoles</label>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Jueves">Jueves</label>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Viernes">Viernes</label>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Sábado">Sábado</label>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="checkbox">
														<label><input class="validate[minCheckbox[1]]" type="checkbox" name="group1" id="Domingo">Domingo</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4"></div>
											<div class="col-sm-4">
												<button type="button" class="btn btn-primary btn-block">Agregar</button>
											</div>
											<div class="col-sm-4"></div>
										</div>
										<br>
										<div class="table-responsive">
											<table class="table table-hover table-bordered">
												<thead>
													<tr>
														<th>Días</th>
														<th>Inicio</th>
														<th>Fin</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Lunes, Martes</td>
														<td>08:00:00</td>
														<td>18:00:00</td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default"
									data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-primary"
									id="btnGuardarHorario">Guardar Horario</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
			<button type="button" id="btnConsultar" class="btn btn-primary">Consultar</button>
			<button type="button" id="btnLimpiar" class="btn btn-primary">Limpiar</button>
			<button type="button" id="btnHorario" class="btn btn-primary"
				disabled data-toggle="modal" data-target="#modalHorario">Horario</button>
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