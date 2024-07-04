<?php include("../db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo4.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/moviesAdmin.css">
    <link rel="stylesheet" href="../css/retro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>

</head>

<!--<body class="bg-image" style="background-image: url('../img/posters80.jpg'); background-repeat: no-repeat; background-size:cover;">-->

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
                            <a class="nav-link active" aria-current="page"
                                href="../ProductosCRUD/administrar.php">Productos</a>
                        </li>
                        <li>
                            <a class="nav-link active" aria-current="page"
                                href="../PeliculasCRUD/peliculasDetail.php">Películas</a>
                        </li>

                        <li>
                            <a class="nav-link active" aria-current="page"
                                href="../VideojuegosCRUD/Administrar.php">Videojuegos</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="encabezado">
            <div class="container text center">
                <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                    <div class="rounded-3 text center">
                        <h2 style="text-align: center;">LISTADO DE PELICULAS</h2>
                    </div>
                    <?php if (isset($_SESSION['message'])) { ?>
                    <div class="p-2 alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show mx-auto"
                        role="alert" style="width: 400px;">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close pt-1" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                    <?php session_unset();
                    } ?>

                    <a href="moviesCreate.php" class="m-2 btn btn-success">Agregar película</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">



            <table class="table mt-3 table-bordered">

                <thead>

                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Género</th>
                        <th scope="col">Calificación</th>
                        <th scope="col">Año</th>
                        <th scope="col">Director</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Trailer</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $pelis = $conn->query("SELECT * FROM movies");
                    $datos = $pelis->fetch_all(MYSQLI_ASSOC);
                    foreach ($datos as $dato) { ?>
                    <tr>
                        <?php
                        echo "<td><b>" . $dato['id_movie'] . "</b></td>";
                        echo "<td><b>" . $dato['nombre'] . "</b></td>";
                        echo "<td>" . $dato['descripcion'] . "</td>";
                        echo "<td>" . $dato['genero'] . "</td>";
                        echo "<td>" . $dato['calificacion'] . "</td>";
                        echo "<td>" . $dato['año'] . "</td>";
                        echo "<td>" . $dato['director'] . "</td>";
                        echo "<td><img src='" . $dato['imagen'] . "' alt='No hay imgen' style='width:150px'></td>";
                        echo "<td><a href=" . $dato['link'] . " class='btn btn-success' target='_blank'>Trailer</a></td>";
                        echo "<td>  <div class='d-sm-flex justify-content-sm-between align-items-sm-center'>
                                            <div style='display: inline-block; margin: 0 10px;'><a data-bs-toggle='modal' data-bs-target='#" . $dato['id_movie'] . "' ><svg
                                                        xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red'
                                                        class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                                        <path
                                                            d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z' />
                                                    </svg></a></div>
                                            <div style='display: inline-block; margin: 0 10px;'><a href='moviesUpdate.php?editar=" . $dato['id_movie'] . "' ><svg
                                                        xmlns='http://www.w3.org/2000/svg' width='20px' height='20px'
                                                        fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                                        <path
                                                            d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z' />
                                                    </svg></a></div>
                                                    
                                        </div>
                            <!-- MODAL  -->
                            <div class='modal fade' id='" . $dato['id_movie'] . "' data-bs-backdrop='static' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-sm modal-dialog-centered'>
                                    <div class='modal-content modal-eliminar2'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Eliminar Pelicula</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'  aria-label='Close'>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <div style='text-align:center'>
                                                <a>¿Desea eliminar la pelicula</a>
                                                <a><b>" . $dato['nombre'] . "</b></a>
                                                <a>?</a>
                                            </div>
                                        </div>
                                        <div class='modal-footer d-flex justify-content-center'>
                                            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>
                                            <a href='moviesDelete.php?delete=" . $dato['id_movie'] . " ' class='btn btn-success' data-toggle='modal' name='eliminar'>Eliminar</a></td>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>";
                    }
                        ?>
                    </tr>

                </tbody>
            </table>

        </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </script>
</body>

</html>