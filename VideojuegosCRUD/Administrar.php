<?php
session_start();
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
</head>

<body>
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
                    <td><?= $row['link_juego'] ?></td>
                    <td><img src="<?= $row['imagen'] ?>" alt="<?= $row['nombre'] ?>" style="max-width: 100px;"></td>
                    <td>
                        <a href="Create.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="Delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de eliminar este videojuego?')">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
