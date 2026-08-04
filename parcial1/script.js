const button = document.querySelector("#btn-confirmar");

function mostrarMensaje() {
    const mensaje = document.querySelector("#mensaje");
    mensaje.textContent = "Pedido Recibido - te atiende Erik Edil Espindola Jimenez";
    mensaje.classList.remove("oculto");
}

button.addEventListener("click", mostrarMensaje);