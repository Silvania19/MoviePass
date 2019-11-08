<?php include(VIEWS_PATH."header.php"); ?>

    <nav class="navbar navbar-expand-sm bg-danger">
        <ul class="navbar-nav ml-auto">
            <a class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
            <li class="nav-item"><a href="" class="nav-link"></a>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cinema">
                      Add new cinema
                </button> 
            </li>

            <li class="nav-item"><a href="" class="nav-link"></a>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cinema">
                     Update cinema
                </button> 
             </li>
             <li class ="nav-item dropdown ">
               <button type="button" class="btn btn-primary" data-toggle="dropdown">USUARIO</button>
               <div class="dropdown-menu">
               <a href="" class="dropdown-item"><?php echo $_SESSION['user']->getName();?></a>
               <a href="<?php echo FRONT_ROOT;?>/views/user" class="dropdown-item">Ver Perfil</a>
               <a href="<?php echo FRONT_ROOT;?>/views/deleteSession" class="dropdown-item">Salir</a>
               </div>
                </li>

        </ul>
    </nav>
<?php 
if (!empty($listCinema2))
{

    ?>
   <div class="col" style="border:1px solid gray;">
       
                   <table class="table-striped">
                            <tr><h2>Salas </h2></tr>
                            <tr class="table-primary">
                                    <td>Nombre del Cine     </td>
                                    <td>nombre de sala  </td>
                                    <td>capacity      </td>
                                    
                            </tr>

                            <tr class="table-dark ">
                           
                           <?php
                            
                                 foreach($listCinema2 as $cinema)
                                 { 
                            ?>     <tr>
                                        <td>
                                            <?php 
                                                 foreach($listCine2 as $cine)
                                                    {
                                                         if($cine->getIdCine()== $cinema->getIdCine())
                                                        {
                                                           echo $cine->getName();
                                                        }
                                                    }
                                             ?>
                                         </td>
                                         <td><?php echo $cinema->getnameCinema();?></td>
                                         <td><?php echo $cinema->getCapacity();?></td>
                                        <td>
                                        <form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="post">
                                          <input type="checkbox" name="idCinema" id="" value="<?php echo $cinema->getIdCinema(); ?>">
                                          <input type="submit" value="eliminar">
                                        </form>
                                        </td>
                                    </tr>
                            <?php 
                                 }
                            ?>
                             
                   </table>
</div>
<?php
}
?>

<div class="modal fade" id=add-cinema>
    <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cinema/add" method="POST"> 
        <div class="modal-header"> 
             <h2 class="modal-title">Add cine</h2>
            <button type="button"class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <label for="idCine">elija al cine que quiere agregar</label><br>
            <select name="idCine" id="">
                <?php
                    foreach($listCine2 as $cine)
                    { 
                ?>
                      <option value="<?php echo $cine->getIdCine();?>"><?php echo $cine->getName();?></option>

                 <?php 
                   }
                       
                ?>
            </select><br>
            
            <label for="nameCinema">nombre</label><input type="text" name="nameCinema"class= "form-control " > <br>
            <label for="capacity"> Capacity <input type="text" name="capacity" id=""></label> <br><!--podria ser un arreglo que en cada posicion tenga un numero que le corresponde asiento-->
            <button type="submit" class="btn btn-dark" data dismiss="modal" > Add new cinema </button>
        </div>
    </form>

</div>

  <div class="modal fade" id="remove-cinema">
    <div class="modal-header">
        <h2 class="modal-title">Remove cinema</h2>
                        
         <button type="button"class="close" data-dismiss="modal">&times;</button>
     </div>
            <form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="POST" >
                     <div class="modal-body">
                            <label for="nameCinema" >nameCinema</label><input type="text" name="nameCinema"class= "form-control " >
                            <button type="submit" class="btn btn-dark" data dismiss="modal" > Remove cinema</button>

                      </div>
              </form>
    
</div>

<?php include(VIEWS_PATH."footer.php"); ?>