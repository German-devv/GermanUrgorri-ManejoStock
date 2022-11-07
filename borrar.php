<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/styleGeneral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Producto borrado</title>
</head>

<body>
<?php

include('server/accesoBase.php');

?>
    <section>
        <table class="table table-borderless">

            <?php
            include('server/accesoBase.php');

            
            $id = $_GET['id'];

            

            $deleteId = $base->prepare("DELETE FROM productos WHERE id = ?");
            $deleteId->execute([$id]);

            echo ("
            <tr>
                <td><h1>Producto de Código $id borrado correctamente</h1></td>
            </tr>
            ")
            ?>
            <td>
                <a href="listado.php" class="btn btn-primary button"> Volver </a>
            </td>
        </table>

    </section>
</body>

</html>