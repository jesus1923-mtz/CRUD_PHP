<?php 
 include("db.php");

  if (isset($_GET)){
    $id=$_GET['id'];
    $query="SELECT * FROM tareas WHERE id=$id";
    $result=mysqli_query($conn,$query);
    //cuantas filas tiene el resultado
    if(mysqli_num_rows($result)==1){
        //echo "tu puedes editar";
        $row=mysqli_fetch_array($result);
        $title=$row['titulo'];
        $description=$row['descripcion'];

    }

  }
  if(isset($_POST['update'])){
      //echo"actualizado"; // tomar los datos 
      $id=$_GET['id'];
      $title=$_POST['title'];
      $description=$_POST['description'];

      /*echo $title;
      echo $id;
      echo $description ; */
      $query= "UPDATE tareas set titulo='$title',descripcion='$description' WHERE id=$id ";
      mysqli_query($conn,$query);
      $_SESSION['message']="Tarea actualizada satisfactoriamente";
      $_SESSION['message_type']='warning';
      header('Location:index.php');

  }

?>
<?php include("includes/header.php") ?>

<div class="container p-4">
     <div class="row">
          <div class="col-md-4 mx-auto"> 
               <div class="card car-body">
                     <form action="editTareas.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <di class="form-group">
                           <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualiza el titulo"> 
                        </div>
                        <div class="form-group">
                          <textarea name="description" rows="2" class="form-control" placeholder="Actualiza descripcion"><?php echo $description;?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                        Update
                        </button>
                     </form>
               </div>
          </div>
     </div>
</div>