const inicioMapa = () => {
    cargarTodosLosEventos();
    //nuevo comentario
}
const cargarTodosLosEventos = () => {

    //eventos del mapa
    document.getElementById("bloque1").addEventListener("click", () => {
        $("#modal_mapa").modal("hide")
        $("#modalBloque1").modal("show")
        let select1 = document.getElementById("modalBloque1-pisos");
        select1.options[0] = new Option("selecionar una opcion", 0)
        select1.options[1] = new Option("aula1", 1)
        select1.options[2] = new Option("aula2", 2)
        select1.options[3] = new Option("aula3", 3)
    });

    //eventos bloque i select
    document.getElementById("modalBloque1-bloque").addEventListener("change", (e) => {
        let select1 = document.getElementById("modalBloque1-pisos");
        select1.options[0] = new Option("selecionar una opcion", 0)
        if (e.target.value == 1) {
            select1.options[1] = new Option("aula1", 1)
            select1.options[2] = new Option("aula2", 2)
            select1.options[3] = new Option("aula3", 3)
        } else if (e.target.value == 2) {
            select1.options[1] = new Option("aula4", 1)
            select1.options[2] = new Option("aula5", 2)
            select1.options[3] = new Option("aula6", 3)
        }
    });


    document.getElementById('formBloque1').addEventListener('submit', async (e) => {
        e.preventDefault();
        let select1 = document.getElementById("modalBloque1-bloque");
        let select2 = document.getElementById("modalBloque1-pisos");

        document.getElementById('cordenada_label').innerHTML = select1.value
        document.getElementById('cordenada').value = select1.value
        $("#modalBloque1").modal("hide")
        
    })
}

async function postData(url, data) {
    const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        cache: 'default', // *default, no-cache, reload, force-cache, only-if-cached
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    });
    return response.json(); // parses JSON response into native JavaScript objects
}


const mostrarMapa = () => {
    $("#modal_mapa").modal("show")
}
