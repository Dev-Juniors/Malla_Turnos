<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../DAOS/DaoLineaServicio.php';

header ( 'Content-type: application/json; charset=utf-8' );
if (isset ( $_GET )) {
	if (isset ($_GET['forselect'])) {
		$lineaServicio = new LineaServicio();
		$dao = new DaoLineaServicio($lineaServicio);
		echo json_encode($dao->consultarForSelect());
	}
} else {
// 	if (isset ( $_POST ['btnGuardar'] )) {
// 		$res = array (
// 				'resultado' => '',
// 				'id' => - 1 
// 		);
		
// 		$cliente = new Cliente ();
		
// 		$cliente->setNombre ( $_POST ['txtNombre'] );
// 		$cliente->setNit ( $_POST ['txtNit'] );
// 		$cliente->setIdLineaServicio ( $_POST ['selLinServ'] );
// 		$cliente->setActivo ( 1 );
		
// 		$dao = new DaoCliente ( $cliente );
		
// 		if (isset ( $_POST ['txtId'] )) {
// 			$cliente->setId ( $_POST ['txtId'] );
// 			$id = $dao->modificar ();
// 		} else {
// 			$id = $dao->guardar ();
// 		}
// 		if ($id < 0) {
// 			$res ['resultado'] = 'Error';
// 		} else {
// 			$res ['id'] = $id;
// 		}
		
// 		echo json_encode ( $res );
// 	} else if (isset ( $_POST ['btnConsultar'] )) {
// 	}
}
?>