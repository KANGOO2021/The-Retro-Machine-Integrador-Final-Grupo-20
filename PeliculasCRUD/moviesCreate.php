<?php
include('../db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crearPelicula'])) {
    $name = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $genero = trim($_POST['genero']);
    $calificacion = trim($_POST['calificacion']);
    $anio = trim($_POST['anio']);
    $director = trim($_POST['director']);
    $link = trim($_POST['link']);


    if (!empty($_FILES['imagen'])) {
        $imagen = $_FILES['imagen'];
        $imgContent = file_get_contents($imagen['tmp_name']);

        $imgType = $imagen['type'];
        $imgName = $imagen['name'];
        $tipoImagen = strtolower(pathinfo($imgName, PATHINFO_EXTENSION)); // tipo de imagen
        //$sizeImagen = $_FILES['imagen']['size']; tamaño del archivo no lo usamos por ahora
        $directorio = "../img/peliculas/movie";

        $query = "SELECT id_movie FROM movies ORDER BY id_movie DESC LIMIT 1";
        $idRegistro = $conn->query($query);
        $idPeli = $idRegistro->fetch_assoc();
        $idPeli = $idPeli['id_movie'] + 1;
        $ruta = $directorio . $idPeli . "." . $tipoImagen;

        // Mover la imagen desde el directorio temporal a la ruta deseada

        if ($tipoImagen == "jpeg" or $tipoImagen == "jpg" or $tipoImagen == "webp") {
            if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                echo "<div class='alert alert-info'>Imagen guardada correctamente</div>";
            } else {
                echo "<div class='alert alert-info'>Error al guardar la imagen</div>";
            }
        } else {
            echo "<div class='alert alert-info'>No se acepta ese formato</div>";
        }
    } else {
        $imgContent = null;
        $imgType = null;
        $imgName = null;
        echo ('No se validó el campo');
    }

    // Preparar consulta SQL con consultas parametrizadas
    $stmt = $conn->prepare("INSERT INTO movies (nombre, descripcion, genero, calificacion, año, director, imagen, link) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $name, $descripcion, $genero, $calificacion, $anio, $director, $ruta, $link);

    // Ejecutar consulta SQL
    if ($stmt->execute()) {
        $_SESSION['message'] = 'Pelicula Creada con exito!';
        $_SESSION['message_type'] = 'success';
        header('Location: moviesAdmin.php');
    } else {
        echo $stmt->error;
        $_SESSION['message'] = 'Ups hubo un error! echo $stmt->error';
        $_SESSION['message_type'] = 'warning';
        header('Location: moviesAdmin.php');
    }

    $stmt->close();
} else {
    echo ('ups !!');
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar Película</title>.
    <link rel="shortcut icon" href="../img/logo4.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/submit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>
</head>

<body class="bg-image"
    style="background-image: url('../img/posters80.jpg'); background-repeat: no-repeat; background-size:cover;">


    <div class="container col-md-5 mt-5 bg-white py-3 rounded">
        <h2 class="text-center mb-4">Ingresar Película</h2>

        <div class="d-flex justify-content-center">

            <form method="post" action="moviesCreate.php" enctype="multipart/form-data" 80%;" class="needs-validation"
                novalidate>


                <!-- Grupo: Nombre -->
                <div class="formulario__grupo mb-3" id="grupo__nombre" form-group>
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId"
                            placeholder="" required />
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario poner el nombre de la pelicula</div>
                    </div>
                </div>
                <!-- Grupo: Descripción -->
                <div class="formulario__grupo mb-3" id="grupo__descripcion" form-group>
                    <label for="descripcion" class="formulario__label">Descripción</label>
                    <div class="formulario__grupo-input">
                        <textarea class="formulario__input form-control mb-2" name="descripcion" id="descripcion"
                            placeholder="Ingrese la descripción de la película" required></textarea>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario una descripcion de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">La descripción debe tener al menos 10 caracteres.</p>
                </div>

                <!-- Grupo: Género -->

                <div class="formulario__grupo mb-3" id="grupo__genero" form-group>
                    <label for="genero" class="formulario__label">Género</label>
                    <div class="formulario__grupo-input">
                        <select class="formulario__input form-control mb-2" name="genero" id="genero" required>
                            <option value="">Seleccione un género</option>
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
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario seleccionar el genero de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">Seleccione un género válido.</p>
                </div>

                <!-- Grupo: Calificación -->
                <div class="formulario__grupo mb-3" id="grupo__calificacion" form-group>
                    <label for="calificacion" class="formulario__label">Calificación</label>
                    <div class="formulario__grupo-input">
                        <select class="formulario__input form-control mb-2" name="calificacion" id="calificacion"
                            required>
                            <option value="">Seleccione un calificación</option>
                            <option value="ATP">ATP</option>
                            <option value="13">13</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario seleccionar una calificación para la pelicula</div>
                    </div>
                </div>

                <!-- Grupo: Año -->
                <div class="formulario__grupo mb-3" id="grupo__anio" form-group>
                    <label for="anio" class="formulario__label">Año</label>
                    <div class="formulario__grupo-input">
                        <select class="formulario__input form-control mb-2" name="anio" id="anio" required>
                            <option value="">Seleccione un año</option>
                            <?php for ($year = 1980; $year <= 2024; $year++) { ?>
                            <option value="<?php echo $year ?>"><?php echo $year ?></option>
                            <?php } ?>
                        </select>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario seleccionar el año de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">El año debe ser un número válido.</p>
                </div>

                <!-- Grupo: Director -->
                <div class="formulario__grupo mb-3" id="grupo__director" form-group>
                    <label for="director" class="formulario__label">Director</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input form-control mb-2" name="director" id="director"
                            placeholder="Ingrese el director de la película" required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario poner el nombre del director de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">El director solo puede contener letras y espacios.</p>

                </div>

                <div class="formulario__grupo mb-3" id="grupo__imagen" form-group>
                    <label for="imagen" class="formulario__label">Imagen</label>
                    <div class="formulario__grupo-input">
                        <input type="file" class="formulario__input form-control mb-2" name="imagen" id="imagen"
                            required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario ingresar la imagen de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">--</p>
                </div>

                <div class="formulario__grupo mb-3" id="grupo__link" form-group>
                    <label for="link" class="formulario__label">Link del Trailer</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input form-control mb-2" name="link" id="link"
                            placeholder="Ingrese el link del trailer de la pelicula" required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario ingresar el link del trailer de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">--</p>
                </div>

                <div class="text-center mt-3" form-group>
                    <button type="submit" class="btn btn-success mb-3" style="width: 100%;"
                        name="crearPelicula">Enviar</button>
                    <button type="button" class="btn btn-danger"
                        onclick="location.href='moviesAdmin.php'">Cancelar</button>
                </div>
            </form>
        </div>
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