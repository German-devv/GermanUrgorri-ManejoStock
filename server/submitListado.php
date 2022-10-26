<?php




if(isset($_POST)) $x =  array_keys($_POST)[0];

$x = explode("-",$x);


$action = $x[0];
$id = $x[1];



if($action == 'detalle'){

    header("Location: ../detalle.php?id=$id", true, 301);
    exit();
}

if($action == 'actualizar'){

    header("Location: ../update.php?id=$id", true, 301);
    exit();
}   

if($action == 'borrar'){

    header("Location: ../borrar.php?id=$id", true, 301);
    exit();
    
}if($action == 'stock'){
    header("Location: ../moverStock.php?id=$id", true, 301);
    exit();
}


?>