var arrayDias = [];
arrayDias[0] = "Lunes";
arrayDias[1] = "Martes";
arrayDias[2] = "Miércoles";
arrayDias[3] = "Jueves";
arrayDias[4] = "Viernes";
arrayDias[5] = "Sábado";
arrayDias[6] = "Domingo";

$(function() {
	cargarLineasServicio();
});

$(document).ready(function() {
	$("#form_GenMod").validationEngine('attach', {
		promptPosition : "bottomLeft",
		autoHidePrompt : true,
		autoHideDelay : 4000,
	});
});

$(document).on('change', '#selCliente', function() {
	cargarHorarioCliente($("#selCliente").val());
});

$(document).on('change', '#selLinServ', function() {
	removeOptions('selCliente');
	cargarClientes($("#selLinServ").val());
	$("#selCliente").removeAttr('disabled');
});

$(document).on('click', '#btnGuardar', function() {
	alert($("input[name='rbHorario']:checked").val());
});

var cargarLineasServicio = function() {
	$.get('../CLASES/CONTROLLERS/ControllerLineaServicio.php?forselect',
			function(list) {
		var res = JSON.parse(list);
		if (res.length > 0) {
			cargarSelect("#selLinServ", res);
		}
	});
};

var cargarSelect = function(idSelect, jsonArr) {
	var html = "<option value=''>-- Seleccione --</option>";
	for (var i = 0; i < jsonArr.length; i++) {
		html = html + "<option value=" + jsonArr[i].id + ">" + jsonArr[i].sigla
		+ "</option>";
	}
	$(idSelect).html('');
	$(idSelect).html(html);
};

var cargarClientes = function(idLinea) {
	$.get('../CLASES/CONTROLLERS/ControllerCliente.php?forselect&idLinea=' + idLinea, function(list) {
		try {
			var res = JSON.parse(list);
			if (res.length > 0) {
				cargarSelect("#selCliente", res);
			}
		} catch (e) {
			$("#selCliente").attr('disabled', 'disabled');
		}
	});
};

var cargarHorarioCliente = function(idCliente) {
	$.get('../CLASES/CONTROLLERS/ControllerCliente.php?consultar&idCliente=' + idCliente, function(list) {
		try {
			var res = JSON.parse(list);
			if (res.length > 0) {
				cargarTabla(res);
			}
		} catch (e) {
			$("#selCliente").attr('disabled', 'disabled');
		}
	});
};

var removeOptions = function (idSelect) {
	var select = document.getElementById(idSelect);
	for (var int = 1; int <= select.length; int++) {
		select.remove(int);
	}
};

var cargarTabla = function(jsonData) {
	var fila;
	$('#tbody').empty();
	for (var i = 0; i < jsonData.length; i++) {
		var array = jsonData[i].dias.split("");
		if (array[i] == "1") {
			dias += ", " + arrayDias[i];
		}
	}
	var dias = dias.substring(2);
	fila = '<tr>'
		+ '<td>' + dias + '</td>'
		+ '<td>' + jsonData[i].inicio + '</td>'
		+ '<td>' + jsonData[i].fin + '</td>'
		+ '<td><input type="radio" name="rbHorario" value="' + jsonData[i].id + '"></td>'
		+ '</tr>';
	$('#tbody').append(fila);
};