<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/styleGeneral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Actualizar</title>
</head>

<body>
    <section>

        <h1>Actualizar producto</h1>
        <?php
        
        include('server/accesoBase.php');

        $id = $_GET['id'];



        

        $producto = $base->prepare("SELECT * from productos WHERE id=?");
        $producto->execute([$id]);
        $producto = $producto->fetch(PDO::FETCH_ASSOC);
        

        $precio = explode('.',$producto['pvp']);


        

        echo ("

        <form action='server/updateProducto.php?id=$id' method='post'>
            <table class='table table-striped'>
                <tbody>

                    <tr>
                        <td>
                            <div class='input-group mb-3'>
                                <label class='input-group-text' for='nameProduct'>Nombre:</label>
                                <input class='form-control' value='" . $producto['nombre'] . "' type='text' name='nameProduct'
                                    id='nameProduct'>
                            </div>
                        </td>
                        <td>
                            <div class='input-group mb-3'>
                                <label class='input-group-text' for='shortName'>Nombre corto:</label>
                                <input class='form-control' value='" . $producto['nombre_corto'] . "' type='text' name='shortName'
                                    id='shortName'>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class='input-group mb-3'>
                                <label class='input-group-text' for='euro'>Precio:</label>
                                <input type='number' value='" . $precio[0] . "' name='euro' id='euro' min='0' style='width: 100px;'>
                                <label class='input-group-text' for='euro'>,</label>
                                <input type='number' value='" . $precio[1] . "' name='cent' id='cent' min='0' max='99' style='width: 50px;'>
                                <label class='input-group-text' for='euro'>€</label>
                            </div>
                        </td>

                        <td>
                            <div class='input-group mb-3'>
                                <label class='input-group-text' for='family'>Familia:</label>
                                <select class='form-control' type='text' name='family' id='family'>
                                ");


        include('server/mostrarFamilias.php');
        mostrarFamilias($producto['familia']);

        echo ("
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <label class='input-group-text' for='description'>Descripción:</label>
                            <textarea class='form-control' type='text' name='description' id='description'>
                            " . $producto['descripcion'] . "</textarea>
                            </textarea>
                        </td>
                    </tr>
                    <tr>

")
        ?>
        <td>
            <input type='submit' id='update' class='btn btn-success' value='Modificar'>
            <input type='reset' id='update' class='btn btn-danger' value='Limpiar'>
        </td>

        <td><a href="listado.php" class='btn btn-primary'>Volver</a></td>
        </tr>



        </tbody>

        </table>

        </form>
    </section>
</body>

</html>