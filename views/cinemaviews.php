<?php include(VIEWS_PATH."header.php");
      include(VIEWS_PATH."nav.php");

?>

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
                                    <td>Nombre de sala  </td>
                                    <td>Capacidad    </td>
                                    <td>Precio</td>
                                    
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
                                         <td><?php echo $cinema->getPrice();?></td>
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
             <h2 class="modal-title">Add cinema</h2>
            <button type="button"class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <label for="idCine">Elija al cine que quiere agregar</label><br>
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
            
            <label for="nameCinema">Nombre<input type="text" name="nameCinema"class= "form-control " ></label> <br>
            <label for="capacity"> Capacidad <input type="text" name="capacity" id=""></label> <br><!--podria ser un arreglo que en cada posicion tenga un numero que le corresponde asiento-->
            <label for="price">Price<input type="text" name="price" id=""></label> <br>
            <button type="submit" class="btn btn-dark" data dismiss="modal" > Add new cinema </button>
        </div>
    </form>

</div>

 

<div class="modal fade" id="remove-cinema"tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true" >

<form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="POST">
<h5>¿Esta seguro de eliminar cinema?</h5>

<label > SI</label> <input type="checkbox" name="verificacion" class="form-control" value="si">
           
  <label>NO</label>  <input type="checkbox" name="verificacion" class="form-control" value="no">
  <button type="submit" class="btn btn-dark" data dismiss="modal" > Enviar </button>

</form>

</div>

<?php include(VIEWS_PATH."footer.php"); ?>