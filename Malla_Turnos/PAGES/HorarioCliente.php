<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Horario Cliente</title>
<link rel="stylesheet" href="../STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="../STYLES/bootstrap-theme.min.css" />
<script type="text/javascript" src="../SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/bootstrap.min.js"></script>
<link rel="stylesheet" href="../STYLES/horarioCliente.css" />
<link rel="stylesheet" href="../STYLES/validationEngine.jquery.css" />
<script type="text/javascript" src="../SCRIPTS/mensajes.js"></script>
<link rel="stylesheet" href="../STYLES/animsition.min.css" />
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine-es.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../SCRIPTS/PAGES/horarioCliente.js"></script>
<script type="text/javascript" src="../SCRIPTS/jquery.animsition.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/animsitionActive.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
	<div class="container-fluid animsition">
		<h2 class="title">
			<strong>Horario Cliente</strong>
		</h2>
		<hr>
		<form id="form_HrCliente"
			style="width: 90%; margin: 0 auto; margin-top: 20px;">
			<input type="hidden" id="txtId" name="txtId" /> <input type="hidden"
				id="txtIdHrCliente" name="txtIdHrCliente"
				value="<?php echo $_GET['cliente'];?>" />
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Vigencia Horario</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										Desde <span class="required">*</span>
									</div>
									<input type="date"
										class="form-control validate[required,past[#txtHasta]]"
										id="txtDesde" name="txtDesde" required>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										Hasta <span class="required">*</span>
									</div>
									<input type="date"
										class="form-control validate[required,future[#txtDesde]]"
										id="txtHasta" name="txtHasta" required>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
			<button type="button" id="btnLimpiar" class="btn btn-primary">Limpiar</button>
			<button type="button" id="btnHorario" class="btn btn-primary"
				data-toggle="modal" data-target="#modalHorario">Detalle Horario</button>
			<br /> <br />
			<div class="panel panel-primary">
				<div class="panel-heading">Horarios registrados</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Id</th>
									<th>Desde</th>
									<th>Hasta</th>
									<th>Editar</th>
								</tr>
							</thead>
							<tbody id="tbody"></tbody>
						</table>
					</div>
				</div>
			</div>
			<a class="animsition-link" href="Cliente.php">Atras <i
				class="glyphicon glyphicon-triangle-left"></i></a> <a
				class="animsition-link" href="HorarioCliente.html"><i
				class="glyphicon glyphicon-triangle-right"></i> Siguiente</a>
		</form>
		<hr>


		<!-- Modal Horario -->
		<div class="modal fade" id="modalHorario" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
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
						<form id="form_modal">
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
													<input type="time" class="form-control validate[required]"
														id="txtInicio" name="txtInicio" value="02:00">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">
														Hora Fin <span class="required">*</span>
													</div>
													<input type="time" class="form-control validate[required]"
														id="txtFin" name="txtFin" value="03:00">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia1">Lunes</label>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia2">Martes</label>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia3">Miércoles</label>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia4">Jueves</label>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia5">Viernes</label>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia6">Sábado</label>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<div class="checkbox">
													<label><input class="validate[minCheckbox[1]]"
														type="checkbox" name="group1" id="dia7">Domingo</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4"></div>
										<div class="col-sm-4">
											<button type="button" id="btnAgregar"
												class="btn btn-primary btn-block">Agregar</button>
											<button type="button" id="btnEditarHr"
												class="btn btn-primary btn-block">Editar</button>
										</div>
										<div class="col-sm-4"></div>
									</div>
									<br>
									<div id="tbHorario" class="table-responsive">
										<table class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>Días</th>
													<th>Inicio</th>
													<th>Fin</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody id="tbodyHr">
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary"
							id="btnGuardarHorario">Guardar Horario</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>