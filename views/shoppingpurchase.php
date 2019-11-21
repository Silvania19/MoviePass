<?php
include(VIEWS_PATH . "header.php");
include(VIEWS_PATH."nav.php");

if (isset($controlScript)) {
    if ($controlScript == 1) {
        ?>
        <script>
            alert('<?php echo $message ?>')
        </script>
<?php
    }
}

?>


  
        <table class=" table-borderer table-hover ">
            <tr>
                <td><h3><?php echo "Carrito de compras";?></h3></td>
            </tr>

            <?php 
            if(!empty($listPurchase))
            {
            ?>
                 <button type="button" class="btn btn-link" data-toggle="modal" data-target="#pagar">
                      Pagar 
                  </button> 
            <?php
            
                if(is_array($listPurchase))
                { 

                    foreach($listPurchase as $purchases)
                    {
                        
                     if($purchases->getState()==1)
                     {
                    
                ?>           
                      
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
                                                           <div class="col" style="border:1px solid gray;">
                                                                <td><h4>Pelicula:</h4></td>
                                                                    <td><h3><?php echo $movie->getTitle();?></h3></td>
                                                        
                                                    <?php   
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                <tr>
                                                 <tr>
                                                <td><h4>Fecha</h4></td>
                                                <td><h5><?php echo $projection->getDate();?></h5></td>
                                                </tr>
                                                <tr>
                                                <td><h4>Hora</h4></td>
                                                <td><h5><?php echo $projection->getHour();?></h5></td>
                                                </tr>   
                                        
                                        <?php
                                            }
                                        }
                                    
                                    } 
                                    
                                ?>
                                
                        
                        
                        
                        
                            <tr>
                                <td><h4>Monto   </h4></td>
                                <td><h5><?php echo $purchases->getAmount();?></h5></td>
                            </tr>
                            <tr>
                                <td><h4>Descuento   </h4></td>
                                <td><h5><?php echo $purchases->getDiscount();?></h5></td>
                            </tr>
                            <tr>
                                <td><h4>Cantidad de entradas  </h4></td>
                                <td><h5><?php echo $purchases->getQuantityTickets();?></h5></td>
                            </tr>
                                
                            <tr>
                                <td><h4>Fecha de compra   </h4></td>
                                <td><h5><?php echo $purchases->getTime();?></h5></td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="<?php echo FRONT_ROOT;?>/purchase/delete" method="post">
                                        <input type="checkbox" name="idPurchase" id="" required="" value="<?php echo $purchases->getIdPurchase();?>">
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                    
                    <?php 
                     }
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
                            ----------------------------------------------------------------------------------------------
                <?php
                        }
                    }
            }
        
            ?>
        </table>
    </div>

    <div class="modal fade" id="pagar">  

        <form class="modal-content " action="<?php echo FRONT_ROOT;?>/pay/add" method="POST"> 
        
                
            <div class="modal-header"> 
                <h2 class="modal-title">Pagar</h2>
                            
                 <button type="button"class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <label for="name" >corresp. Cia de crédito (Visa ó Master)</label>
                   
                    <select name="waytopay" id="" required=""class="form-control">
                        <option value="master">Master</option>
                        <option value="visa">Visa</option>
                    </select>
                  
                    <button type="submit" class="btn btn-dark" data dismiss="modal" > Listo </button>
            </div>

    
        </form>
    </div>

<?php include(VIEWS_PATH."footer.php");?>