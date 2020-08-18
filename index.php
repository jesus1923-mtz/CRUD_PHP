<?php include("db.php");?>
<?php include("includes/header.php"); ?>


   
<div class="container p-4">

   <div class="row">

                  <div class="cold md-5"> <!-- para formulario-->
                   <?php if(isset($_SESSION['message'])) {?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?= $_SESSION['message'] ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                     </div>
                     <!-- Para que desaparezca el letrero terminaresmo sesión eliminar variables sesion-->
                     <?php  session_unset(); } ?>

                   <div class="card card-body">
                      <form action="saveTareas.php" method="POST">
                         <div class="form group"> 
                              <input type="text" name="title" class="form-control"placeholder="titulo de la  tarea" autofocus>
                         </div>
                         <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripcion Tarea"></textarea>
                          </div>
                          <input type="submit" class="btn btn-primary btn-block" name="save-task" value="Guardar">
          
            
                        </form>
                    </div>  
                  <div>

             </div class="col md-8"> <!-- para tabla-->

              <table  class="table table-bordered table-dark">
                  <thead>
                      <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Creado en </th>
                        <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $query= "SELECT * from tareas";
                        $result_tasks= mysqli_query($conn,$query);
                        //tomando cada uno del row y del arreglo asosiativo
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                          <td><?php echo $row['titulo']?></td>
                          <td><?php echo $row['descripcion']?></td>
                          <td><?php echo $row['creada_en']?></td>
                          <td>
                            <a href="editTareas.php?id=<?php echo $row['id'] ?>"> <img src="img/edit.png" width="20" style="cursor:pointer"/></a>
                            <a href="deleteTareas.php?id=<?php echo $row['id'] ?>"> <img src="img/botebasura.png" width="20" style="cursor:pointer"/></a>
                          </td>
                        </tr>
                        <?php } ?>
                  
                  </tbody>
               </table>

             </div>

    
   </div>

</div>

<?php include("includes/footer.php"); ?>