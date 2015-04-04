<?php
include_once '../ENTITIES/Cliente.php';
include_once '../DAOS/DaoCliente.php';

header ( 'Content-type: application/json; charset=utf-8' );

if (isset ( $_POST ['btnGuardar'] )) {
	$res = array (
			'resultado' => '',
			'id' => -1 
	);
	
	$cliente = new Cliente ();
	
	$cliente->setNombre ( $_POST ['txtNombre'] );
	$cliente->setNit ( $_POST ['txtNit'] );
	$cliente->setIdLineaServicio ( $_POST ['selLinServ'] );
	$cliente->setActivo ( 1 );
	
	$dao = new DaoCliente ( $cliente );
	
	if (isset ( $_POST ['txtId'] )) {
		$cliente->setId ( $_POST ['txtId'] );
		$id = $dao->modificar ();
	} else {
		$id = $dao->guardar ();
	}
	
	echo $id;
} else if (isset ( $_POST ['btnConsultar'] )) {
	
}
// } else {
// 	$cliente = new Cliente ();
// 	$controller = new ControllerCliente ( $cliente );
// 	echo json_encode($controller->consultar());
// }
?>