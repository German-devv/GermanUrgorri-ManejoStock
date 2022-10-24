<?php


$producto = [];

if(isset($_POST['nameProduct'])) array_push($producto,$_POST['nameProduct']);

if(isset($_POST['shortName'])) array_push($producto,$_POST['shortName']);

if(isset($_POST['description'])) array_push($producto,$_POST['description']);

if(isset($_POST['price'])) array_push($producto,$_POST['price']);

if(isset($_POST['family'])) array_push($producto,$_POST['family']);




$base = new PDO('mysql:host=localhost;dbname=proyecto', 'usuario', 'clave');


$insert = $base ->prepare("INSERT INTO `productos`(nombre, nombre_corto, descripcion, pvp, familia) VALUES (?,?,?,?,?)");
$insert ->execute($producto);


header("../listado.php");
die();
