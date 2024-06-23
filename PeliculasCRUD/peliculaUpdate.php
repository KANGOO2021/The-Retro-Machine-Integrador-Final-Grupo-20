<?php
include('../db.php');



if($_POST){
    $id = $_POST['id_movie'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $calificacion = $_POST['calificacion'];
    $year = $_POST['anio'];
    $director = $_POST['director'];
    $trailer = $_POST['link'];
    $imagen = $_FILES['imagen'];
    
    if (!empty($imagen)) {
        $imagen = $_FILES['imagen'];
        $imgType = $imagen['type'];
        $imgName = $imagen['name'];
        $tipoImagen = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
        $sizeImagen = $_FILES['imagen']['size'];
        $directorio = "../img/peliculas";
        $ruta = $directorio."/".uniqid().'.'.$tipoImagen;    
        
        // Obtener la ruta de la imagen antigua desde la base de datos
        $stmt = $conn->prepare('SELECT imagen FROM movies WHERE id_movie = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        if (is_array($row) && isset($row['imagen'])) {
            $old_image_path = '../img/peliculas/' . $row['imagen'];
        } else {
            // handle the error or default value
            $old_image_path = ''; // or some other default value
        }

        // Eliminar la imagen antigua
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        if ($tipoImagen=="jpeg" or $tipoImagen=="jpg" or $tipoImagen=="webp"){
            if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                $query = "UPDATE movies SET imagen=? WHERE id_movie=?";
                $stmt->close();
                $stmt = $conn->prepare($query);
                $stmt->bind_param("si", $ruta, $id);
                $stmt->execute();
                echo "<div class='alert alert-info'>Imagen guardada correctamente</div>";
            } else {
                echo "<div class='alert alert-info'>Error al guardar la imagen</div>";
            }
        }else{
            echo "<div class='alert alert-info'>No se acepta ese formato</div>";
        }
    }else {
        $imgContent = null;
        $imgType = null;
        $imgName = null;
        echo ('No se validó el campo');
    }

    if(empty($nombre) && empty($descripcion) && empty($director)){
        echo("Error al ingresar los datos");
    } else {
        $query = "UPDATE movies SET nombre=?, descripcion=?, genero=?, calificacion=?, año=?, director=?, link=? WHERE id_movie=?";
        $stmt->close();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nombre, $descripcion, $genero, $calificacion, $year, $director, $trailer, $id);
        $stmt->execute();
        if($stmt){header('Location: peliculasDetail.php');}
        else {echo("Error al actualizar la película");}
    }
    $stmt->close();
}

?>
