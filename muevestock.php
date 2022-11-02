<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/styleGeneral.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mover stock</title>
</head>

<body>



    <?php

    include('server/accesoBase.php');

    $id = $_GET['id'];





    $producto = $base->prepare("SELECT nombre from productos WHERE id=?");
    $producto->execute([$id]);
    $producto = $producto->fetch(PDO::FETCH_ASSOC);
    $producto = $producto['nombre'];


    $tiendaStock = $base->prepare("SELECT id,unidades,nombre from stocks INNER JOIN tiendas ON stocks.tienda = tiendas.id where stocks.producto=?");
    $tiendaStock->execute([$id]);






    function selectUnidades($stockActual)
    {
        $options = "";

        for ($i = 1; $i <= $stockActual; $i++) {
            $options .= "<option value='$i'>$i </option>";
        }

        return $options;
    }




    function selectTienda($nombreTienda)
    {

        $options = "";

        $totalTiendas = $GLOBALS['base']->query("SELECT id,nombre from tiendas");


        foreach ($totalTiendas as $tienda) {

            if ($nombreTienda != $tienda['id']) {
                $options .= "<option value='" . $tienda['id'] . "'>" . $tienda['nombre'] . "</option>";
            }
        }



        return $options;
    }





    foreach ($tiendaStock as $stock) {




        echo ("
            
            <form action='server/updateStock.php' method='post'>
                <section>

                    <h1>Mover Stock de $producto en " . $stock['nombre'] . "</h1>
                    
                        <table class='table table-striped'>
                        

                        
                            <tbody>
                                <tr>
                                    <td>
                                        <div class='input-group mb-3'>
                                            <p class='input-group-text'>Tienda actual:</p>
                                            <p class='input-group-text' id='originStore'> " . $stock['nombre'] . " </p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class='input-group mb-3'>
                                            <p class='input-group-text'>Stock actual:</p>
                                            <p class='input-group-text' id='actualStock'> " . $stock['unidades'] . " </p>
                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <div class='input-group mb-3'>
                                            <label class='input-group-text' for='newStore'>Tienda de destino:</label>
                                            <select class='form-control' type='text' name='newStore' id='newStore'>");


        echo (selectTienda($stock['id']));
        echo ("    
                                            </select>
                                        </div>
                                    </td>

                                    <td>
                                        <div class='input-group mb-3'>
                                            <label class='input-group-text' for='numberUnits'>Nº unidades a mover:</label>
                                            <select class='form-control' type='text' name='numberUnits' id='numberUnits'>
                                            ");


        echo (selectUnidades($stock['unidades']));
        echo ("
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan='2'>
                                    <input type='submit' value='enviar' class='btn btn-success button'>
                                    </td>
                                </tr>

                            </tbody>


                        </table>

                
                </section> 


                <input type='hidden' name='idProducto' value=$id>
                <input type='hidden' name='oldStore' value=" . $stock['id'] . ">
                </form>

    ");
    }



    ?>

    <section>
        <a href="listado.php" class='btn btn-primary button'>Volver</a>
    </section>
</body>

</html>