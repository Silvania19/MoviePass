<?php 
    include(VIEWS_PATH."header.php");
  
    if(isset($controlScript))
  {
    if($controlScript==1)
    {
?>
    <script>alert('<?php echo $message?>')</script> 
    <?php
    }
}?>
<?php  if($user->getIdRol()==2)
         {
       
       
?>      
       <nav class="navbar navbar-expand-sm bg-danger"> 
            <a class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
            <ul class="navbar-nav ml-auto">
            <li class ="nav-item">
          <a href="<?php echo FRONT_ROOT?>/views/home2" class="dropdown-item">Home</a>

          </li>
                <li class="nav-item"><a href="" class="nav-link"></a>
                <li class="nav-item"><a href="" class="nav-link"></a>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#update-cine">
                        Acrualizar informacion de  cine
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

                <li class ="nav-item  ">
                <div class="dropdown">
                   <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown">USUARIO</button>
                    <div class="dropdown-menu">
                     <a href="" class="dropdown-item"><?php echo $_SESSION['user']->getName();?></a>
                     <a href="<?php echo FRONT_ROOT;?>/views/user" class="dropdown-item">Ver Perfil</a>
                     <a href="<?php echo FRONT_ROOT;?>/views/deleteSession" class="dropdown-item">Salir</a>
               </div>
               </div>
             </li>
            </ul>
        </nav>
       <?php
            if(empty($controlUpdateCinema)){
         ?>   
        <div class="col" style="border:1px solid gray;">
       
            <table class="  table-borderer table-hover tables">
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
                                    
                                    <td>
                                        <form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="post">
                                            <input type="checkbox" name="idCinema" id="" value="<?php echo $cinema->getIdCinema(); ?>" required="">
                                            <input type="submit" value="eliminar">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo FRONT_ROOT;?>/cinema/updateParte1" method="post">
                                            <input type="checkbox" name="idCinema" id="" value="<?php echo $cinema->getIdCinema(); ?>" required="">
                                            <input type="submit" value="Actualizar">
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
                            <td><?php echo $cinemasCine->getPrice();?></td>
                            <td>
                             <div class="modal fade" id="remove-cinema">  

                                <form action="<?php echo FRONT_ROOT;?>/cinema/remove" method="post">
                                    <input type="checkbox" name="idCinema" id="" value="<?php echo $cinemasCine->getIdCinema(); ?>" required="">
                                    <input type="submit" value="eliminar">
                                </form>
                             </div>
                            </td>
                            <td>
                                <form action="<?php echo FRONT_ROOT;?>/cinema/updateParte1" method="post">
                                     <input type="checkbox" name="idCinema" id="" value="<?php echo $cinemasCine->getIdCinema(); ?>" required="">
                                      <input type="submit" value="Actualizar">
                                </form>
                            </td>

                        </tr>
                    <?php
                        }
                        if(!isset($cinemasCine))
                        {
                    ?>
                            <tr>
                                Aun no fueron cargadas salas, por favor agreguelas
                            </tr>
                    <?php
                        }
                    }
                    ?>
                 
            </table>
        </div>
        



        <div class="modal fade" id="update-cine">  

            <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cine/update" method="POST"> 

                 <div class="modal-header"> 
                     <h2 class="modal-title">Actualizar cine</h2>
                     <button type="button"class="close" data-dismiss="modal" aria-hidden="true"> <span>&times;</span> </button>      
                </div>
                <div class="modal-body">
                   <label for="name" >Nombre</label>
                   <input type="text" name="name" class="form-control" value="<?php echo $cine->getName(); ?>" required="">  
                   <label for="address" >Direccion</label>
                   <input type="text" name="address" id="" required=""  class="form-control" value="<?php echo $cine->getAddress(); ?>">
                   
                   <label for="address">¿estas seguro de actualizar?</label>
                   <input type="checkbox" name="idCine" id=""  value="<?php echo $cine->getIdCine(); ?>" required=""><br>
                   <button type="submit" class="btn btn-dark" data dismiss="modal" > Actualizar </button>
                </div>

 
             </form>
        </div>

        <div class="modal fade" id=add-cinema  tabindex="-1" role="dialog" aria-labelledby="add-cinema" aria-hidden="true">
            <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cinema/add" method="POST"> 
                <div class="modal-header"> 
                    <h2 class="modal-title">Agregar salas</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    
                    <label for="nameCinema">nombre</label>
                    <input type="text" name="nameCinema"class= "form-control " required=""> <br>
                    <label for="capacity"> Total de butacas</label><br>
                     <input type="text" name="capacity" id="" class= "form-control " required=""><br>
                     <label for="price">Precio</label><br>
                     <input type="text" name="price" id="" class= "form-control " required=""><br>
                     <label for="idCine">¿Estas seguro de agregar?</label>
                     <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>" required=""><br>
                    <button type="submit" class="btn btn-dark" data dismiss="modal" > Agregar nueva sala</button>
               </div>
            </form>

        </div>

 


        <div class="modal fade" id="delete-cine" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true" >
            <form  class="group-form" action="<?php echo FRONT_ROOT;?>/cine/remove" method="POST">
                <h5>¿Esta seguro de eliminar el cine?</h5>
                <label>SI</label>
                <input type="radio" name="verificacion" class="form-control" value="<?php echo $cine->getIdCine(); ?>" required="">
                <label>NO</label> 
                <input type="radio" name="verificacion" class="form-control" value="no" required="">
                <button type="submit" class="btn btn-dark" data dismiss="modal" > Enviar </button>

            </form>

         </div>

         <?php
         if(!empty($controlUpdateCinema))
         {
             echo 'hola';
            if($controlUpdateCinema==1)
            {
          ?>
           
           
                <form  action="<?php echo FRONT_ROOT;?>/cinema/update" method="POST"> 
                       <label for="nameCinema">nombre</label>
                        <input type="text" name="nameCinema" value="<?php echo $cinema->getnameCinema(); ?>" class= "form-control " required=""> <br>
                        <label for="capacity"> Total de butacas</label><br>
                        <input type="text" name="capacity"   value="<?php echo $cinema->getCapacity(); ?>" class= "form-control "required=""><br>
                        <label for="price">Precio</label><br>
                        <input type="text" name="price" id="" value="<?php echo $cinema->getPrice(); ?>" class= "form-control " required=""><br>
                        <label for="idCine">¿Estas seguro de actualizar?</label>
                        <input type="checkbox" name="idCineAndCinema" id="" value="<?php echo $cinema->getIdCinema(); ?>+<?php echo $cinema->getIdCine(); ?>" required=""><br>
                        <button type="submit" class="btn btn-dark" data dismiss="modal" > Agregar nueva sala</button>
                   
                </form>
 
            
          <?php 
            }
        }
         ?>
        
<?php
    }
     include(VIEWS_PATH."footer.php");
?>
