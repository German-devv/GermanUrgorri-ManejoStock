<?php

function mostrarFamilias($x = false)
{

    include('accesoBase.php');

    $tablaFamilias = $base->query("SELECT * FROM familias");

    if ($x == false) {
        foreach ($tablaFamilias as $familia) {

            echo ("<option value='" . $familia['cod'] . "'>" . $familia['nombre'] . "</option>");
        }
    } else {

        foreach ($tablaFamilias as $familia) {
            if($x != $familia['cod'] ){
                echo ("<option value='" . $familia['cod'] . "'>" . $familia['nombre'] . "</option>");
            }else{
                echo ("<option selected='selected' value='" . $familia['cod'] . "'>" . $familia['nombre'] . "</option>");
            }
        }
    }
}
