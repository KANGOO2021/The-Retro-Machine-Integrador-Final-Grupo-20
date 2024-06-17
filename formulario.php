<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo4.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="css/submit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/ffa1940001.js" crossorigin="anonymous"></script>
</head>

<body class="bg-image" style="background-image: url('img/grayskull.jpg'); background-repeat: no-repeat; background-size:cover;">


    <div class="container col-md-4 mt-5 bg-white py-3 rounded">
        <h2 class="text-center mb-4">Ingresar Película</h2>

        <div class="d-flex justify-content-center">

            <form action="recibirdatosmovies.php" method="post" id="formPelicula" style="width: 80%;" class="needs-validation" novalidate>


                <!-- Grupo: Nombre -->
                <div class="formulario__grupo mb-3" id="grupo__nombre" form-group>
                        <label for="nombre" class="formulario__label">Nombre</label>
                        <div class="formulario__grupo-input">
                            <input  type="text" class="form-control" name="nombre" 
                                id="" aria-describedby="helpId" placeholder=""
                                required
                            />
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <div class="valid-feedback">Bien</div>
                            <div class="invalid-feedback">Es necesario poner el nombre de la pelicula</div>
                        </div>
                </div>
                <!-- Grupo: Descripción -->
                <div class="formulario__grupo mb-3" id="grupo__descripcion" form-group>
                    <label for="descripcion" class="formulario__label">Descripción</label>
                    <div class="formulario__grupo-input">
                        <textarea class="formulario__input form-control mb-2" name="descripcion" id="descripcion" placeholder="Ingrese la descripción de la película" required></textarea>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario una descripcion de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">La descripción debe tener al menos 10 caracteres.</p>
                </div>
                
                <!-- Grupo: Género -->

                <div class="formulario__grupo mb-3" id="grupo__genero" form-group>
                    <label for="genero" class="formulario__label">Género</label>
                    <div class="formulario__grupo-input">
                        <select class="formulario__input form-control mb-2" name="genero" id="genero" required>
                            <option value="">Seleccione un género</option>
                            <option value="comedia">Comedia</option>
                            <option value="drama">Drama</option>
                            <option value="aventura">Aventura</option>
                            <option value="terror">Terror</option>
                            <option value="ciencia_ficcion">Ciencia Ficción</option>
                            <option value="documentales">Documentales</option>
                            <option value="catastrofes">Catastrofes</option>
                            <option value="accion">Acción</option>
                            <option value="fantasia">Fantasía</option>
                            <option value="musical">Musical</option>
                            <option value="suspenso">Suspenso</option>
                        </select>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario seleccionar el genero de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">Seleccione un género válido.</p>
                </div>
                
                <!-- Grupo: Calificación -->
                <div class="formulario__grupo mb-3" id="grupo__calificacion" form-group>
                    <label for="calificacion" class="formulario__label">Calificación</label>
                    <div class="formulario__grupo-input">
                        <select class="formulario__input form-control mb-2" name="calificacion" id="calificacion" required>
                            <option value="">Seleccione un calificación</option>
                            <option value="ATP">ATP</option>
                            <option value="13">13</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario seleccionar una calificación para la pelicula</div>
                    </div>
                </div>
                
                <!-- Grupo: Año -->
                <div class="formulario__grupo mb-3" id="grupo__anio" form-group>
                    <label for="anio" class="formulario__label">Año</label>
                    <div class="formulario__grupo-input">
                        <select class="formulario__input form-control mb-2" name="anio" id="anio" required>
                            <option value="">Seleccione un año</option>
                            <?php for ($year = 1980; $year <= 2024; $year++) { ?>
                                <option value="<?php echo $year ?>"><?php echo $year ?></option>
                            <?php } ?>
                        </select>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario seleccionar el año de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">El año debe ser un número válido.</p>
                </div>
                        
                <!-- Grupo: Director -->
                <div class="formulario__grupo mb-3" id="grupo__director" form-group>
                    <label for="director" class="formulario__label">Director</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input form-control mb-2" name="director" id="director" placeholder="Ingrese el director de la película" required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <div class="valid-feedback">Bien</div>
                        <div class="invalid-feedback">Es necesario poner el nombre del director de la pelicula</div>
                    </div>
                    <p class="formulario__input-error my-2">El director solo puede contener letras y espacios.</p>
                    
                </div>
                
                <div class="text-center mt-3" form-group>
                    <button type="submit" class="btn btn-primary mb-3" style="width: 100%;">Enviar</button>
                </div>

            </form>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
</body>
</html>