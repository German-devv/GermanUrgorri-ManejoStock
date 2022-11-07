<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="Styles/styleGeneral.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Listado</title>
</head>

<body>
  <?php

    include('server/accesoBase.php');

  ?>




  <section>
  
  <div class="section-header">
    <h1>Gestion de productos</h1>

    <div>
    <a href="" class="btn btn-warning">Inciar sesion</a>
    <a href="" disabled="disabled" class="btn btn-primary">Resgistrarme (desabilitado)</a>
  </div>
  </div>
    <form action="server/submitListado.php" method="post">
      <table class="table table-striped">
        <thead>
          <tr>
            <td colspan="4">
              <a href="crear.php" class="btn btn-success button">
                Crear
              </a>
            </td>
          </tr>
          <th style="width:5%">
            <p> Detalles</p>
          </th>
          <th style="width:5%">
            <p> Codigo</p>
          </th>
          <th style="width:50%">
            <p> Nombre</p>
          </th>
          <th style="width:20%">
            <p> Acciones</p>
          </th>

        </thead>
        <tbody>

          <?php
          include("server/mostrarListado.php");
          mostrarListado();

          ?>





        </tbody>
      </table>
    </form>
  </section>
</body>

</html>