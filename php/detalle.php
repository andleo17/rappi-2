<?php
require_once("conexion.php");
$idusuario = $_POST['idusuario'];

$sql = "SELECT t.*, p.nombre FROM temp t, producto p 
		WHERE t.idproducto=p.idproducto AND t.idusuario='$idusuario'";
$rs = $cnx->query($sql);
$total=0;
while($reg=$rs->fetchObject()){
	$total=$total+$reg->importe;
	echo "<tr class='bg-warning text-dark'>
			<td>$reg->nombre</td>
			<td>$reg->precio</td>
			<td>$reg->cantidad</td>
			<td>$reg->importe</td>
		  </tr>";
}
echo "<tr>
		<th colspan='3'>Total a pagar</th>
		<th>S./ $total nuevos soles.</th>
	</tr>";
?>