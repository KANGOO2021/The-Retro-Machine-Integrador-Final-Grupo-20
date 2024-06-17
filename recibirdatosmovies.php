<?php


//var_dump($_POST);

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];
$calificacion = $_POST['calificacion'];
$year = $_POST['anio'];
$director = $_POST['director'];

if($_POST){
    if(empty($nombre) && empty($descripcion) && empty($director)){
        echo("Error al ingresar los datos");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo4.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="css/recibirdatosmovies.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>
</head>

<body class="bg-image" style="background-image: url('img/grayskull.jpg'); background-repeat: no-repeat; background-size:cover;">

        <div class="container">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $nombre?></h2>
                    <p class="card-text" style="width:300px"><b>Descripcion:</b><?php echo $descripcion?></p>
                    <p class="card-text"><b>Género:</b> <?php echo $genero?></p>
                    <p class="card-text"><b>Calificación:</b> <?php echo $calificacion?></p>
                    <p class="card-text"><b>Año:</b> <?php echo $year?></p>
                    <p class="card-text"><b>Director:</b> <?php echo $director?></p>
                
                </div>
            </div>
        </div>
        <div class="container text center">
            <a href="formulario.php" class="btn btn-info">Volver</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>