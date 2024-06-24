<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Retro Machine</title>
    <link rel="shortcut icon" href="img/retro.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/retro.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <ul class="navbar-nav ">
                        <li class="nav-item"><a class="nav-link active btn-lg ms-2 boton-api" aria-current="page"
                                href="tmdb.html">API</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active inicio" aria-current="page" href="peliculas.php">Peliculas</a>
                        </li>
                        <li>
                            <a class="nav-link active inicio" aria-current="page" href="dibujos.html">Dibujos</a>
                        </li>
                        <li>
                            <a class="nav-link active inicio" aria-current="page"
                                href="videojuegos.html">Videojuegos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active text-black btn-lg ms-2 color-login"
                                aria-current="page" href="login.html">Login</a>
                        </li>
                        <li class="ms-3">
                            <a class="btn btn-danger" href="ProductosCRUD/administrar.php" role="button">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-out"
            data-aos-duration="800">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/foto2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/foto3.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/foto7.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Productos-->

        <div class="alert container position-sticky top-0 alert-primary hide" role="alert">
            <strong>Producto añadido exitosamente!</strong>
        </div>


        <div class="alert container position-sticky top-0 alert-danger remove" role="alert">
            <strong>Producto removido exitosamente!</strong>
        </div>


        <ul class="nav nav-pills d-flex justify-content-center mt-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true"
                    style="color: black; background-color: white;">
                    <h1 class="productos-titulo">Nuestros productos</h1>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link mt-2" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false" style="color: black; background-color: white;">
                    <i id="carrito" class="fa-solid fa-cart-shopping fa-xl" style="color: #e4dc07;"></i>
                    <span id="cuenta-carrito"
                        class="position-absolute top-25 start-75 translate-middle badge rounded-pill bg-danger count-product">0</span>
                    <h2 class="d-inline mi_carrito ">Mi Carrito</h2>
                </button>
            </li>

            <!--  <li class="mt-2 ms-4">
                <a class="btn btn-danger" href="administrar.php" role="button">Panel Administrador</a>
            </li> -->

        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">

                <div class="index-main" id="index-main" data-aos="fade-up" data-aos-duration="1000">

                    <!--  <h1 class="productos-titulo">Colecciona nuestros productos:</h1> -->

                    <div class="d-flex flex-wrap justify-content-center gap-4">

                        <?php
          $query = "SELECT * FROM productos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>

                        <div class="card text-center title" style="width:17rem;">

                            <img class="card-img-top card-img" src="<?php echo $row['imagen']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-title"><b>
                                        <?php echo $row['descripcion']; ?>
                                    </b></p>
                                <p class="card-price m-2">$<span class="precio">
                                        <?php echo $row['precio']; ?>
                                    </span></p>
                                <button class="btn btn-warning trailer button"
                                    data-id="<?php echo $row['id_productos']; ?>">Añadir al Carrito</button>
                            </div>
                        </div>

                        <?php } ?>


                    </div>
                </div>
            </div>

            <div class="tab-pane fade carrito" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="carrito-productos">
                    <span>Su carrito está vació. Ir a Nuestros Productos!</span>
                </div>

                <div class="carrito-vacio">
                    <table class="table table-dark table-hover container">
                        <thead>
                            <tr class="text-primary">
                                <th scope="col">Id</th>
                                <th scope="col">Productos</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">



                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="itemCartTotal text-black">Total: 0</h3>
                        </div>
                        <div>
                            <button class="btn btn-success" onclick="comprar()">COMPRAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark-subtle mt-5 py-2">
        <div class="container-fluid text-center footer">
            <div class="row mx-md-5">
                <div class="col-sm-3 text-sm-start mt-2">
                    <h4>The Retro Machine</h4>
                    <span class="copyright">&copy; 2024</span>
                    <span class="copyright">desarrollado por</span>
                    <p class="mb-0 copyright">Sergio Muñoz</p>
                    <address class="copyright">Buenos Aires - Argentina</address>
                </div>
                <div class="col-sm-3 text-sm-start my-2">
                    <h4>Contacto</h4>
                    <div>
                        <a href="#" class="ubicacion" data-bs-toggle="modal" data-bs-target="#exampleModal1">Macacha
                            Güemes 377, Puerto Madero
                        </a>
                    </div>
                    <div>
                        <a href="mailto:ser2016munoz@gmail.com">contacto@retromachine.com</a>
                    </div>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel1">Ubicacion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe class="img-ubicacion"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.9723668886477!2d-58.36684122521282!3d-34.60486025755694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a3352e5f133e29%3A0x66bae796ae0b8ddf!2sMacacha%20G%C3%BCemes%20377%2C%20Cdad.%20Aut%C3%B3noma%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1711661409419!5m2!1ses-419!2sar"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3 text-sm-start my-2">
                    <div>
                        <h4>Más información</h4>
                    </div>
                    <div><a href="">Nosotros</a></div>
                    <div><a href="">Preguntas frecuentes</a></div>
                    <div><a href="">Políticas de privacidad</a></div>
                    <div><a href="">Terminos y condiciones</a></div>
                </div>
                <div class="col-sm-3 text-sm-start my-2">
                    <div>
                        <h4>Seguinos en las redes</h4>
                    </div>
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook fa-xl"
                            style="color: #000000;"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram fa-xl"
                            style="color: #000000;"></i></a>
                    <a href="https://twitter.com/?lang=es" target="_blank"><i class="fa-brands fa-x-twitter fa-xl"
                            style="color: #000000;"></i></a>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube fa-xl"
                            style="color: #000000;"></i></a>
                    <a href="https://www.tiktok.com/es/" target="_blank"><i class="fa-brands fa-tiktok fa-xl"
                            style="color: #000000;"></i></a>
                    <div>
                        <h4 class="my-2">Medios de Pago</h4>
                    </div>
                    <a href="https://www.visa.com.ar/" target="_blank"><i class="fa-brands fa-cc-visa fa-xl"
                            style="color: #000000;"></i></a>

                    <a href="https://www.mastercard.com.ar/es-ar.html" target="_blank"><i
                            class="fa-brands fa-cc-mastercard fa-xl" style="color: #000000;"></i></a>

                    <a href="https://www.dinersclub.com/" target="_blank"><i class="fa-brands fa-cc-diners-club fa-xl"
                            style="color: #000000;"></i></a>

                    <a href="https://www.paypal.com/ar/home?locale.x=es_AR" target="_blank"><i
                            class="fa-brands fa-cc-paypal fa-xl" style="color: #000000;"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="js/carrito.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>