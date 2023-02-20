async function getText(){
    return "devuelve promesa..."
}

function getText2(){
    return Promise.resolve("Promesa...")
}



async function showData(){
    const resp = await fetch('https://www.datos.gov.co/resource/mcec-87by.json')
    const data = await resp.json();
    console.log(data);
}

function showData2(){
    return fetch('https://www.datos.gov.co/resource/mcec-87by.json')
    .then(resp => {
        return resp.json;
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => console.log(error))

}
