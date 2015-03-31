<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Clientes</title>
<link rel="stylesheet" href="../STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="../STYLES/bootstrap-theme.min.css" />
<script type="text/javascript" src="../SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/bootstrap.min.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
	<form style="width: 90%; margin: 0 auto; margin-top: 20px;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Cliente</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="selLinServ">Nombre <span class="required">*</span></label>
							<input type="text" class="form-control" id="txtNombre" required />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="selLinServ">NIT <span class="required">*</span></label>
							<input type="text" class="form-control" id="txtNit" required />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="form-group">
								<label for="selLinServ">Línea de Servicios <span
									class="required">*</span></label> <select class="form-control"
									id="selLinServ" required>
									<option>SIE</option>
									<option>SEG</option>
								</select>
							</div>
						</div>
					</div>
				</div>
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
										<input type="time" class="form-control" id="txtInicio"
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
										<input type="time" class="form-control" id="txtFin"
											name="txtFin" required>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Lunes</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Martes</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Miércoles</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Jueves</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Viernes</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Sábado</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox">Domingo</label>
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
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
</body>
</html>