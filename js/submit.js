
const form = document.querySelector('form');
const inputs = document.querySelectorAll('#form input');


///Validacion de cada uno de los campos

const expresiones = {
  
    user: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    pass: /^[a-zA-Z0-9\_\-]{6,10}$/, // Letras, numeros, guion y guion_bajo
   
}

const campos = {
    user: false,
    pass: false,
}

const validarContenidoCampos = (e) => {
    switch (e.target.name) {
   
        case "user":
            validarCampos(expresiones.user, e.target, 'user');
            break;
        case "pass":
            validarCampos(expresiones.pass, e.target, 'pass');
            break; 
    }
}

const validarCampos = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
       
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
      
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarContenidoCampos);
    //input.addEventListener('blur', validarContenidoCampos);
});



// Valida si los campos están completos y además correctos!

function validarForm() {

    let esValido = true;

    esValido = validarCampoVacio('user', 'pass') && esValido && campos.user && campos.pass;


    return esValido
}


const validarCampoVacio = (user, pass) => {
    const field1 = document.getElementById(user);
    const valueUser = field1.value
    const field2 = document.getElementById(pass);
    const valuePass = field2.value

    if (valueUser === '' || valuePass === '') {
        return false;
    } else {
        return true;
    }

};


// validación del formulario

    form.addEventListener('submit', (e) => {
        

        e.preventDefault(); 
        
        if (!validarForm()) {


            // Muestra un mensaje en la consola indicando que el formulario no es válido
            //console.log('El formulario no es válido. Por favor, corrige los errores.');
           
            
          Swal.fire({
                icon: "error",
                title: "Error",
                text: "Por favor, complete correctamente los campos!",
                timer: 3000
              
            }); 
            
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
               
            });
           

        } else {
            // Si la validación del formulario es exitosa, muestra un mensaje en la consola
            //console.log('El formulario es válido. Enviar datos...');
            //alert("Los datos fueron enviados correctamente!")
          
                 Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Los datos fueron enviados correctamente!",
                    timer: 3000
              
                })
            
            form.reset();
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                icono.classList.remove('formulario__grupo-correcto');
            });
           
            
        }

    });







 