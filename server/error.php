<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Styles/styleGeneral.css">
    <title>Error al conectar</title>
</head>
<body>

    <section class="border border-danger">
    <div class="d-flex align-items-center justify-content-center ">
        <div class="text-center">
            <h1 class="display-1 fw-bold">ERROR</h1>
            <p class="fs-3"> <span class="text-danger">Ha habido un error al conectarse a la base de datos.</span> </p>
            <p class="lead">
                <?php 
                
                echo($_GET['e']); 
                
                ?>
              </p>
            <a href="listado.php" class="btn btn-warning">Volver a listado</a>
        </div>
    </div>
</section>
</body>
</html>