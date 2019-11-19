<?php 
  include(VIEWS_PATH."header.php");
  include(VIEWS_PATH."nav.php");

?>


<div class="col" style="border:1px solid gray;">
       
       <table class="table-striped">
               
                

                <tr class="table-dark ">
               
                 <tr class="table-primary">
               <?php
               
                if(!empty($cartelera))
                {  
                  
                foreach($cines as $cine)
                     { 
                ?>   
                        <td> Cine:    </td>
                        <td><?php echo $cine->getName();?></td>
                        <td>  
                      
                  
                   </tr>
                    
                      <tr >
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
                                            <td> <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" class="rounded"></td>
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
                                <td>
                                    <form action="<?php echo FRONT_ROOT;?>/purchase/addPart1" method="post">
                                      <input type="checkbox" name="datos" id="" value="<?php echo  $projection->getIdProjection();?>" required="">
                                      <input type="submit" value="Agregar al carrito">
                                    </form>
                                   </td>
                        </tr>
                    
                          <?php }
                        
                        } ?>
                
                <?php 
                     }
                
                    }
                ?>
                  
       </table>
</div>


<?php include(VIEWS_PATH."footer.php");?>