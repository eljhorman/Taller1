
const app = {
     baseUrl : 'https://picsum.photos/v2',
    getPictures : async function(){
        const resp = await fetch(`${this.baseUrl}/list`)
        const data = await resp.json()
        this.renderPictures(data)
    },
    renderPictures: function(data){
        for (let item of data) {
           document.getElementById('content').innerHTML +=`
           <div class="card-group">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="${item.download_url}?${urlFoto}" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">${item.author}</h5>
                      <p class="card-text">${item.id}</p>
                      <a href="${item.url}" class="btn btn-primary">mas informacion</a>
                    </div>
                  </div>`
        }
    }
};
(function(){
    try{
        console.log(app.baseUrl);
        app.getPictures();
    }catch(error){
        console.log(`Error > ${error}`)
    }
})()