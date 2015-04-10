var dataList = [];
var dataListDetalle = [];
var arrayHorarios = new Array();

var msgCarga = true;

$(document).ready(function() {
	consultarHorario();
	$("#form_HrCliente").validationEngine('attach', {
		promptPosition : "bottomLeft",
		autoHidePrompt : true,
		autoHideDelay : 4000,
	});
	$("#form_modal").validationEngine('attach', {
		promptPosition : "bottomLeft",
		autoHidePrompt : true,
		autoHideDelay : 4000,
	});
});

$(document).on('click', '#btnLimpiar', function() {
	limpiar();
});

$(document).on('click', '#btnHorario', function() {

});

$(document).on('click', '#btnGuardar', function() {
	alert($("#form_HrCliente").validationEngine('validate'));
});

var cargarSelect = function(idSelect, jsonArr) {
	var html = "<option value=''>-- Seleccione --</option>";
	for (var i = 0; i < jsonArr.length; i++) {
		html = html + "<option value=" + jsonArr[i].id + ">" + jsonArr[i].sigla
				+ "</option>";
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
				+ '<td>'
				+ jsonData[i].id
				+ '</td>'
				+ '<td>'
				+ jsonData[i].nombre
				+ '</td>'
				+ '<td>'
				+ jsonData[i].nit
				+ '</td>'
				+ '<td> <a onclick="detalle('
				+ i
				+ ')"><button type="button" class="btn btn-default" aria-label="Editar">'
				+ '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>'
				+ '</tr>';
		$('#tbody').append(fila);
		dataList.push(jsonData[i]);
	}
};

var consultarHorario = function() {

};

var detalle = function(pos) {
	var cliente = dataList[pos];
	$("#txtId").val(cliente.id);
	$("#txtNombre").val(cliente.nombre);
	$("#txtNit").val(cliente.nit);
	$("#selLinServ").val(cliente.id_linea_servicio);
	$("#chkActivo").prop("checked", cliente.activo == "0" ? false : true);
	$("#txtNombre").focus();
	$("#btnHorario").prop("disabled", false);
};

var limpiar = function() {
	$("#txtId").val("");
	$("#txtNombre").val("");
	$("#txtNit").val("");
	$("#selLinServ").val("");
	$("#chkActivo").prop("checked", false);
	$("#txtNombre").focus();
	$("#btnHorario").prop("disabled", true);
};

$(document).on('click', '#btnAgregar', function() {
	if ($("#form_modal").validationEngine('validate') != false) {
		var objHorario = new Object();
		var dias = "";
		var fin = document.getElementById("txtFin").value;
		var inicio = document.getElementById("txtInicio").value;
		objHorario.inicio = inicio;
		objHorario.fin = fin;
		for (var int = 1; int <= 7; int++) {
			if (document.getElementById('dia' + int).checked) {
				dias += "1";
			} else {
				dias += "0";
			}
		}
		objHorario.dias = dias;
		arrayHorarios.push(objHorario);
		cargarTabla(arrayHorarios);
// var jsonArray = JSON.parse(JSON.stringify(arrayHorarios));
	}
});

var cargarTabla = function(jsonData) {
    var fila, i = 1;
    dataList = [];
    $('#tbodyHr').empty();
    for (i = 0; i < jsonData.length; i++) {
    	
        fila = '<tr>'
                + '<td>' + getDias(jsonData[i].dias) + '</td>'
                + '<td>' + jsonData[i].inicio + '</td>'
                + '<td>' + jsonData[i].fin + '</td>'
                + '<td> <a onclick="detalle(' + i + ')"><button type="button" class="btn btn-default" aria-label="Editar">'
                + '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>'
                + '</tr>';
        $('#tbodyHr').append(fila);
        dataList.push(jsonData[i]);
    }
};

function getDias(dias){
	var cadena="";
	   for (var i = 0; i < dias.length; i++) {
	         var caracter = dias.charAt(i);
	         if (caracter != 0) {
	        	 switch(i) {
	        	    case 0: cadena = "Lunes ";break;
	        	    case 1: cadena += "Martes ";break;
	        	    case 2: cadena += "Miércoles ";break;
	        	    case 3: cadena += "Jueves ";break;
	        	    case 4: cadena += "Viernes ";break;
	        	    case 5: cadena += "Sábado ";break;
	        	    case 6: cadena += "Domingo";break;
	        	}
			}
	    }
	return cadena;
}

// $(document).on('click', '#btnGuardarHorario', function() {
// msn_load("Guardando", "Estamos almacenando la información, por favor
// espere.");
// $.post('../CLASES/CONTROLLERS/ControllerCliente.php',
// $("#form_modal").serialize() + "&btnGuardarHorario=1", function(resp) {
// if (resp == '-1') {
// msn('Error', 'Lo sentimos, no fue posible almacenar la información');
// } else {
// msn('Listo', 'La información se almacenanó correctamente');
// }
// });
// });

