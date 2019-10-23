<?php
require_once("conexion.php");
$sql = "SELECT * FROM producto";
$rs = $cnx->query($sql);
while($reg=$rs->fetchObject()){
	echo "<tr class='bg-warning text-dark'>
			<td id='nombre[$reg->idproducto]'>$reg->nombre</td>
			<td>$reg->precio</td>
			<td><img id='foto[$reg->idproducto]' src='$reg->foto' height='50' /></td>
			<td><input type='text' id='txtcantidad[$reg->idproducto]' value='1' size='4'></td>
			<td><button type='button' onclick='agregar($reg->idproducto,$reg->precio)' class='btn btn-success'>Agregar</button></td>
		  </tr>";
}
