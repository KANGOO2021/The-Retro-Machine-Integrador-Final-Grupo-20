<?php
#session_start();
include("../db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $año_lanzamiento = $_POST['año_lanzamiento'];
    $link_juego = $_POST['link_juego'];
    $imagen = $_POST['imagen'];

    // Insertar en la base de datos
    $query = "INSERT INTO videojuegos (nombre, año_lanzamiento, link_juego, imagen) 
              VALUES ('$nombre', '$año_lanzamiento', '$link_juego', '$imagen')";
    
    if ($conn->query($query) === TRUE) {
        $_SESSION['message'] = 'Videojuego agregado correctamente.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al agregar el videojuego: ' . $conn->error;
        $_SESSION['message_type'] = 'danger';
    }

    header('Location: Administrar.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Videojuego</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Agregar Nuevo Videojuego</h1>
        <form action="Create.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="año_lanzamiento" class="form-label">Año de Lanzamiento</label>
                <input type="number" class="form-control" id="año_lanzamiento" name="año_lanzamiento" required>
            </div>
            <div class="mb-3">
                <label for="link_juego" class="form-label">Link de Juego</label>
                <input type="text" class="form-control" id="link_juego" name="link_juego" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">URL de Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Videojuego</button>
            <a href="Administrar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
