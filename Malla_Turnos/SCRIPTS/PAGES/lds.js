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
		alert(resp);
		if (resp != "") {
			var res = JSON.parse(resp);
			cargarTabla(res);
			$('.alert-warning').remove();
		} else {
			msn('Error', 'No hay línea de servicio registradas con los datos ingresados');
			$('#tbody').empty();
		}
	});
});


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
