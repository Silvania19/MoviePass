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
                    if($purchases->getIdUser()==$user->getIdUser())
                    {
                 
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
                       
                <?php 
                    }
                 }
            } 
            else
            {
                if(is_object($listPurchase))
                {
                    if($listPurchase->getIdUser()==$user->getIdUser())
                    {
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
            <?php
                    }
                }
            }
            ?>
        </table>
    </div>
<?php include(VIEWS_PATH."footer.php");?>