<?php


function mostrarListado()
{

  $base = new PDO('mysql:host=localhost:4306;dbname=proyecto', 'usuario', 'clave');

  $tablaProducto = $base->prepare("SELECT * FROM productos");
  $tablaProducto -> execute();
  echo(json_encode($tablaProducto));



}






/*

<tr class="table-striped">
                <td><submit type="button" class="btn btn-primary">Detalles</submit></td>

                <td><p id="code">1</p></td>

                <td><p id="name">Intel Core i5</p></td>
                <td>
                  <submit type="button" class="btn btn-warning">Acutalizar</submit>
                  <submit type="button" class="btn btn-danger">Borrar</submit>
                </td>
              </tr>
              <tr class="table-striped">
                <td><submit type="button" class="btn btn-primary">Detalles</submit></td>

                <td><p id="code">1</p></td>

                <td><p id="name">Intel Core i5</p></td>
                <td>
                  <submit type="button" class="btn btn-warning">Acutalizar</submit>
                  <submit type="button" class="btn btn-danger">Borrar</submit>
                </td>
              </tr>


 */
