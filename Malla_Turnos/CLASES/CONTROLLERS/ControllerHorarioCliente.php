<?php
include_once '../ENTITIES/Cliente.php';
include_once '../DAOS/DaoHorarioCliente.php';

if (isset ( $_GET ['consultar'] )) {
	header ( 'Content-type: application/json; charset=utf-8' );
	
	$resp = DaoHorarioCliente::consultar ($_GET["idCliente"]);
	$resp = $resp != null ? $resp : "";
	echo json_encode ( $resp );
}

if (isset ( $_POST ['btnGuardar'] )) {
	header ( 'Content-type: text/plain; charset=utf-8' );
	
// 	$cliente = new Cliente ();
// 	$cliente->setNombre ( $_POST ['txtNombre'] );
// 	$cliente->setNit ( $_POST ['txtNit'] );
// 	$cliente->setIdLineaServicio ( $_POST ['selLinServ'] );
// 	$cliente->setActivo ( isset ( $_POST ['chkActivo'] ) ? 1 : 0 );
	
// 	$dao = new DaoCliente ( $cliente );
	
// 	if ($_POST ['txtId'] != "") {
// 		$cliente->setId ( $_POST ['txtId'] );
// 		$id = $dao->modificar ();
// 	} else {
// 		$id = $dao->guardar ();
// 	}
	
// 	echo $id;
}
?>