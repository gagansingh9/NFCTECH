<?php
setcookie("nombre", "", time() - 3600);
// Establecer la conexión con la base de datos

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include '../partials/_dbconnect.php';

$id = $_POST["id"];
$password = $_POST["password"];
$rol = $_POST["rol"];
$nombre = $_POST["nombre"];
$cpassword = $_POST['confirm-password'];


setcookie("nombre", $nombre); 
$validar = mysqli_query($conn,"SELECT * FROM usuarios WHERE id = '$id'");




// Comprobar si el usuario ya existe previamente en la BBDD
if ($validar->num_rows > 0) {
  // Display an error message
  header( "Location: error.php");
} else { 
  
  if(($password == $cpassword)){
  $hash = hash("sha256", $password);
  $sql = "INSERT INTO usuarios (id, password, rol, nombre, dt) VALUES ('$id', '$hash', '$rol', '$nombre', current_timestamp())";
  $validando = $conn->query($sql);
  header( "Location: Sesion.php");
  
}
else {

 
echo "<script>alert('La contraseña no es correcta');</script>";    
} 

}

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/app1.css"/> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
</head>
  <body class="fondo">
  <nav class="navbar sticy-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="../index.php">
  <img src="../images/logo.png" id="logo">
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    
    </div>
  </div>
</nav>
      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> 
<div id="template-bg-1">
<div
class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
<div class="card p-4 text-light bg-dark mb-5">
<div class="card-header">
<h3>Regístrate </h3>

</div>
<div class="card-body w-100">
<form name="login" action="Registrate.php" method="post">
<div class="input-group form-group mt-3">
<div class="bg-secondary rounded-start">
<span class="m-3"><i class="fas fa-user mt-2"></i></span>
</div>
<input type="number" class="form-control" placeholder="Id"
name="id" type="id" minlength="10" required>
<input type="text" class="form-control" placeholder="Nombre Usuario"
name="nombre" type="nombre" minlength="5" required>
</div>
<div class="input-group form-group mt-3">
<div class="bg-secondary rounded-start">
<span class="m-3"><i class="fas fa-key mt-2"></i></span>
</div>
<input type="password" class="form-control" placeholder="Crea la Contraseña"
name="password" type="password" id="password" minlength="8" required>

<input type="password" class="form-control"  placeholder=" Repite la Contraseña"
 type="password" name="confirm-password" id="confirm-password" name="confirm-password" minlength="8"  required >



<select name="rol" id="rol">
        <option value="1">Alumno</option>
        <option value="2">Professor</option>
        </select>
</div>


<div class="form-group mt-3">
<button type="submit" value="Registrar"  onclick="return validatePasswords()"
class="btn bg-secondary float-end text-white w-100"
name="login-btn"> Registrar </button>
</div>

</form>
<script>
                        function validatePasswords() {
                            var password = document.getElementById("password").value;
                            var confirmPassword = document.getElementById("confirm-password").value;
                            if (password !== confirmPassword) {
                                alert("Las contraseñas no coinciden");
                                return false;
                            }
                            return true;
                        }
                    </script>

</div>
<div class="card-footer ">
<div class="d-flex justify-content-center">
<div class="text-primary"> Ya tienes cuenta? <a href="../php/Sesion.php"> Iniciar Sesión</a>  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>