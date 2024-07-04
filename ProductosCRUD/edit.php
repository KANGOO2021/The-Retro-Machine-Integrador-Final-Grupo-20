<?php
include("../db.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id_productos=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
    }
}


if (isset($_POST['update'])) {

    $id = $_GET['id'];
    $nombre = $_POST['nombre'];

    $descripcion = $_POST['txtDescripcion'];
    $precio = $_POST['txtPrecio'];
    $cantidad = $_POST['txtStock'];

    $imagen = $_FILES['txtImagen']["tmp_name"];
    $nombreImagen = $_FILES['txtImagen']["name"];
    $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
    //$sizeImagen = $_FILES['txtImagen']["size"];
    $directorio = "../img/Productos/Producto";



    if ($tipoImagen == "jpg" or $tipoImagen == "jpeg" or $tipoImagen == "png" or $tipoImagen == "webp") {

        try {
            unlink($nombre);
        } catch (\Throwable $th) {
            //throw $th;
        }

        $ruta = $directorio . $id . "." . $tipoImagen;

        $query = "UPDATE productos set descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', imagen = '$ruta' WHERE id_productos=$id";
        mysqli_query($conn, $query);

        if (move_uploaded_file($imagen, $ruta)) {

            $_SESSION['message'] = 'Producto actualizado exitosamente';
            $_SESSION['message_type'] = 'warning';
            header('Location: administrar.php');
        } else {
            $_SESSION['message'] = 'Error al actualizar producto';
            $_SESSION['message_type'] = 'danger';
            header('Location: administrar.php');
        }
    } else {
        $_SESSION['message'] = 'No se acepta ese formato de imagen';
        $_SESSION['message_type'] = 'danger';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Machine - Editar</title>

    <link rel="shortcut icon" href="../img/logo4.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>

</head>

<body class="bg-image" style="background-image: url('../img/posters80.jpg');
 	background-repeat: no-repeat; background-size: cover;">

    <div class="container mt-1 bg-white p-3 rounded col-sm-8 col-lg-6 col-xl-5">
        <h2 class="text-center mb-2">Editar Producto</h2>
        <?php if (isset($_SESSION['message'])) { ?>
        <div class="p-2 alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <form action="edit.php?id=<?php echo $_GET['id']; ?>" class="formContact" enctype="multipart/form-data"
            method="POST">

            <div class="mb-0" form-group>
                <label>Imagen</label>
                <div class="d-flex flex-sm-row flex-column justify-content-between align-items-center mb-1">
                    <input type="file" class="form-control" name="txtImagen" id="imagen" style="width: 100%" required>
                </div>
                <input type="hidden" class="form-control" name="nombre" value="<?php echo $row['imagen']; ?>" id=up-img>
            </div>

            <div class="mb-3" form-group>
                <label>Id del producto</label> <input type="text" class="form-control" name="cod"
                    value="<?php echo $row['id_productos']; ?>" readonly="readonly">
            </div>

            <div class="mb-3" form-group>
                <label>Descripción</label> <input type="text" class="form-control" name="txtDescripcion"
                    value="<?php echo $row['descripcion']; ?>" required>
            </div>

            <div class="mb-3" form-group>
                <label>Precio</label> <input type="text" class="form-control" name="txtPrecio"
                    value="<?php echo $row['precio']; ?>" required>
            </div>

            <div class="mb-3" form-group>
                <label>Cantidad</label> <input type="text" class="form-control" name="txtStock"
                    value="<?php echo $row['cantidad']; ?>" required>
            </div>

            <div class="text-center" form-group>
                <input class="btn btn-warning" type="submit" name="update" value="Editar producto">
            </div>
        </form>


        <h5 class="text-center mt-3">
            <a class="text-black" href="administrar.php">Volver al Stock</a>
        </h5>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>