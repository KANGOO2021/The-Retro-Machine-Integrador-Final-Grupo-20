
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $calificacion = $_POST['calificacion'];
    $year = $_POST['anio'];
    $director = $_POST['director'];
    $trailer = $_POST['link'];
    $imagen = $_FILES['imagen'];

    if ($imagen) {
        $imgName = $imagen['name'];
        $imgType = $imagen['type'];
        $tmpName = $imagen['tmp_name'];
        $tipoImagen = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $directorio = "img/videojuegos";
        $ruta = $directorio . "/" . uniqid() . '.' . $tipoImagen;

        if ($tipoImagen == "jpeg" || $tipoImagen == "jpg" || $tipoImagen == "png" || $tipoImagen == "gif") {
            if (move_uploaded_file($tmpName, $ruta)) {
                $query = "INSERT INTO videojuegos (nombre, descripcion, genero, calificacion, anio, director, link, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssisss", $nombre, $descripcion, $genero, $calificacion, $year, $director, $trailer, $ruta);
                $stmt->execute();

                if ($stmt) {
                    header('Location: read.php');
                } else {
                    echo "Error al insertar el videojuego.";
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "Formato de imagen no soportado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Videojuego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Agregar Videojuego</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" id="genero" name="genero" required>
            </div>
            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación</label>
                <input type="text" class="form-control" id="calificacion" name="calificacion" required>
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año</label>
                <input type="number" class="form-control" id="anio" name="anio" required>
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Trailer</label>
                <input type="text" class="form-control" id="link" name="link">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
