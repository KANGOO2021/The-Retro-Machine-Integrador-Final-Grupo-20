<?php
#session_start();
include("../db.php");

// Verificar conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener todos los videojuegos
$query = "SELECT id, nombre, año_lanzamiento, link_juego, imagen FROM videojuegos";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Videojuegos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/retro.css">
    <link rel="stylesheet" href="../css/videojuegos.css">
    <link rel="stylesheet" href="../css/moviesAdmin.css">
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark fixed-top d-flex nav-header" data-bs-theme="dark">
            <div class="container-fluid">

                <img class="rounded-circle logo-header" src="../img/logo4.png" alt="">
                <a class="navbar-brand title-header" href="#">THE RETRO MACHINE</a>

                <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active inicio" aria-current="page" href="../index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../ProductosCRUD/administrar.php">Productos</a>
                        </li>
                        <li>
                            <a class="nav-link active" aria-current="page" href="../PeliculasCRUD/moviesAdmin.php">Películas</a>
                        </li>

                        <li>
                            <a class="nav-link active" aria-current="page" href="../dibujos.html">Dibujos</a>
                        </li>
                        <li>
                            <a class="nav-link active" aria-current="page" href="../VideojuegosCRUD/Administrar.php">Videojuegos</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
    <div class="container">
        <h1 class="my-4">Administrar Videojuegos</h1>

        <!-- Mensaje de sesión -->
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            session_unset();
            endif;
        ?>

        <!-- Botón para agregar nuevo videojuego -->
        <a href="Create.php" class="btn btn-success my-2">Agregar Nuevo Videojuego</a>

        <!-- Tabla de videojuegos -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Año de Lanzamiento</th>
                    <th>Link de Juego</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['año_lanzamiento'] ?></td>
                    <td><a href="<?= $row['link_juego'] ?>" class='btn btn-success'>Link del Juego</a></td>
                    <td><img src="<?= $row['imagen'] ?>" alt="<?= $row['nombre'] ?>" style="max-width: 100px;"></td>
                    <td>
                        <a href="Update.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="Delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de eliminar este videojuego?')">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </main>
</body>

</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
