<?php  
  include("db.php"); 
 if(isset($_POST['save-task'])){
   //echo 'Guardado'
     $title =$_POST['title'];
     $description=$_POST['description'];
     //echo $title;
     //echo $description;

     $query ="INSERT INTO tareas(titulo, descripcion) values ('$title','$description')";
     $result=mysqli_query($conn, $query);// pasamos cadena de conecion y consulta
     if (!$result) {
       die("Query Failed"); // terminar con mi aplicacion
     }
      //echo "Guardado en BD";

      $_SESSION['message']='Tarea Guardada satisfactoriamente';
      $_SESSION['message_type']= 'sucess';//color verde
      
      header("Location: index.php"); // Redireccionara  index.php
   }
?>