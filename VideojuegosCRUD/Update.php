<?php
#session_start();
include("../db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del videojuego
    $query = "SELECT * FROM videojuegos WHERE id = $id";
    $result = $conn->query($query);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $año_lanzamiento = $row['año_lanzamiento'];
        $link_juego = $row['link_juego'];
        $imagen = $row['imagen'];
        
    } else {
        $_SESSION['message'] = 'Videojuego no encontrado.';
        $_SESSION['message_type'] = 'danger';
        header('Location: Administrar.php');
        exit();
    }
} else {
    header('Location: Administrar.php');
    exit();
}

// Actualizar en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario{}

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $año_lanzamiento = $_POST['año_lanzamiento'];
    $link_juego = $_POST['link_juego'];
    
    $imagen = $_FILES['imagen']["tmp_name"];
    $nombreImagen = $_FILES['imagen']["name"];
    $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
    $directorio = "../img/Videojuegos/videojuego";
   
    if (!empty($imagen)) {
        if ($tipoImagen == "jpg" or $tipoImagen == "jpeg" or $tipoImagen == "png" or $tipoImagen == "webp") {
    /*
            try { unlink($nombre);
            } catch (\Throwable $th) { //throw $th;}
    */
            $ruta = $directorio.$id.".".$tipoImagen;
        
            $query = "UPDATE videojuegos SET nombre='$nombre', año_lanzamiento='$año_lanzamiento', link_juego='$link_juego', imagen='$ruta' WHERE id=$id";        
            
        } else {
            $_SESSION['message'] = 'No se acepta ese formato de imagen';
            $_SESSION['message_type'] = 'danger';
        } 
    } else {
        $query = "UPDATE videojuegos SET nombre='$nombre', año_lanzamiento='$año_lanzamiento', link_juego='$link_juego' WHERE id=$id";
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
        $_SESSION['message'] = 'Videojuego actualizado exitosamente';
        $_SESSION['message_type'] = 'warning';
        header('Location: administrar.php');
    } else {
        $_SESSION['message'] = 'Error al actualizar videojuego';
        $_SESSION['message_type'] = 'danger';
        header('Location: administrar.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Videojuego</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Editar Videojuego</h1>
        <form action="Update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre ?>" required>
            </div>
            <div class="mb-3">
                <label for="año_lanzamiento" class="form-label">Año de Lanzamiento</label>
                <input type="number" class="form-control" id="año_lanzamiento" name="año_lanzamiento"
                    value="<?= $año_lanzamiento ?>" required>
            </div>
            <div class="mb-3">
                <label for="link_juego" class="form-label">Link de Juego</label>
                <input type="text" class="form-control" id="link_juego" name="link_juego" value="<?= $link_juego ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">URL de Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" value="<?= $imagen ?>">
                <?php  if($imagen != ''){ ?>
                    <p>Imagen Actual <img src="<?=$imagen ?>" alt="Imagen del videojuego" width="200"></p>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Videojuego</button>
            <a href="Administrar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
