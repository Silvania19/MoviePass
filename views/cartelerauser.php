<?php include(VIEWS_PATH."header.php");?>

<nav class="navbar navbar-expand-sm bg-danger">
    <a href=""class="navbar-brand "><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
        <ul class="navbar-nav ml-auto">
           
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



<div class="col" style="border:1px solid gray;">
       
       <table class="table-striped">
               
                

                <tr class="table-dark ">
               
                 <tr class="table-primary">
               <?php
                
                     foreach($cines as $cine)
                     { 
                ?>     
                        <td> Cine:    </td>
                        <td><?php echo $cine->getName();?></td>
                        <td>  
                      
                  
                   </tr>
                  
                    <tr>
                         <?php  
                          foreach($cartelera as $projection)
                          {
                           
                            if($projection->getIdCine()==$cine->getIdCine()) 
                            {
                          ?>
                            
                            <?php
                               foreach($movies as $movie)
                               {
                                   if($projection->getIdMovie()==$movie->getIdMovie())
                                       { 
                                         

                            ?>
                                           <td><?php echo $movie->getTitle(); ?></td>
                                           <td> <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded"></td>
                                        
                            <?php
                                       } 
                                       
                                  
                                 
                                }
                           
                            ?>

                    </tr>
                  
                    <tr>
                             <td>Fecha: </td>
                             <td><?php echo $projection->getDate();?> </td>
                    </tr>
                    <tr>
                             <td>Horario: </td>
                             <td><?php echo $projection->getHour();?> </td>
                    </tr>
                 
                  
                          <?php }
                        
                        } ?>
                
                <?php 
                     }
                ?>
                  
       </table>
</div>


<?php include(VIEWS_PATH."header.php");?>