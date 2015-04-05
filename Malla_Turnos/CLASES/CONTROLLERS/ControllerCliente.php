<?php
include_once '../ENTITIES/Cliente.php';
include_once '../DAOS/DaoCliente.php';

header ( 'Content-type: application/json; charset=utf-8' );

if (isset ( $_GET ['btnConsultar'] )) {
	$cliente = new Cliente ();
	$cliente->setNombre ( $_GET ['txtNombre'] != "" ? $_GET ['txtNombre'] : null );
	$cliente->setNit ( $_GET ['txtNit'] != "" ? $_GET ['txtNit'] : null );
	$dao = new DaoCliente ( $cliente );
	
	$resp = $dao->consultar ();
	$resp = $resp != null ? $resp : "";
	echo json_encode ( $resp );
}

if (isset ( $_POST ['btnGuardar'] )) {
	$cliente = new Cliente ();
	
	$cliente->setNombre ( $_POST ['txtNombre'] );
	$cliente->setNit ( $_POST ['txtNit'] );
	$cliente->setIdLineaServicio ( $_POST ['selLinServ'] );
	$cliente->setActivo ( 1 );
	
	$dao = new DaoCliente ( $cliente );
	
	if ($_POST ['txtId'] != "") {
		$cliente->setId ( $_POST ['txtId'] );
		$id = $dao->modificar ();
	} else {
		$id = $dao->guardar ();
	}
	
	echo $id;
}
?>