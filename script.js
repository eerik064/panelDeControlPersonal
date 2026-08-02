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