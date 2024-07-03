<?php
include('../db.php');

//var_dump($_GET);

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $query = "SELECT * FROM movies WHERE id_movie='$id'";
    $resultado = $conn->query($query);
    $pelicula = $resultado->fetch_assoc();
}

///////

if (isset($_POST['update'])) {
    $id = $_POST['id_movie'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $calificacion = $_POST['calificacion'];
    $year = $_POST['anio'];
    $director = $_POST['director'];
    $trailer = $_POST['link'];


    $imagen = $_FILES['imagen']["tmp_name"];
    $nombreImagen = $_FILES['imagen']["name"];
    $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
    $directorio = "../img/peliculas/movie";

    if (!empty($imagen)) {

        if ($tipoImagen == "jpeg" or $tipoImagen == "jpg" or $tipoImagen == "webp") {
            $ruta = $directorio . $id . "." . $tipoImagen;
            $campos = "nombre='$nombre', descripcion='$descripcion', genero='$genero', calificacion='$calificacion', año='$year', director='$director', link='$trailer', imagen='$ruta'";
            $query = "UPDATE movies set $campos WHERE id_movie=$id";
        } else {
            $_SESSION['message'] = 'No se acepta ese formato de imagen ' . $imgName;
            $_SESSION['message_type'] = 'danger';
            header('Location: moviesAdmin.php');
        }
    } else {
        if (empty($nombre) && empty($descripcion) && empty($director)) {
            $_SESSION['message'] = 'Error al ingresar datos';
            $_SESSION['message_type'] = 'warning';
            header('Location: moviesAdmin.php');
        } else {
            $campos = "nombre='$nombre', descripcion='$descripcion', genero='$genero', calificacion='$calificacion', año='$year', director='$director', link='$trailer'";
            $query = "UPDATE movies set $campos WHERE id_movie=$id";
        }
    }
    mysqli_query($conn, $query);

    if (move_uploaded_file($imagen, $ruta)) {
        $_SESSION['message'] = 'Imagen actualizada exitosamente';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al actualizar imagen';
        $_SESSION['message_type'] = 'danger';
        header('Location: administrar.php');
    }
    if ($conn->query($query)) {
        $_SESSION['message'] = 'Pelicula actualizado exitosamente' . $ruta;
        $_SESSION['message_type'] = 'warning';
        header('Location: moviesAdmin.php');
    } else {
        $_SESSION['message'] = 'Error al actualizar la pelicula';
        $_SESSION['message_type'] = 'danger';
        header('Location: moviesAdmin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="es">

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
<!--<body class="bg-image" style="background-image: url('../img/posters80.jpg'); background-repeat: no-repeat; background-size:cover;">-->

<body class="bg-image">
    <div class="container text center">
        <div class="p-1 m-3 bg-info rounded-3">
            <h2 style="text-align: center;">Actualizar Película</h2>
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="p-2 alert text center alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show"
                role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
        </div>
        <form action="moviesUpdate.php?id=<?php echo $pelicula['id_movie']; ?>" method="post"
            enctype="multipart/form-data" class="p-4 bg-white rounded needs-validation" novalidate>

            <input type="hidden" name="id_movie" value="<?php echo $pelicula['id_movie']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo $pelicula['nombre']; ?>">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion"
                    name="descripcion"><?php echo $pelicula['descripcion']; ?></textarea>
            </div>
            <div class="formulario__grupo mb-3" id="grupo__genero" form-group>
                <label for="genero" class="formulario__label">Género</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input form-control mb-2" name="genero" id="genero" required">
                        <option value="<?php echo $pelicula['genero']; ?>"><?php echo $pelicula['genero']; ?></option>
                        <option value="Comedia">Comedia</option>
                        <option value="Drama">Drama</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Terror">Terror</option>
                        <option value="Ciencia Ficción">Ciencia Ficción</option>
                        <option value="Documentales">Documentales</option>
                        <option value="Catastrofes">Catastrofes</option>
                        <option value="Accion">Acción</option>
                        <option value="Fantasia">Fantasía</option>
                        <option value="Musical">Musical</option>
                        <option value="Suspenso">Suspenso</option>
                    </select>
                    <div class="valid-feedback">Bien</div>
                    <div class="invalid-feedback">Es necesario seleccionar el genero de la pelicula</div>
                </div>

            </div>
            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input form-control mb-2" name="calificacion" id="calificacion" required>
                        <option value="<?php echo $pelicula['calificacion']; ?>">
                            <?php echo $pelicula['calificacion']; ?></option>
                        <option value="ATP">ATP</option>
                        <option value="13">13</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                    </select>
                    <div class="valid-feedback">Bien</div>
                    <div class="invalid-feedback">Es necesario seleccionar una calificación para la pelicula</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input form-control mb-2" name="anio" id="anio" required>
                        <option value="<?php echo $pelicula['año']; ?>"><?php echo $pelicula['año']; ?></option>
                        <?php for ($year = 1980; $year <= 2024; $year++) { ?>
                        <option value="<?php echo $year ?>"><?php echo $year ?></option>
                        <?php } ?>
                    </select>
                    <div class="valid-feedback">Bien</div>
                    <div class="invalid-feedback">Es necesario seleccionar el año de la pelicula</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director"
                    value="<?php echo $pelicula['director']; ?>">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                <?php if ($pelicula['imagen'] != '') { ?>
                <p>Imagen Actual <img src="<?php echo $pelicula['imagen'] ?>" alt="Imagen de la película" width="200">
                </p>
                <?php } ?>

            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Trailer</label>
                <input type="text" class="form-control" id="link" name="link" value="<?php echo $pelicula['link']; ?>">
            </div>
            <div class="mb-3" style="text-align: center;">
                <button type="button" class="btn btn-danger" onclick="location.href='moviesAdmin.php'">Cancelar</button>
                <button type="submit" class="btn btn-success" name="update">Actualizar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
</body>

</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>