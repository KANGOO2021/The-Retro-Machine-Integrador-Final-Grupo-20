<?php
include('../db.php');


if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['crearPelicula'])) {
    $name = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $genero = trim($_POST['genero']);
    $calificacion = trim($_POST['calificacion']);
    $anio = trim($_POST['anio']);
    $director = trim($_POST['director']);
    $link = trim($_POST['link']);
    //$imagen = trim($_POST['imagen']);
    //echo ("la ruta de la imagen s: $imagen");
    //$imagen2 = $_FILES["imagen"]["name"];
    // Validar carga de archivo
    if (!empty($_FILES['imagen'])) {
        $imagen = $_FILES['imagen'];
        $imgContent = file_get_contents($imagen['tmp_name']);
        
        $imgType = $imagen['type'];
        $imgName = $imagen['name'];
        $tipoImagen = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
        $sizeImagen = $_FILES['imagen']['size'];
        $directorio = "../img/peliculas";
        $ruta = $directorio."/".uniqid().'.'.$tipoImagen; // Generar un nombre único para la imagen
    
    // Mover la imagen desde el directorio temporal a la ruta deseada
       
        echo "<div class='alert alert-info'>type : $imgType</div>";
        echo "<div class='alert alert-info'>nombre : $imgName</div>";
        echo "<div class='alert alert-info'>Tipo : $tipoImagen</div>";
        echo "<div class='alert alert-info'>Tamaño : $sizeImagen bytes</div>";

        if ($tipoImagen=="jpeg" or $tipoImagen=="jpg" or $tipoImagen=="webp"){
            if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                echo "<div class='alert alert-info'>Imagen guardada correctamente</div>";
            } else {
                echo "<div class='alert alert-info'>Error al guardar la imagen</div>";
            }
        }else{
            echo "<div class='alert alert-info'>No se acepta ese formato</div>";
        }
    } else {
        $imgContent = null;
        $imgType = null;
        $imgName = null;
        echo ('No se validó el campo');
    }
    
    // Preparar consulta SQL con consultas parametrizadas
    $stmt = $conn->prepare("INSERT INTO movies (nombre, descripcion, genero, calificacion, año, director, imagen, link) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $name, $descripcion, $genero, $calificacion, $anio, $director, $ruta, $link);
 
    // Ejecutar consulta SQL
    if ($stmt->execute()) {
        echo '<h3>Pelicula Creada con exito!</h3>';
        header('Location: peliculasDetail.php');
    } else {
        echo '<h3>Upss! hubo un error!</h3>';
        echo $stmt->error;
    }

    $stmt->close();
}else{
    echo('ups !!');
}


?>