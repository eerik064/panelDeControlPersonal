<?php

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

echo "<h2>Pedido recibido, caserito</h2>";
echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $email</p>";
echo "<p>Mensaje: $mensaje</p>";