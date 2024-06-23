<?php

include('../db.php');


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM movies WHERE id_movie=$id";

    if ($conn->query($sql) === TRUE) {
        header("peliculasDetail: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo4.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/peliculaDetail.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>
</head>

<body class="bg-image" style="background-image: url('../img/posters80.jpg'); background-repeat: no-repeat; background-size:cover;">

    <?php include('header.php'); ?>
  
 
    <main>
        <div class="encabezado">
            <div class="container text center">
                <div class="bg-info rounded-3 text center">
                    <h2 style="text-align: center;">LISTADO DE PELICULAS</h2>
                </div>
                <a href="peliculaFormAlta.php" class="m-2 btn btn-success">Agregar película</a>           
            </div>
        </div>
        <div class="table-responsive" >
            <div class="table-wrapper">
                <table class="table table-primary">
                
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Género</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Año</th>
                            <th scope="col">Director</th>
                            <th scope="col">Imagen</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $pelis= $conn->query("SELECT * FROM movies"); 
                            $datos = $pelis->fetch_all(MYSQLI_ASSOC);
                            foreach ($datos as $dato){ ?>
                        <tr>
                            <?php 
                            echo "<td><b>".$dato['nombre']."</b></td>";
                            echo "<td>".$dato['descripcion']."</td>";
                            echo "<td>".$dato['genero']."</td>";
                            echo "<td>".$dato['calificacion']."</td>";
                            echo "<td>".$dato['año']."</td>";
                            echo "<td>".$dato['director']."</td>";
                            echo "<td><img src='".$dato['imagen']."' alt='No hay imgen' style='width:150px'></td>";
                            echo "<td><a href=".$dato['link']." class='btn btn-success'>Trailer</a></td>";
                            echo "<td><a href='peliculaFormUpdate.php?editar=".$dato['id_movie']. "' class='btn btn-warning' >Editar</a></td>";
                            echo "<td><a href='peliculasDetail.php?delete=".$dato['id_movie']." ' class='btn btn-danger' name='eliminar'>Eliminar</a></td>";
                        }   
                            ?>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</script>
</body>
</html>