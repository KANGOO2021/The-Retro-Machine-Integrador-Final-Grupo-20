<?php

include('../db.php');

if (isset($_POST['insert-product'])) {

    $descripcion = $_POST['txtDescripcion'];
    $precio = $_POST['txtPrecio'];
    $cantidad = $_POST['txtStock'];

    $imagen = $_FILES['txtImagen']["tmp_name"];
    $nombreImagen = $_FILES['txtImagen']["name"];
    $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
    //$sizeImagen = $_FILES['txtImagen']["size"];
    $directorio = "../img/Productos/Producto";


    if ($tipoImagen == "jpg" or $tipoImagen == "jpeg" or $tipoImagen == "png" or $tipoImagen == "webp") {

        $query = "INSERT INTO productos (descripcion, precio, cantidad, imagen) VALUES ('$descripcion', '$precio','$cantidad', '')";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed.");
        }

        $idRegistro = $conn->insert_id;
        $ruta = $directorio . $idRegistro . "." . $tipoImagen;

        $actualizarImagen = $conn->query("update productos set imagen='$ruta' where id_productos=$idRegistro");

        if (move_uploaded_file($imagen, $ruta)) {
            $_SESSION['message'] = 'Producto agregado exitosamente';
            $_SESSION['message_type'] = 'success';
            header('Location: administrar.php');
        } else {
            $_SESSION['message'] = 'Error al agregar producto';
            $_SESSION['message_type'] = 'danger';
            header('Location: administrar.php');
        }
    } else {
        $_SESSION['message'] = 'No se acepta ese formato de imagen';
        $_SESSION['message_type'] = 'danger';
    } ?>

<script>
history.replaceState(null, null, location.pathname)
</script>


<?php }

?>


<!DOCTYPE html<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Machine - Nuevo Producto</title>

    <link rel="shortcut icon" href="img/retro.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/portada/favicon.png" type="image/x-icon">

</head>

<body style="background-image: url('../img/he-man-and-the-masters-of-the-universe.png'); 
	background-repeat: no-repeat; background-size: cover;">


    <div class="container mt-3 bg-white p-3 rounded col-sm-8 col-lg-6 col-xl-5">
        <h2 class="text-center mb-4">Nuevo Producto</h2>
        <?php if (isset($_SESSION['message'])) { ?>
        <div class="p-2 alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <form action="insert.php" method="POST" class="formContact" enctype="multipart/form-data">

            <div class="mb-3" form-group>
                <label>Imagen</label>
                <input type="file" class="form-control" name="txtImagen" id="imagen" style="width: 100%" required>

            </div>

            <div class="mb-3" form-group>
                <label>Descripción</label> <input type="text" class="form-control" name="txtDescripcion"
                    placeholder="Ingrese la descripción" required>
            </div>

            <div class="mb-3" form-group>
                <label>Precio</label> <input type="text" class="form-control" name="txtPrecio"
                    placeholder="Ingrese el precio" required>
            </div>

            <div class="mb-3" form-group>
                <label>Cantidad</label> <input type="text" class="form-control" name="txtStock"
                    placeholder="Ingrese la cantidad" required>
            </div>


            <div class="text-center" form-group>
                <input class="btn btn-success" type="submit" name="insert-product" value="Agregar producto">
            </div>
        </form>


        <h5 class="text-center mt-4">
            <a class="text-black" href="administrar.php">Volver al Stock</a>
        </h5>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>