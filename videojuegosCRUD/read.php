<?php
include('db.php');
$query = "SELECT * FROM videojuegos";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Lista de Videojuegos</h2>
        <a href="create.php" class="btn btn-success">Agregar Videojuego</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Género</th>
                    <th>Calificación</th>
                    <th>Año</th>
                    <th>Director</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_videojuego']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['genero']; ?></td>
                    <td><?php echo $row['calificacion']; ?></td>
                    <td><?php echo $row['anio']; ?></td>
                    <td><?php echo $row['director']; ?></td>
                    <td><img src="<?php echo $row['imagen']; ?>" alt="Imagen de <?php echo $row['nombre']; ?>" width="100"></td>
                    <td>
                        <a href="update.php?editar=<?php echo $row['id_videojuego']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $row['id_videojuego']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
