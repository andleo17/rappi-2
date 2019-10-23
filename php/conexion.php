<?php
$driver = "mysql";
$servidor = "localhost";
$base = "dbpedido";
$usuario = "root";
$clave = "";

$cadena = "$driver:host=$servidor;dbname=$base";
$cnx = new pdo($cadena,$usuario,$clave);
