var dataList = [];
var dataListDetalle = [];
var msgCarga = true;

$(document).ready(function () {
	consultarHorario();
    $("#form_HrCliente").validationEngine('attach', 
        {
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

var consultarHorario = function(){
	
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