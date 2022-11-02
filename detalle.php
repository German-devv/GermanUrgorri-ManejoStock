<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/styleGeneral.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Detalles</title>
</head>

<body>

    <section>
        <?php
        include('server/accesoBase.php');

        $id = $_GET['id'];


        

        $producto = $base->prepare("SELECT * from productos WHERE id=?");
        $producto->execute([$id]);
        $producto = $producto->fetch(PDO::FETCH_ASSOC);



        echo ("
        <h1>Detalles de " . $producto['nombre'] . "</h1>
            <table class='table table-striped'>
                <tbody>
                    <tr>
                        <td colspan='2'>
                            <div class='input-group mb-3'>
                                <p class='input-group-text' >Nombre:</p>
                                <p class='input-group-text'>" . $producto['nombre'] . "</p>
                            </div>
                        </td>
                        <td>
                            <div class='input-group mb-3'>
                                <p class='input-group-text' >Nombre corto:</p>
                                <p class='input-group-text'>" . $producto['nombre_corto'] . "</p>
                            </div>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <div class='input-group mb-3'>
                                <p class='input-group-text' >Codigo:</p>
                                <p class='input-group-text'>" . $producto['id'] . "</p>


                            </div>
                        </td>


                        <td>
                            <div class='input-group mb-3'>
                                <p class='input-group-text' >Precio:</p>
                                <p class='input-group-text'>" . $producto['pvp'] . " €</p>


                            </div>
                        </td>

                        <td>
                            <div class='input-group mb-3'>
                                <p class='input-group-text' >Familia:</p>
                                <p class='input-group-text'>" . $producto['familia'] . "</p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='3'>
                            <p class='input-group-text' >Descripcion:</p>
                            <p class='input-group-text'>" . $producto['descripcion'] . "</p>
                        </td>
                    </tr>
                    <tr>


                        <td colspan='3'>
                            <a href='listado.php' class='btn btn-primary button'> Volver </a>
                        </td>
                    </tr>
                </tbody>
            </table>
     ");
        ?>
    </section>
</body>

</html>