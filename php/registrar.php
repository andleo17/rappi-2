<?php
require_once("conexion.php");
$idusuario = $_POST['idusuario'];
$pedido = $_POST['pedido'];

$resp=1;

try
{
	$cnx->beginTransaction();

	$a=$cnx->prepare("INSERT INTO pedido (idcliente,fechahora) VALUES (:idusuario,now())");
	$a->bindParam(":idusuario",$idusuario);
	$a->execute();

	$rs = $cnx->query("SELECT max(idpedido) as ultimo FROM pedido")  or $resp=0;
	$reg = $rs->fetchObject();
	$idpedido = $reg->ultimo;

	$total = 0;
	
	foreach ($pedido as $producto) {
		$b=$cnx->prepare("INSERT INTO detalle (idpedido, idproducto, cantidad, precio, importe)	VALUES(:idpedido,:idproducto,:cantidad,:precio,:importe)");
		$importe = $producto['precio'] * $producto['cantidad'];
		$total=$total+$importe;
		$b->bindParam(":idpedido",$idpedido);
		$b->bindParam(":idproducto",$producto['id']);
		$b->bindParam(":cantidad",$producto['cantidad']);
		$b->bindParam(":precio",$producto['precio']);
		$b->bindParam(":importe", $importe);
		$b->execute();
	}

	//Actualizar el total
	$c=$cnx->prepare("UPDATE pedido SET total=:total WHERE idpedido=:idpedido");
	$c->bindParam(":total",$total);
	$c->bindParam(":idpedido",$idpedido);
	$c->execute();

	$cnx->commit();
} catch(PDOException $x) { 
	$cnx->rollBack();
	$resp=0; 
}
echo $resp;
