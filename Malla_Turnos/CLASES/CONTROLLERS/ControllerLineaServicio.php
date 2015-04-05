<?php
include_once '../ENTITIES/LineaServicio.php';
include_once '../DAOS/DaoLineaServicio.php';

header ( 'Content-type: application/json; charset=utf-8' );

if (isset ( $_POST ['btnGuardar'] )) {
	$lds = new LineaServicio ();
	$lds->setSigla ( $_POST ['txtNombre'] );
	$lds->setDescripcion ( $_POST ['txtDescrip'] );
	
	$dao = new DaoLineaServicio ( $lds );
	
	if (isset ( $_POST ['txtId'] )) {
		$lds->setId ( $_POST ['txtId'] );
		$id = $dao->modificar ();
	} else {
		$id = $dao->guardar ();
	}
	
	echo $id;
} else if (isset ( $_POST ['btnConsultar'] )) {
}

?>