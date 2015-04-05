$(document).on('click', '#btnGuardar', function() {
	msn_load("Guardando", "Estamos almacenando la información, por favor espere.");
	$.post('../CLASES/CONTROLLERS/ControllerLineaServicio.php', $("#form_lds").serialize() + "&btnGuardar", function(resp) {
		alert(resp);
		if (resp == '-1') {
			msn('Error', 'Lo sentimos, no fue posible almacenar la información');
		} else {
			msn('Listo!', 'La información se almacenanó correctamente');
		}
	});
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