<?php


function mostrarListado()
{

  include('accesoBase.php');

  $tablaProducto = $base->query("SELECT * FROM productos");

  foreach ($tablaProducto as $producto){
    echo("
    
              <tr class='table-striped'>
                <td><input type='submit' name='detalle-".$producto['id']."' class='btn btn-primary' value='Detalles'></td>

                <td><p>".$producto['id']."</p></td>

                <td><p>".$producto['nombre']."</p></td>
                <td class='td-submits'>
                  <input type='submit' name='stock-".$producto['id']."' class='btn btn-info' value='Mover stock'>
                  <input type='submit' name='actualizar-".$producto['id']."' class='btn btn-warning' value='Acutalizar'>
                  <input type='submit' name='borrar-".$producto['id']."' class='btn btn-danger' value='Borrar'>
                </td>
              </tr>
    ");
  }
}




