<?php
  $nombre = '2';
  $hash = hash("sha256", $nombre);
  $hash2 = hash("sha256", "3");

  if ($hash == $hash2) {
    echo "IGUAL";
  } else {
    echo "DIFERENTE";
  }
?>