<?php 
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query ="DELETE FROM tareas WHERE id= $id";
    $result= mysqli_query($conn,$query);
    if(!$result) { // si no hay un resultado en la consulta
        die("Consulta fallida");
    }
    // en caso que se elimino redireccionamos y guardamos mensaje
    $_SESSION['message']="Tarea Borrada";
    header("Location: index.php");
}
// alert con una ventana emergente bootsrap


?>