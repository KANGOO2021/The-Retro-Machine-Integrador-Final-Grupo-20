<?php include("../db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Machine - Stock de Productos</title>

    <link rel="shortcut icon" href="../img/retro.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/retro.css">
    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>


</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark fixed-top d-flex nav-header" data-bs-theme="dark">
            <div class="container-fluid">

                <img class="rounded-circle logo-header" src="../img/logo4.png" alt="">
                <a class="navbar-brand title-header" href="#">THE RETRO MACHINE</a>

                <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active inicio" aria-current="page" href="../index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="administrar.php">Productos</a>
                        </li>
                        <li>
                            <a class="nav-link active" aria-current="page" href="../PeliculasCRUD/moviesAdmin.php">Películas</a>
                        </li>

                        <li>
                            <a class="nav-link active" aria-current="page" href="../dibujos.html">Dibujos</a>
                        </li>
                        <li>
                            <a class="nav-link active" aria-current="page" href="../VideojuegosCRUD/Administrar.php">Videojuegos</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container" style="margin-top: 120px; margin-bottom:30px;">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <h1 class="my-2">Listado de Productos</h1>

                <?php if (isset($_SESSION['message'])) { ?>
                <div class="p-2 alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert"
                    style="width: 400px;">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close pt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset(); } ?>


                <a class="btn btn-success" href="insert.php">Agregar Producto</a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3 table-bordered align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
          $query = "SELECT * FROM productos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>

                        <tr class="text-center">
                            <th scope="row">
                                <?php echo $row['id_productos']; ?>
                            </th>
                            <td>
                                <h6><?php echo $row['descripcion']; ?></h6>
                            </td>
                            <td><img src="<?php echo $row['imagen']; ?>" class="foto-listado" alt=""></td>
                            <td>
                                <?php echo $row['precio']; ?>
                            </td>
                            <td>
                                <?php echo $row['cantidad']; ?>
                            </td>
                            <td>
                                <a class="me-2" data-bs-toggle="modal"
                                    data-bs-target="#modal<?php echo $row['id_productos']?>"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></a>
                                <div class="modal fade" id="modal<?php echo $row['id_productos']?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content modal-eliminar">
                                            <div class="modal-header d-flex justify-content-center">
                                                <h5 class="modal-title">¿Seguro de eliminar el producto
                                                    con id <?php echo $row['id_productos']?>?</h5>
                                            </div>
                                            <div class="modal-footer  d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <a class="btn btn-danger"
                                                    href="delete.php?id=<?php echo $row['id_productos']?>">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="edit.php?id=<?php echo $row['id_productos']?>"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <div class="d-grid gap-2 col-sm-3 mx-auto mt-4 boton-inicio">
                <a class="btn btn-primary" href="../index.php">Volver al Inicio<a>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>