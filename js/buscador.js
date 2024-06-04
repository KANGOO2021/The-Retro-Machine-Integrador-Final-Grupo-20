//const peliculasMain = document.getElementById("peliculas-main")

document.addEventListener("keyup", e => {

    if (e.target.matches("#search")) {
       
        if (e.key === "Escape") e.target.value = ""

        document.querySelectorAll(".title").forEach(titulo => {

            if (titulo.textContent.toLowerCase().includes(e.target.value.toLowerCase().trim())) {

                titulo.classList.remove("filtro")
              
            }
            else {
                titulo.classList.add("filtro")
             
                
            }
            
        })
       
    } 

})



/* function noResultado() {
    const noResultado = document.createElement("h1");
    noResultado.textContent = "No hay resultados de búsqueda";
    noResultado.classList.add("noResultado");
    peliculasMain.appendChild(noResultado)

} */




let dibujosVideo = document.getElementsByClassName("dibujos-video")


function introPlay() {
    dibujosVideo[0].play()
}
function introPlay1() {
    dibujosVideo[1].play()
} 
function introPlay2() {
    dibujosVideo[2].play()
}
function introPlay3() {
    dibujosVideo[3].play()
}
function introPlay4() {
    dibujosVideo[4].play()
}


function introPause() {
    dibujosVideo[0].pause()
}
function introPause1() {
    dibujosVideo[1].pause()
}
function introPause2() {
    dibujosVideo[2].pause()
}
function introPause3() {
    dibujosVideo[3].pause()
}
function introPause4() {
    dibujosVideo[4].pause()
}


