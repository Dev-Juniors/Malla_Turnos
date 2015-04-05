var dataList = [];

$(document).on('click', '#btnGuardar', function() {
	msn_load("Guardando", "Estamos almacenando la información, por favor espere.");
	$.post('../CLASES/CONTROLLERS/ControllerLineaServicio.php', $("#form_lds").serialize() + "&btnGuardar", function(resp) {
		if (resp == '-1') {
			msn('Error', 'Lo sentimos, no fue posible almacenar la información');
		} else {
			msn('Listo!', 'La información se almacenanó correctamente');
		}
	});
});
$(document).on('click', '#btnConsultar', function() {
	msn_load("Buscando", "Estamos consultando la información, por favor espere.");
	$.get('../CLASES/CONTROLLERS/ControllerLineaServicio.php', $("#form_lds").serialize() + "&btnConsultar", function(resp) {
		var res;
		if (resp != "") {
			try {
				res = JSON.parse(resp);
			} catch (e) {
				alert('errorrrogjofjs');
			}
			
			alert(res);
			cargarTabla(res);
			$('.alert-warning').remove();
		} else {
			msn('Error', 'No hay línea de servicio registradas con los datos ingresados');
			$('#tbody').empty();
		}
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
                + '<td>' + jsonData[i].descripcion + '</td>'
                + '<td> <a onclick="detalle(' + i + ')"><button type="button" class="btn btn-default" aria-label="Editar">'
                + '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>'
                + '</tr>';
        $('#tbody').append(fila);
        dataList.push(jsonData[i]);
    }
};

var detalle = function(pos) {
    var lds = dataList[pos];
    $("#txtId").val(lds.id);
    $("#txtNombre").val(lds.nombre);
    $("#txtDescrip").val(lds.descripcion);
    $("#txtNombre").focus();
};

var limpiar = function() {
    $("#txtId").val("");
    $("#txtNombre").val("");
    $("#txtDescrip").val("");
    $("#txtNombre").focus();
};

