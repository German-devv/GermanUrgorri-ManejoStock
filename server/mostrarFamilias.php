<?php 

function mostrarFamilias(){

    $base = new PDO('mysql:host=localhost:4306;dbname=proyecto', 'usuario', 'clave');

    $tablaFamilias = $base->query("SELECT * FROM familias");

    foreach($tablaFamilias as $familia){

        echo("<option value='".$familia['cod']."'>".$familia['nombre']."</option>");

    }



}


?>