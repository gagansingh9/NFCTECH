<?php
$server = "localhost";
$username = "nfc";
$password = "nfc";
$database = "nfc";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>