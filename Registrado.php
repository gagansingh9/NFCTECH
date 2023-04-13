<html>

<head>
  <title>CAM</title>
  <link rel="stylesheet" href="css/app1.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


  <?php

  // Establecer la conexión con la base de datos
  $showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';

  $id = $_POST["id"];
  $password = $_POST["password"];
  $rol = $_POST["rol"];
  $nombre = $_POST["nombre"];
  $confirmPassword = $_POST['confirm-password'];
  $hashed_password = password_hash( $confirmPassword, PASSWORD_DEFAULT);



  $sql = "INSERT INTO usuarios (id, password, rol, nombre, dt) VALUES ('$id', '$hashed_password', '$rol', '$nombre', current_timestamp())";
  $validar = "SELECT * FROM usuarios WHERE id = $id";
  $validando = $conn->query($validar);


  if ($validando->num_rows > 0) {
    echo " <h1> El usuario ya se encuentra registrado</h1>";
  } else {

    if ($conn->query($sql) === TRUE) {
      $_SESSION ['rol'] = 1;
       header("Location: Sesion.php");
    } else {
      $_SESSION ['rol'] = 2;
      header("Location: Sesion.php"); 
    }
  }
}
  $conn->close();



  ?>

</body>

</html>