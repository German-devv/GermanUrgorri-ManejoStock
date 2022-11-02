<?php

try{
    $base = new PDO('mysql:host=localhost;dbname=proyecto', 'usuario', 'clave');
} catch (Exception $e){

    //header("Location: server", true, 301);
   
    //die();
}



