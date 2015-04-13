var dataList = [];
var dataListDetalle = [];
var arrayHorarios = new Array();
var contChecks = 0;
var msgCarga = true;

/**
 * Funciones para la activación del validatioEngine en los campos de los formularios
 *  #form_HrCliente y #form_modal
 */
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

/**
 * Función encargada de asignar los valores de una fila de la tabla en los
 * campos correspondientes y así poder editarlos.
 */
var detalle = function(pos) {
	var hrcliente = arrayHorarios[pos];
	$("#txtInicio").val(hrcliente.inicio);
	$("#txtFin").val(hrcliente.fin);
	alert(hrcliente.dias);
	for (var i = 1; i <= 7; i++) {
		var caracter = hrcliente.dias.charAt(i-1);
		if (caracter != 0) {
			$("#dia"+i).prop('checked',true);
		}
	}
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


function limpiarModal(){
	
}


$(document).on('click', '#btnAgregar', function() {
	if ($("#form_modal").validationEngine('validate') != false) {
		var objHorario = new Object();
		var dias = "";
		var fin = document.getElementById("txtFin").value;
		var inicio = document.getElementById("txtInicio").value;
		validarChecks();
		objHorario.inicio = inicio;
		objHorario.fin = fin;
		for (var int = 1; int <= 7; int++) {
			if (document.getElementById('dia' + int).checked) {
				dias += "1";
				$("#dia"+int).attr('disabled','disabled');
				$("#dia"+int).removeAttr('checked');
				contChecks += 1;
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

function validarChecks(){
	if (contChecks == 6) {
		$("#btnAgregar").attr('disabled','disabled');
	}
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

