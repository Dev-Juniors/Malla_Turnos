<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../DAOS/DaoLineaServicio.php';


if (isset ( $_GET ['btnConsultar'] )) {
// 	header ( 'Content-type: application/json; charset=utf-8' );
	header ( 'Content-type: application/json; charset=UTF-8' );
	$lineaServicio = new LineaServicio ();
	$lineaServicio->setSigla ( $_GET ['txtNombre'] != "" ? $_GET ['txtNombre'] : null );
	$lineaServicio->setDescripcion ( $_GET ['txtDescrip'] != "" ? $_GET ['txtDescrip'] : null );
	$dao = new DaoLineaServicio ( $lineaServicio );
	
	$resp = $dao->consultar ();
	$resp = $resp != null ? $resp : "";
// 	echo $resp;
	echo json_encode ( $resp );
}

if (isset ( $_POST ['btnGuardar'] )) {
	header ( 'Content-type: text/plain; charset=UTF-8' );
	$lds = new LineaServicio ();
	$lds->setSigla ( $_POST ['txtNombre'] );
	$lds->setDescripcion ( utf8_decode($_POST ['txtDescrip']) );
	
	$id = - 1;
	$dao = new DaoLineaServicio ( $lds );
	if ($_POST ['txtId'] != "") {
		$lds->setId ( $_POST ['txtId'] );
		$id = $dao->modificar ();
	} else {
		$id = $dao->guardar ();
	}
	echo $id;
}

if (isset ( $_GET ['forselect'] )) {
	header ( 'Content-type: application/json; charset=utf-8' );
	$lineaServicio = new LineaServicio ();
	$dao = new DaoLineaServicio ( $lineaServicio );
	echo json_encode ( $dao->consultarForSelect () );
}

?>