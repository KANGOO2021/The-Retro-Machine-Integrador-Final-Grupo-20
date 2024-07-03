<?php include("../db.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
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

<body class="bg-image"
    style="background-image: url('../img/posters80.jpg'); background-repeat: no-repeat; background-size:cover;">
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
                    <div class="bg-info rounded-3 text center">
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
            <div class="table-wrapper">
                <table class="table table-primary">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Género</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Año</th>
                            <th scope="col">Director</th>
                            <th scope="col">Imagen</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
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
                            echo "<td><a href='moviesUpdate.php?editar=" . $dato['id_movie'] . "' class='btn btn-warning' >Editar</a></td>";
                            echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#" . $dato['id_movie'] . "' >Eliminar</button>
                                        
                            <!-- MODAL  -->
                            <div class='modal fade' id='" . $dato['id_movie'] . "' data-bs-backdrop='static' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-sm modal-dialog-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Eliminar Pelicula</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'  aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <div style='text-align:center'>
                                                <a>¿Desea eliminar la pelicula</a>
                                                <a><b>" . $dato['nombre'] . "</b></a>
                                                <a>?</a>
                                            </div>
                                        </div>
                                        <div class='modal-footer'>
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
        </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </script>
</body>

</html>