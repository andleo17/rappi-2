<?php
require_once("conexion.php");
$usu = $_POST['usuario'];
$pas = sha1($_POST['pass']);

$sql = "SELECT * FROM cliente 
		WHERE dni='$usu' AND password='$pas'";

$rs = $cnx->query($sql);
$cant = $rs->rowCount();
if($cant==1) {
	$reg = $rs->fetchObject();
	$datos['ok'] = 1;
	$datos['idcliente']=$reg->idcliente;
	$datos['nombres']  =$reg->nombres;
} else $datos['ok'] = 0;

echo json_encode($datos);
