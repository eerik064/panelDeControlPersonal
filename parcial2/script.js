const formularioEnvio = document.querySelector("#form-helados");
const aviso = document.querySelector("#aviso-helados");

function revisarEnvio(event) {
    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;
    const sabores = document.querySelector("#sabores").value;

    if (nombre === "") {
        event.preventDefault();
        aviso.textContent = "Falta tu nombre o tu correo - sin eso no podemos anotar el pedido.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else if (correo.includes("@") === false) {
        event.preventDefault();
        aviso.textContent = "Ese correo no tiene arroba - revísalo por favor.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else if (sabores === "") {
        event.preventDefault();
        aviso.textContent = "Ingrese el sabor que desea";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else {
        aviso.textContent = "Erik Edil Espindola Jimenez.";
        aviso.classList.add("exito");
        aviso.classList.remove("error");
    }
}

formularioEnvio.addEventListener("submit", revisarEnvio);