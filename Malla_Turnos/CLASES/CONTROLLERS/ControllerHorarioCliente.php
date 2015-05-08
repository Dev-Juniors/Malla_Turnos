<?php
include_once '../ENTITIES/Cliente.php';
include_once '../DAOS/DaoHorarioCliente.php';

if (isset ( $_GET ['consultar'] )) {
	header ( 'Content-type: application/json; charset=utf-8' );
	if (isset ( $_GET ['HrCliente'] )) {
		$resp = DaoHorarioCliente::consultarTodo ( $_GET ["idCliente"] );
	} else {
		$resp = DaoHorarioCliente::consultar ( $_GET ["idCliente"] );
		$resp = $resp != null ? $resp : "";
	}
	echo json_encode ( $resp );
}

if (isset ( $_POST ['btnGuardar'] )) {
	header ( 'Content-type: text/plain; charset=utf-8' );
	$hCliente = new HorarioCliente ();
	$hCliente->setIdCliente ( $_POST ['txtIdHrCliente'] );
	$hCliente->setFechaInicio ( $_POST ['txtDesde'] );
	$hCliente->setFechaFin ( $_POST ['txtHasta'] );
	$hCliente->setActivo ( 1 );
	$dao = new DaoHorarioCliente ( $hCliente );
	if ($_POST ['txtId'] != "") {
		$hCliente->setId ( $_POST ['txtId'] );
		$id = $dao->modificar ();
	} else {
		$id = $dao->guardar ();
	}
	echo $id;
}

if (isset ( $_GET ['btnGuardarHorario'] )) {
	if (isset($_GET['detalleHorario'])) {
		$detalleHorario = json_decode( str_replace("\\", '', $_GET ['detalleHorario'] ));
		for ($i = 0; $i < count($detalleHorario); $i++) {
			echo $detalleHorario[$i].idHrCliente;
// 			echo $detalleHorario[$i.idHrCliente];
		}
		
// 		for ($i = 0; $i < count($detalleHorario) ; $i++) {
// 			if ($detalleHorario.idHrCliente != '') {
// 				$hCliente = new HorarioCliente ();
// 				$hCliente->setId( $detalleHorario.idHrCliente );
// 				$dao = new DaoHorarioCliente ( $hCliente );
// 				$id = $dao->guardarDetalleHorario($detalleHorario.inicio, $detalleHorario.fin , $detalleHorario.dias);
// 			}
// 		}
	}
// 	echo $id;
}

?>