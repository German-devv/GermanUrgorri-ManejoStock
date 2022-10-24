<?php





$producto = [];

if(isset($_GET['nameProduct'])) array_push($producto, $_GET['nameProduct']);

if(isset($_GET['shortName'])) array_push($producto, $_GET['shortName']);

if(isset($_GET['description'])) array_push($producto, $_GET['description']);

if(isset($_GET['price'])) array_push($producto, $_GET['price']);

if(isset($_GET['family'])) array_push($producto, $_GET['family']);

print_r($producto);



$base = new PDO('mysql:host=localhost:4306;dbname=proyecto', 'usuario', 'clave');



$insert = $base ->prepare("INSERT INTO `productos`(nombre, nombre_corto, descripcion, pvp, familia) VALUES (?,?,?,?,?)");
$insert ->execute($producto);


header("../listado.php");
die();
//INSERT INTO `tiendas` VALUES (1,'CENTRAL','600100100'),(2,'SUCURSAL1','600100200'),(3,'SUCURSAL2',NULL);
