<?php
    
    include('../db.php');
 
if (isset($_POST['insert-product'])) {
 
  $descripcion = $_POST['txtDescripcion'];
  $precio = $_POST['txtPrecio'];
  $cantidad = $_POST['txtStock'];
  $imagen = $_POST['txtImagen'];

      

  $query = "INSERT INTO productos (descripcion, precio, cantidad, imagen) VALUES ('$descripcion', '$precio','$cantidad', '$imagen')";
  
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto agregado exitosamente';
  $_SESSION['message_type'] = 'success';
  header('Location: administrar.php');

}
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


    <div class=" container mt-3 bg-white p-3 rounded col-sm-8 col-lg-6 col-xl-5">
        <h2 class="text-center mb-4">Nuevo Producto</h2>

        <form action="insert.php" method="POST" class="formContact">

            <div class="mb-3" form-group>
                <label>Imagen</label>
                <div class="d-flex flex-sm-row flex-column justify-content-between align-items-center mb-1">
                    <input type="file" class="form-control" id="imagen" style="width: 100%" required>
                    <button class="btn btn-success" type="button" id="boton" style="width: 100%">Agregar
                        imagen</button>
                </div class="mt-1">
                <input type=" text" class="form-control" name="txtImagen" placeholder="Espere url de la imagen"
                    id=up-img required>

                <div class="progress mt-1">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="progress-bar"></div>
                </div>
                <!-- <div><progress id="progress-bar" max="100" value="0" style="width: 100%"></progress></div> -->

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


    <script type="module" src="../js/uploadImages.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>