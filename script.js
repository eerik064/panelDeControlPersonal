const body = document.querySelector("body");
const buttontoggle = document.querySelector("#btn-theme");

let isDay = false;

function modeSwitch() {

    body.classList.toggle("light");
    isDay = !isDay;

    if (isDay) {
        buttontoggle.textContent = "Modo Oscuro";
    } else {
        buttontoggle.textContent = "Modo Claro";
    }
}

buttontoggle.addEventListener("click", modeSwitch);

const botonMenu = document.querySelector("#btn-menu");
const menu = document.querySelector("nav ul");

function alternarMenu() {
    menu.classList.toggle("abierto");
}

botonMenu.addEventListener("click", alternarMenu);

const formularioEnvio = document.querySelector("#form-envio");
const aviso = document.querySelector("#aviso");

function revisarEnvio(event) {

    event.preventDefault();

    const nombre = document.querySelector("#nombre").value;
    const email = document.querySelector("#email").value;
    const mensaje = document.querySelector("#mensaje").value;

    if (nombre === "") {
        aviso.textContent = "Porfavor ingrese su nombre.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else if (email.includes("@") === false) {

        aviso.textContent = "Ingrese un correo valido";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else if (mensaje === "") {
        aviso.textContent = "Porfavor llene el campo mensaje";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else {
        aviso.textContent = "Mensaje enviado exitosamente.";
        aviso.classList.add("exito");
        aviso.classList.remove("error");
    }
}

formularioEnvio.addEventListener("submit", revisarEnvio);