<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la ruta de la imagen
    $query = "SELECT imagen FROM videojuegos WHERE id_videojuego = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $imagen = $row['imagen'];

    // Eliminar el videojuego de la base de datos
    $query = "DELETE FROM videojuegos WHERE id_videojuego = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Eliminar la imagen del servidor
        if (file_exists($imagen)) {
            unlink($imagen);
        }
        header("Location: read.php");
    } else {
        echo "Error al eliminar el videojuego.";
    }
} else {
    header("Location: read.php");
}
?>
