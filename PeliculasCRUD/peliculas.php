<?php

include('../db.php');


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM movies WHERE id_movie=$id";

    if ($conn->query($sql) === TRUE) {
        header("peliculasDetail: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas Retro</title>
    <link rel="shortcut icon" href="../img/retro.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/retro.css">
    <link rel="stylesheet" href="../css/peliculas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark fixed-top d-flex nav-header" data-bs-theme="dark">
            <div class="container-fluid">

                <img class="rounded-circle logo-header" src="img/logo4.png" alt="">
                <a class="navbar-brand title-header" href="#">THE RETRO MACHINE</a>

                <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav m-3 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
                        </li>

                    </ul>
                </div>
                <form class="d-flex">
                    <input class="form-control m-2" type="search" placeholder="Tu película retro favorita" aria-label="Search" id="search">
                    <a href="#" class="btn btn-success my-2" type="text">Buscar</a>
                </form>
            </div>
        </nav>

    </header>
    <main>
        <div class="peliculas-main d-flex flex-wrap justify-content-center" id="peliculas-main">
        <?php $pelis= $conn->query("SELECT * FROM movies"); 
                            $datos = $pelis->fetch_all(MYSQLI_ASSOC);
                            foreach ($datos as $dato){ ?>
            <div class="card text-center title" style="width:17rem;">
                <img class="card-img-top card-img" src='<?php echo $dato['imagen'];?>' alt="Card image cap">

                <div class="card-body">
                    <p class="card-title"><b><?php echo $dato['nombre'];?></b></p>
                    <span class="card-text m-2"><?php echo $dato['año'];?></span>
                    <a href="<?php echo $dato['link'];?>" target="_blank"
                        class="btn btn-secondary trailer">Ver trailer</a>
                </div>
            </div>
            
        <?php }   ?>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="../js/buscador.js"></script>
    
</body>

</html>