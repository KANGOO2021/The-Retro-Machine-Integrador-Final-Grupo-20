const options = {
    method: 'GET',
    headers: {
        accept: 'application/json',
        Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxODdhNGVkZjg4NzI0ZjA0YWRjZmQ0MWZkOTdkZTE4ZSIsInN1YiI6IjY2NDkxNmM0M2ViY2RkYmYzNDU4ZDA2YiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.JhXUoNHaAM8jUAjtSZj5P-39xa4PF3-vDTjMjk12Ih0'
    }
};

let contenedorPersonajes = document.getElementById("peliculas-nuevas")

let image = 'https://image.tmdb.org/t/p/original'

fetch('https://api.themoviedb.org/3/movie/popular?language=es-ES&page=1', options)
    .then(response => response.json())
    .then((datos) => {

        //console.log(datos)
        //console.log(datos.results)

        datos.results.forEach((elementos) => {


            const contenedorCreado = document.createElement('div')
            contenedorCreado.innerHTML = `
            
                    <div class="card" style="width: 17rem;">
                        <img src="${image + (elementos.poster_path)}" class="card-img-top card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">${elementos.title}</h5>
                        </div>
                    </div>   
             
        `;
            contenedorPersonajes.append(contenedorCreado)


        });

    })
    
