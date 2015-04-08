$(document).ready(function() {
	$("#form_GenMod").validationEngine('attach', {
		promptPosition : "bottomLeft",
		autoHidePrompt : true,
		autoHideDelay : 4000,
	});
});

$(function() {
	cargarLineasServicio();
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

$(document).on('change', '#selLinServ', function() {
	removeOptions();
	cargarClientes($("#selLinServ").val());
	$("#selCliente").removeAttr('disabled');
});

var cargarClientes = function(idLinea) {
	$.get('../CLASES/CONTROLLERS/ControllerCliente.php?forselect&idLinea='
			+ idLinea, function(list) {
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

function removeOptions() {
	var select = document.getElementById('selCliente');
	for (var int = 1; int <= select.length; int++) {
		select.remove(int);
	}
}