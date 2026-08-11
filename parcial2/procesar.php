<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$sabores = $_POST["sabores"];

echo "<h2>Pedido recibido en Heladería Doña Nieve</h2>";
echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $correo</p>";
echo "<p>Sabores: $sabores</p>";

$cartas = ["Cono simple - Bs 8", "Copa doble - Bs 15", "Litro para llevar - Bs 35"];

foreach($cartas as $carta){
    echo "<br>$carta";
}
echo "<br> Te atiende Erik Edil Espindola Jimenez";