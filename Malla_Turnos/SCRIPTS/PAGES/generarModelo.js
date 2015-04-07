$(document).ready(function () {
    $("#form_GenMod").validationEngine('attach', 
        {
    	promptPosition : "bottomLeft", autoHidePrompt: true, autoHideDelay: 4000,
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


$(document).on('change', '#selLinServ', function() {
	cargarClientes($("#selLinServ").val());
	$("#selCliente").removeAttr('disabled');
});

var cargarClientes = function (idLinea){
    $.get('../CLASES/CONTROLLERS/ControllerCliente.php?forselect&idLinea='+idLinea, function(list) {
    	alert(list);
    	var res = JSON.parse(list);
        if (res.length > 0) {
            cargarSelect("#selCliente", res);
        }
    });
};