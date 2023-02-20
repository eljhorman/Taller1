(function(){
    document.getElementById("enviar").addEventListener("click", cargarDatos);

    function cargarDatos(){
       
       const pagina = document.getElementById("pagina").value;
       const cantidad = document.getElementById("cantidad").value;

       let urlFinal = 'https://picsum.photos/v2/list?';
        if(pagina > 0 && cantidad > 0 && cantidad < 100){
            urlFinal += `page=${pagina}&limit=${cantidad}` ; 
            renderFotos(urlFinal);
        }else{
            alert("debe seleccionar correctamente la pagina y la cantidad")
        }
        }

        function renderFotos(url){
            fetch(url)
            .then(resp => {
                if(resp.ok && resp.status==200){
                    return resp.json();
                }
            })
            .then((data) => {
                let contenidoDiv = document.getElementById("contenido");
                contenidoDiv.innerHTML = "";
                const escalaGrises = document.getElementById("Escala").checked;
                const blur = document.getElementById("blur").value;
                
                    let urlFoto = "";
                    if (escalaGrises) {
                        urlFoto += `grayscale`

                    }
                    if(blur > 0){
                        urlFoto += `&blur=${blur}`
                    }
                    for(let item of data) {
                    contenidoDiv.innerHTML +=`
                    <div class="card-group">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="${item.download_url}?${urlFoto}" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">${item.author}</h5>
                      <p class="card-text">${item.id}</p>
                      <a href="${item.url}" class="btn btn-primary">mas informacion</a>
                    </div>
                  </div>`;
                }
        
            })
            .catch(error => {console.log(`Error en API ${error}`);
        });

        }
        
   
   
})()
