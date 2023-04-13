<html>

<head>
  <title>CAM</title>
  <link rel="stylesheet" href="css/app1.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


  <?php


  $login = false;
  $showError = false;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    
    setcookie("nombre", $nombre); 
   

    // $pass1= password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' ";

    $result = mysqli_query($conn, $sql);



    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        
        $username = $row['nombre'];
        $db_user_hashed_password = $row['password'];
      }
    } else  {
      throw new Exception("Error Processing Request", 1);
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);



    if (password_verify($password, $hashed_password)) {
      session_start();
      $_SESSION['rol'] = 1;
      header("Location: Alumno.php");
    } else {
      $_SESSION['rol'] = 2;
      header("Location: Inicio.php");
    }
  }



  mysqli_close($conn);

  ?>




</body>

</html>