<?php


function mostrarListado()
{

  $base = new PDO('mysql:host=localhost:4306;dbname=proyecto', 'usuario', 'clave');

  $tablaProducto = $base->query("SELECT * FROM productos");

  foreach ($tablaProducto as $producto){
    echo("
    
              <tr class='table-striped'>
                <td><submit type='button' class='btn btn-primary'>Detalles</submit></td>

                <td><p id='code'>".$producto['id']."</p></td>

                <td><p id='name'>".$producto['nombre']."</p></td>
                <td>
                  <submit type='button' class='btn btn-warning'>Acutalizar</submit>
                  <submit type='button' class='btn btn-danger'>Borrar</submit>
                </td>
              </tr>
    ");
  }
}




