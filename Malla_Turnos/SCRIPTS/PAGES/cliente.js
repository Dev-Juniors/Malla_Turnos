$(document).on('click', '#btnGuardar', function() {
	msn_load("Guardando", "Estamos almacenando la información, por favor espere.");
	$.post('../CLASES/CONTROLLERS/ControllerCliente.php', $("#form_cliente").serialize() + "&btnGuardar", function(resp) {
		if (resp == '-1') {
			msn('Error', 'Lo sentimos, no fue posible almacenar la información');
		} else {
			msn('Listo!', 'La información se almacenanó correctamente');
		}
//		if (resp == 'fecha') {
//			msn('Error', 'Las fechas que nos diste no tienen un formato válido');
//		} else if (resp == 'false') {
//			msn('Upss', 'Lo sentimos, no fue posible almacenar la información');
//		} else if (resp != '') {
//			var id_act = $("#txt_id").val();
//			if (id_act !== "") {
//				msn('Listo!', 'La información se almacenanó correctamente');
//			} else {
//				$("#txt_id_actividad").val(resp);
//				$("#txt_id_cib").val($("#selCib").val());
//				cargarLugares($("#selCib").val(), false);
//				$('#modal_horario').modal({
//					show: true
//				});
//				$('.alert-warning').remove();
//			}
//			limpiar();
//			consultarActividades();
//		}
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