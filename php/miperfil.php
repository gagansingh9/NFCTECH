<?php

include '../partials/_dbconnect.php';

$username = $_COOKIE["nombre"];
$result = mysqli_query($conn, "SELECT nombre FROM usuarios WHERE nombre = '$username'");
$row = mysqli_fetch_assoc($result);
$nombre = $row['nombre'];

if (isset($_POST['submit'])) {
  // Get the email and phone number from the form
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
 
  // Insert the data into the database
  $save = ( "INSERT INTO usuarios (email, telefono) VALUES ('$email', '$telefono') WHERE nombre = '$username' ON DUPLICATE KEY UPDATE email='$email', telefono='$telefono' WHERE nombre = '$username' ");

  mysqli_query($conn, $save);
}
if (isset($_FILES['profile_picture'])) {
  $file_name = $_FILES['profile_picture']['imagen'];
  $file_tmp = $_FILES['profile_picture']['tmp_name'];
  $file_type = $_FILES['profile_picture'][$extensions];
  $file_size = $_FILES['profile_picture'][$file_size];
  $file_ext = strtolower(end(explode('.', $_FILES['profile_picture']['imagen'])));
  
  $extensions = array("jpeg","jpg","png");
  
  if (in_array($file_ext, $extensions) === false) {
    $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if ($file_size > 2097152) {
    $errors[] = "File size must be exactly 2 MB.";
  }
  
  if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "uploads/" . $file_name);
    $sql = "UPDATE users SET profile_picture = 'uploads/$file_name' WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
  } else {
    print_r($errors);
  }
}

mysqli_close($conn);
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
  <body>
  <nav class="navbar sticy-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../php/Alumno.php">
        <img src="logo.png" id="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="Profe.php">Inicio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="../php/listadealumnos.php">Lista de alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Cursos</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ajustes</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Chat</a></li>
              <li><a class="dropdown-item" href="#">Idioma</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../php/miperfil.php">Mi Perfil</a></li>
            </ul>

          <li class="nav-item" id="logout">
            <form action="../php/Sesion.php">
              <input class="btn btn-secondary" type="submit" value="Cerrar Sesión" />
            </form>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<main>
<form id=formulario>

  
   <!-- Change button -->
   <form action="miperfil.php" enctype="multipart/form-data" method="post">
    <label for="imagen"></label>
    <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-picture">
    <input id="imagen" name="imagen" size="30" type="file" />

    <!-- Save button -->
    <input name="submit" type="submit" value="Guardar" />

    <br><br>

  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <label class="form-label" for="form6Example1">Nombre</label>
        <input type="text" id="nombre" name="nombre" disabled class="form-control" value="<?php echo $nombre; ?>" >
      </div>
    </div>
   

  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example5">Email</label>
    <input type="email" id="email" name="email" class="form-control"  />
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form6Example6">Telefono</label>
    <input type="number" id="telefono" name="telefono" class="form-control" />
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Guardar</button>
</form>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>