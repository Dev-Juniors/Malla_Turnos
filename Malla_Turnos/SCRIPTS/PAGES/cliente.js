var dataList = [];
var msgCarga = true;

$(document).ready(function () {
    $("#form_cliente").validationEngine('attach', 
        {
    	promptPosition : "bottomLeft",
		autoHidePrompt : true,
		autoHideDelay : 4000,
    });
});
$(document).on('click', '#btnGuardar', function() {
	if ($("#form_cliente").validationEngine('validate') != false) {
		msn_load("Guardando", "Estamos almacenando la información, por favor espere.");
		$.post('../CLASES/CONTROLLERS/ControllerCliente.php', $("#form_cliente").serialize() + "&btnGuardar=1", function(resp) {
			if (resp == '-1') {
				msn('Error', 'Lo sentimos, no fue posible almacenar la información');
			} else {
				msn('Listo', 'La información se almacenanó correctamente');
				limpiar();
				msgCarga = false;
				$("#btnConsultar").click();
			}
		});
	}
});
$(document).on('click', '#btnConsultar', function() {
	if (msgCarga) {
		msn_load("Buscando", "Estamos consultando la información, por favor espere.");
	}
	$.get('../CLASES/CONTROLLERS/ControllerCliente.php', $("#form_cliente").serialize() + "&btnConsultar", function(resp) {
		if (resp != "") {
			var res = JSON.parse(resp);
			cargarTabla(res);
			if (msgCarga) {
				$('.alert-warning').remove();
			}
		} else {
			msn('Error', 'No hay clientes registrados con los datos ingresados');
			$('#tbody').empty();
		}
		msgCarga = true;
	});
});

$(document).on('click', '#btnLimpiar', function() {
	limpiar();
});

$(function(){
	cargarLineasServicio();
});

var cargarLineasServicio = function (){
    $.get('../CLASES/CONTROLLERS/ControllerLineaServicio.php?forselect', function(list) {
    	var res = JSON.parse(list);
        if (res.length > 0) {
            cargarSelect("#selLinServ", res);
        }
    });
};

var cargarSelect = function(idSelect, jsonArr) {
    var html = "<option value=''>-- Seleccione --</option>";
    for (var i = 0; i < jsonArr.length; i++) {
        html = html + "<option value=" + jsonArr[i].id + ">" + jsonArr[i].sigla + "</option>";
    }
    $(idSelect).html('');
    $(idSelect).html(html);
};

var cargarTabla = function(jsonData) {
    var fila, i = 1;
    dataList = [];
    $('#tbody').empty();
    for (i = 0; i < jsonData.length; i++) {
        fila = '<tr>'
                + '<td>' + jsonData[i].id + '</td>'
                + '<td>' + jsonData[i].nombre + '</td>'
                + '<td>' + jsonData[i].nit + '</td>'
                + '<td> <a onclick="detalle(' + i + ')"><button type="button" class="btn btn-default" aria-label="Editar">'
                + '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>'
                + '</tr>';
        $('#tbody').append(fila);
        dataList.push(jsonData[i]);
    }
};

var detalle = function(pos) {
    var cliente = dataList[pos];
    $("#txtId").val(cliente.id);
    $("#txtNombre").val(cliente.nombre);
    $("#txtNit").val(cliente.nit);
    $("#selLinServ").val(cliente.id_linea_servicio);
    $("#chkActivo").prop("checked", cliente.activo == "0" ? false : true );
    $("#txtNombre").focus();
    $("#btnHorario").prop("disabled",false);
};

var limpiar = function() {
    $("#txtId").val("");
    $("#txtNombre").val("");
    $("#txtNit").val("");
    $("#selLinServ").val("");
    $("#chkActivo").prop("checked", false);
    $("#txtNombre").focus();
    $("#btnHorario").prop("disabled",true);
};

$(document).on('click', '#linkNext', function() {
	if ($("#form_cliente").validationEngine('validate') != false) {
		
	}
});
