<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Línea de Servicio</title>
<link rel="stylesheet" href="../STYLES/bootstrap.min.css" />
<link rel="stylesheet" href="../STYLES/bootstrap-theme.min.css" />
<script type="text/javascript" src="../SCRIPTS/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/bootstrap.min.js"></script>
<script type="text/javascript" src="../SCRIPTS/mensajes.js"></script>
<script type="text/javascript" src="../SCRIPTS/PAGES/lds.js"></script>
<style type="text/css">
.required {
	color: red;
}
</style>
</head>
<body>
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
							<input type="text" class="form-control" id="txtNombre"
								name="txtNombre" required />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="txtDescrip">Descripción<span class="required">*</span></label>
							<textarea id="txtDescrip" name="txtDescrip" class="form-control"
								rows="6"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
	</form>
</body>
</html>