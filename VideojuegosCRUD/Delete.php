<?php
#session_start();
include("../db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el videojuego de la base de datos
    $query = "DELETE FROM videojuegos WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        $_SESSION['message'] = 'Videojuego eliminado correctamente.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al eliminar el videojuego: ' . $conn->error;
        $_SESSION['message_type'] = 'danger';
    }

    header('Location: Administrar.php');
    exit();
} else {
    header('Location: Administrar.php');
    exit();
}
?>
