<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link rel="stylesheet" href="../STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="../STYLES/bootstrap-theme.min.css" />
<link rel="stylesheet" href="../STYLES/validationEngine.jquery.css" />
<script type="text/javascript" src="../SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/bootstrap.min.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine-es.js"></script>
<script type="text/javascript"
	src="../SCRIPTS/ValidationEngine/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../SCRIPTS/PAGES/generarModelo.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
	<div class="container-fluid">
		<h2 class="title">
			<strong>Generación Modelo</strong>
		</h2>
		<hr>
		<form id="form_GenMod"
			style="width: 90%; margin: 0 auto; margin-top: 20px;">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Datos del cliente</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="selLinServ">Línea de Servicios <span
									class="required">*</span></label> <select
									class="form-control validate[required]" id="selLinServ"
									required>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="selCliente">Cliente <span class="required">*</span></label>
								<select class="form-control validate[required]" id="selCliente"
									disabled="disabled" required>
								</select>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Horario</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Días</th>
											<th>Inicio</th>
											<th>Fin</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Lunes</td>
											<td>08:00:00</td>
											<td>18:00:00</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Vigencia</h3>
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
											<!-- 										<div class="input-group-addon">.00</div> -->
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
											<!-- 										<div class="input-group-addon">.00</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- 				<div class="checkbox"> -->
					<!-- 					<label> <input type="checkbox"> Check me out -->
					<!-- 					</label> -->
					<!-- 				</div> -->
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Recursos</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										Cantidad de analistas <span class="required">*</span>
									</div>
									<input type="number"
										class="form-control validate[required,custom[integer],min[1]]"
										min="1" id="txtCantAnalistas" name="txtCantAnalistas" required>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										Cantidad de Backups <span class="required">*</span>
									</div>
									<input type="number"
										class="form-control validate[required,custom[integer],min[1]]"
										min="1" id="txtCantBackups" name="txtCantBackups" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										Horas de semanales <span class="required">*</span>
									</div>
									<input type="number"
										class="form-control validate[required,custom[integer],min[1]]"
										min="1" id="txtHorasSem" name="txtHorasSem" value="46"
										required>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										Horas al diarias <span class="required">*</span>
									</div>
									<input type="number"
										class="form-control validate[required,custom[integer],min[1]]"
										min="1" id="txtHorasDia" name="txtHorasDia" value="10"
										required>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Siguiente</button>
			<hr>
		</form>
	</div>
</body>
</html>