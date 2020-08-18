<?php
    session_start();

   // devuelve un objeto de conexión
    $conn = mysqli_connect(
     'localhost',
     'root',
     '',
     'bd_tareas'
  );
  // Comprobamos si se hizo la conexión existe el objeto
  /*if (isset($conn)){
      echo 'DB esta conecatada';
    }*/
?>