<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../DAOS/DaoLineaServicio.php';

header ( 'Content-type: application/json; charset=utf-8' );

if (isset ( $_GET ['btnConsultar'] )) {
	$lineaServicio = new LineaServicio ();
	$lineaServicio->setSigla ( $_GET ['txtNombre'] != "" ? $_GET ['txtNombre'] : null );
	$lineaServicio->setDescripcion ( $_GET ['txtDescrip'] != "" ? $_GET ['txtDescrip'] : null );
	$dao = new DaoLineaServicio ( $lineaServicio );

	$resp = $dao->consultar ();
	$resp = $resp != null ? $resp : "";
	echo json_encode ( $resp );
}

if (isset ( $_GET ['forselect'] )) {
	header ( 'Content-type: application/json; charset=utf-8' );
	$lineaServicio = new LineaServicio ();
	$dao = new DaoLineaServicio ( $lineaServicio );
	echo json_encode ( $dao->consultarForSelect () );
} else if (isset ( $_POST ['btnGuardar'] )) {
	header ( 'Content-type: text/plain; charset=utf-8' );
	$lds = new LineaServicio ();
	$lds->setSigla ( $_POST ['txtNombre'] );
	$lds->setDescripcion ( $_POST ['txtDescrip'] );
	
	$dao = new DaoLineaServicio ( $lds );
	if ($_POST ['txtId'] != "") {
		$lds->setId ( $_POST ['txtId'] );
		$id = $dao->modificar ();
	} else {
		$id = $dao->guardar ();
	}
	
	echo $id;
}

?>