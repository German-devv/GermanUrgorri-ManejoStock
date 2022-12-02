<?php



function usuario()
{



    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido!";
        ;
    }else{
        
        include('accesoBase.php');

        $usuario = $base->prepare("SELECT * from usuario WHERE usuario=? AND pass=?");

        
        
    }
}

/*


 ["PHP_AUTH_USER"]=>
  string(1) "a"
  ["PHP_AUTH_PW"]=>
  string(1) "a"


*/

if (isset($_POST)) {

    usuario();
}
