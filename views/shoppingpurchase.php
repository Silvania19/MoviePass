<?php 
    include(VIEWS_PATH."header.php"); 
    include (VIEWS_PATH."nav.php");
?> 
    <div class="col" style="border:1px solid gray;">
        <table class="  table-borderer table-hover table-primary">
            <tr>
                <td><h3><?php echo "Carrito de compras";?></h3></td>
            </tr>

            <?php 
            if(is_array($listPurchase))
            { 

                foreach($listPurchase as $purchases)
                {
                    
                 
                 
            ?>           
             
                       <tr>
                            <td><h4>Funcion   </h4></td> 
                        </tr>
                            <?php
                                if(is_array($projections))
                                {
                                    
                                    foreach($projections as $projection)
                                    {
                                        if($projection->getIdProjection()==$purchases->getIdProjection())
                                        {
                                               if(is_array($movies))
                                                {
                                                    foreach($movies as $movie)
                                                    {
                                                        if($movie->getIdMovie()==$projection->getIdMovie())
                                                        {
                                                            ?>
                                                               <td>Pelicula:</td>
                                                                <td><?php echo $movie->getTitle();?></td>
                                                    
                                                 <?php   
                                                        }
                                                    }
                                                }
                                                ?>
                                              <tr>
                            
                                            <td>fecha</td>
                                            <td><h3><?php echo $projection->getDate();?></h3></td>
                                            <td>hora</td>
                                            <td><h3><?php echo $projection->getHour();?></h3></td>
                                            </tr>   
                                       
                                       <?php
                                        }
                                    }
                                   
                                } 
                                
                            ?>
                            
                    
                      
                       
                       
                        <tr>
                            <td><h4>Monto   </h4></td>
                            <td><h3><?php echo $purchases->getAmount();?></h3></td>
                        </tr>
                        <tr>
                            <td><h4>Descuento   </h4></td>
                            <td><h3><?php echo $purchases->getDiscount();?></h3></td>
                        </tr>
                        <tr>
                            <td><h4>Cantidad de entradas  </h4></td>
                            <td><h3><?php echo $purchases->getQuantityTickets();?></h3></td>
                        </tr>
                            
                        <tr>
                            <td><h4>Fecha de compra   </h4></td>
                            <td><h3><?php echo $purchases->getTime();?></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <form action="<?php echo FRONT_ROOT;?>/purchase/delete" method="post">
                                    <input type="checkbox" name="idPurchase" id="" required="">
                                    <input type="submit" value="Eliminar">
                                 </form>
                             </td>
                        </tr>
                       
                <?php 
                    }
                 
            } 
            else
            {
                if(is_object($listPurchase))
                {
                  
                ?>
                       
                       <tr>
                            <td><h4>Funcion   </h4></td> 
                        </tr>
                            <?php
                                if(is_array($projections))
                                {
                                    
                                    foreach($projections as $projection)
                                    {
                                        if($projection->getIdProjection()==$listPurchase->getIdProjection())
                                        {
                                               if(is_array($movies))
                                                {
                                                    foreach($movies as $movie)
                                                    {
                                                        if($movie->getIdMovie()==$projection->getIdMovie())
                                                        {
                                                            ?>
                                                               <td>Pelicula:</td>
                                                                <td><?php echo $movie->getTitle();?></td>
                                                    
                                                 <?php   
                                                        }
                                                    }
                                                }
                                                ?>
                                              <tr>
                            
                                            <td>fecha</td>
                                            <td><h3><?php echo $projection->getDate();?></h3></td>
                                            <td>hora</td>
                                            <td><h3><?php echo $projection->getHour();?></h3></td>
                                            </tr>   
                                       
                                       <?php
                                        }
                                    }
                                   
                                } 
                                
                            ?>
                            
                    
                      
                       
                       
                        <tr>
                            <td><h4>Monto   </h4></td>
                            <td><h3><?php echo $listPurchase->getAmount();?></h3></td>
                        </tr>
                        <tr>
                            <td><h4>Descuento   </h4></td>
                            <td><h3><?php echo $listPurchase->getDiscount();?></h3></td>
                        </tr>
                        <tr>
                            <td><h4>Cantidad de entradas  </h4></td>
                            <td><h3><?php echo $listPurchase->getQuantityTickets();?></h3></td>
                        </tr>
                            
                        <tr>
                            <td><h4>Fecha de compra   </h4></td>
                            <td><h3><?php echo $listPurchase->getTime();?></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <form action="<?php echo FRONT_ROOT;?>/purchase/delete" method="post">
                                    <input type="checkbox" name="idPurchase" id="" required="">
                                    <input type="submit" value="Eliminar">
                                 </form>
                             </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </table>
    </div>
<?php include(VIEWS_PATH."footer.php");?>