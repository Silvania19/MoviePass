<?php 
    include(VIEWS_PATH."header.php"); 
    if($user->getIdRol()==2)
    {
       
?>      
       <nav class="navbar navbar-expand-sm bg-danger"> 
            <a class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="" class="nav-link"></a>
                <li class="nav-item"><a href="" class="nav-link"></a>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#update-cine">
                        Modificar cine
                    </button> 
            
                </li>
                <li class="nav-item"><a href="" class="nav-link"></a>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#delete-cine">
                        Eliminar cine
                    </button> 
            
                </li>
                <li class="nav-item"><a href="" class="nav-link"></a>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cinema">
                        Agregar sala
                    </button> 
            
                </li>


            </ul>
        </nav>
       
            
        <div class="col" style="border:1px solid gray;">
       
            <table class="  table-borderer table-hover ">
                <tr class="table-primary">
                
                     <td><?php echo $cine->getName();?> </td>
                </tr>
                <tr>
                   <td>Direccion</td> 
                   <td><?php echo $cine->getAddress();?></td> 
                        
                </tr>

                <tr class="table-dark ">
                
                    <tr>
                        <td> Salas </td>

                    </tr>
                    <tr>
                        <td> Nombre sala </td>
                        <td> Capacidad </td>
                        <td> Precio </td>
                    </tr> 
                    <?php
                        if(is_array($cinemasCine))
                        {
                            foreach($cinemasCine as $cinema)
                            { 
                    ?>     
                                <tr>
                                    <td><?php echo $cinema->getnameCinema();?></td>
                                    <td><?php echo $cinema->getCapacity();?></td>
                                    <td><?php echo $cinema->getPrice();?></td>
                                    <td><?php echo 'hola';?></td>
                                    <td>
                                        <form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="post">
                                            <input type="checkbox" name="idCinema" id="" value="<?php echo $cinema->getIdCinema(); ?>">
                                            <input type="submit" value="eliminar">
                                        </form>
                                    </td>
                                </tr>
                    <?php 
                            }
                        }
                        if(is_object($cinemasCine))
                        {
                     ?> <tr>
                            <td><?php echo $cinemasCine->getnameCinema();?></td>
                            <td><?php echo $cinemasCine->getCapacity();?></td>
                            <td><?php echo 'hola';?></td>
                            <td>
                                <form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="post">
                                    <input type="checkbox" name="idCinema" id="" value="<?php echo $cinemasCine->getIdCinema(); ?>">
                                    <input type="submit" value="eliminar">
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                        if(!isset($cinemasCine))
                        {
                    ?>
                            <tr>
                                Aun no fueron cargadas salsa, por favor agreguelas
                            </tr>
                    <?php
                        }
                    ?>
                 
            </table>
        </div>
        



        <div class="modal fade" id="update-cine">  

            <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cine/update" method="POST"> 
    
            
                 <div class="modal-header"> 
                     <h2 class="modal-title">Update cine</h2>
                     <button type="button"class="close" data-dismiss="modal"><span>&times;</span></button>
                 </div>
                <div class="modal-body">
                   <label for="name" >Name</label>
                   <input type="text" name="name" class="form-control">  
                   <label for="address">Address</label>
                   <input type="text" name="address" id="">
                   
                   <label for="address">$estas seguro de modificar?</label>
                   <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>">
                   <button type="submit" class="btn btn-dark" data dismiss="modal" > update </button>
                </div>

 
             </form>
        </div>

        <div class="modal fade" id=add-cinema>
            <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cinema/add" method="POST"> 
                <div class="modal-header"> 
                    <h2 class="modal-title">Agregar salas</h2>
                    <button type="button"class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    
                    <label for="nameCinema">nombre</label>
                    <input type="text" name="nameCinema"class= "form-control " > <br>
                    <label for="capacity"> Total de butacas</label> 
                     <input type="text" name="capacity" id=""><br>
                     <label for="price">Price</label><br>
                     <input type="text" name="price" id=""><br>
                     <label for="idCine">¿Estas seguro de agregar?</label>
                     <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>"><br>
                    <button type="submit" class="btn btn-dark" data dismiss="modal" > Agregar nueva sala</button>
               </div>
            </form>

        </div>

        <div class="modal fade" id="delete-cine" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true" >
            <form  class="group-form" action="<?php echo FRONT_ROOT;?>/cine/remove" method="POST">
                <h5>¿Esta seguro de eliminar el cine?</h5>
                <label>SI</label>
                <input type="radio" name="verificacion" class="form-control" value="<?php echo $cine->getIdCine(); ?>">
                <label>NO</label> 
                <input type="radio" name="verificacion" class="form-control" value="no">
                <button type="submit" class="btn btn-dark" data dismiss="modal" > Enviar </button>

            </form>

         </div>

<?php
    }

    include(VIEWS_PATH."footer.php");
?>
