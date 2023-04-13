<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css"/> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">




</head>
  <body class="fondo">
  <nav class="navbar sticy-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="Inicio.php">
  <img src="../logo.png" id="logo">
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
</div>
<main >
<div id="clock">

<script>
// Obtén el elemento HTML del reloj
var clock = document.getElementById("clock");

// Función para actualizar el reloj
function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    
    // Formatea las horas, minutos y segundos como cadenas de dos dígitos
    if (hours < 10) hours = "0" + hours;
    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;
    
    // Actualiza el contenido del elemento HTML del reloj
    clock.innerHTML = hours + ":" + minutes + ":" + seconds;
}

// Actualiza el reloj cada segundo
setInterval(updateClock, 1000);

</script>


</div>
<div id="day"> <?php
$fecha_actual = date('d/m/Y');
echo  $fecha_actual;
?>
</div>

<div>

<style> 
.button {
  position: relative;
  padding: 0.5em 1em;
  font-size: 1.2em;
  border: none;
  background: none;
  outline: none;
  color: black;
  mix-blend-mode: screen;
}

.button::before {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: white;
  border-radius: 0.3em;
  content: '';
  mix-blend-mode: color-burn;
}

.bg {
  padding: 2em;
}

.bg1 {
  background: purple;
}

.bg2 {
  background: linear-gradient(to bottom, gold 50%, silver 50%);
}
</style>
<div class="bg bg1">
  <button class="button">Text</button>
</div>

<div class="bg bg2">
  <button class="button">Text</button>
</div>
</div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>