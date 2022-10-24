<?php

$x =  array_keys($_POST)[0];

$x = explode("-",$x);


$action = $x[0];
$id = $x[1];
setcookie('id',$id, time() + 86400 , '/DSW%202022/GermanUrgorri-ManejoStock');


if($action == 'detalle'){
    header("Location: ../detalle.php", true, 301);
    exit();
}

if($action == 'actualizar'){
    echo('actualizar');
}   

if($action == 'borrar'){

    $base = new PDO('mysql:host=localhost;dbname=proyecto', 'usuario', 'clave');

    $deleteId = $base->prepare("DELETE FROM productos WHERE id = ?");
    $deleteId ->execute([$id]);



    header("Location: ../listado.php", true, 301);
    exit();
    
}

?>