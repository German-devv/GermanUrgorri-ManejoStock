<?php

include('accesoBase.php');

$producto = [];

if(isset($_POST['nameProduct'])) array_push($producto,$_POST['nameProduct']);

if(isset($_POST['shortName'])) array_push($producto,$_POST['shortName']);

if(isset($_POST['description'])) array_push($producto,$_POST['description']);

if(isset($_POST['euro'])) $euro = $_POST['euro'] ;

if(isset($_POST['cent'])) $cent = $_POST['cent'] ;

if($cent > 99) $cent = '99';

array_push($producto, $euro.'.'.$cent);

if(isset($_POST['family'])) array_push($producto,$_POST['family']);




array_push($producto,$_GET['id']);






$insert = $base ->prepare("UPDATE `productos` SET nombre=?, nombre_corto=?, descripcion=?, pvp=?, familia=? WHERE id=?");
$insert ->execute($producto);


header("Location: ../listado.php", true, 301);
exit();
