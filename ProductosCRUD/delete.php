<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM productos WHERE id_productos = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: administrar.php');
}

?>