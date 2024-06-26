<?php
include('db.php');

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $query = "SELECT * FROM videojuegos WHERE id_videojuego='$id'";
    $resultado = $conn->query($query);
    $videojuego = $resultado->fetch_assoc();
} else {
    header('Location: read.php');
    exit;
}

if ($_POST) {
    $id = $_POST['id_videojuego'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $calificacion = $_POST['calificacion'];
    $year = $_POST['anio'];
    $director = $_POST['director'];
    $trailer = $_POST['link'];
    $imagen = $_FILES['imagen'];

    // Ruta de la imagen actual
    $currentImageQuery = "SELECT imagen FROM videojuegos WHERE id_videojuego = ?";
    $stmt = $conn->prepare($currentImageQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $currentImage = $result->fetch_assoc()['imagen'];
    
    // Actualización de los campos
    if ($imagen['name']) {
        $imgName = $imagen['name'];
        $imgType = $imagen['type'];
        $tmpName = $imagen['tmp_name'];
        $tipoImagen = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $directorio = "img/videojuegos";
        $ruta = $directorio . "/" . uniqid() . '.' . $tipoImagen;

        if ($tipoImagen == "jpeg" || $tipoImagen == "jpg" || $tipoImagen == "png" || $tipoImagen == "gif") {
            if (move_uploaded_file($tmpName, $ruta)) {
                // Eliminar la imagen anterior si se ha subido una nueva
                if (file_exists($currentImage)) {
                    unlink($currentImage);
                }
                $query = "UPDATE videojuegos SET nombre = ?, descripcion = ?, genero = ?, calificacion = ?, anio = ?, director = ?, link = ?, imagen = ? WHERE id_videojuego = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('sssissssi', $nombre, $descripcion, $genero, $calificacion, $year, $director, $trailer, $ruta, $id);
            }
        }
    } else {
        $query = "UPDATE videojuegos SET nombre = ?, descripcion = ?, genero = ?, calificacion = ?, anio = ?, director = ?, link = ? WHERE id_videojuego = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssisssi', $nombre, $descripcion, $genero, $calificacion, $year, $director, $trailer, $id);
    }

    if ($stmt->execute()) {
        header('Location: read.php');
        exit;
    } else {
        echo "Error al actualizar el videojuego.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Videojuego</title>
    <link rel="stylesheet" href="css/retro.css">
    <link rel="stylesheet" href="css/videojuegos.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark fixed-top d-flex nav-header" data-bs-theme="dark">
            <div class="container-fluid">
                <img class="rounded-circle logo-header" src="img/logo4.png" alt="">
                <a class="navbar-brand title-header" href="#">THE RETRO MACHINE</a>
                <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav m-3 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Agregar Videojuego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="read.php">Lista de Videojuegos</a>
                        </li>
                    </ul>
                </div>
                <form class="d-flex">
                    <input class="form-control m-2" type="search" placeholder="Tu Juego retro favorito"
                        aria-label="Search" id="search">
                    <a href="#" class="btn btn-success my-2" type="text">Buscar</a>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2 class="text-center my-5">Editar Videojuego</h2>
            <form action="update.php?editar=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_videojuego" value="<?php echo $videojuego['id_videojuego']; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $videojuego['nombre']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $videojuego['descripcion']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $videojuego['genero']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="calificacion" class="form-label">Calificación</label>
                    <input type="number" class="form-control" id="calificacion" name="calificacion" value="<?php echo $videojuego['calificacion']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="anio" class="form-label">Año</label>
                    <input type="number" class="form-control" id="anio" name="anio" value="<?php echo $videojuego['anio']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="director" class="form-label">Director</label>
                    <input type="text" class="form-control" id="director" name="director" value="<?php echo $videojuego['director']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link del trailer</label>
                    <input type="url" class="form-control" id="link" name="link" value="<?php echo $videojuego['link']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                    <img src="<?php echo $videojuego['imagen']; ?>" alt="Imagen actual" class="img-thumbnail mt-3" style="width: 200px;">
                </div>
                <button type="submit" class="btn btn-success">Actualizar Videojuego</button>
            </form>
        </div>
    </main>
</body>

</html>
