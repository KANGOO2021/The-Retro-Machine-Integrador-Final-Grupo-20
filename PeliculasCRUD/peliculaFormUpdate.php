<?php
include('../db.php');

//var_dump($_GET);

if(isset($_GET['editar'])){
    $id = $_GET['editar'];
    $query = "SELECT * FROM movies WHERE id_movie='$id'";
    $resultado = $conn->query($query);
    $pelicula = $resultado->fetch_assoc();
} else {
    
    header('Location: peliculasDetail.php');
    var_dump($_GET);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo4.ico" type="../image/x-icon">
    
    <link rel="stylesheet" href="css/recibirdatosmovies.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>
</head>
<body class="bg-image" style="background-image: url('../img/posters80.jpg'); background-repeat: no-repeat; background-size:cover;">
    <div class="container text center">
        <div class="p-1 m-3 bg-info rounded-3">
            <h2>Actualizar Película</h2>
        </div>
        <form action="peliculaUpdate.php" method="post" enctype="multipart/form-data" class="p-4 bg-white rounded">

            <input type="hidden" name="id_movie" value="<?php echo $pelicula['id_movie'];?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $pelicula['nombre'];?>">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $pelicula['descripcion'];?></textarea>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $pelicula['genero'];?>">
            </div>
            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación</label>
                <input type="text" class="form-control" id="calificacion" name="calificacion" value="<?php echo $pelicula['calificacion'];?>">
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año</label>
                <input type="number" class="form-control" id="anio" name="anio" value="<?php echo $pelicula['año'];?>">
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director" value="<?php echo $pelicula['director'];?>">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" value="<?php echo $pelicula['imagen'];?>">
                <?php  if($pelicula['imagen'] != ''){ ?>
                    <p>Imagen Actual <img src="<?php echo $pelicula['imagen'] ?>" alt="Imagen de la película" width="200"></p>
                <?php } ?>

            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Trailer</label>
                <input type="text" class="form-control" id="link" name="link" value="<?php echo $pelicula['link'];?>">
            </div>
            <div class="mb-3" style="text-align: center;">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-danger" onclick="location.href='peliculasDetail.php'">Cancelar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>