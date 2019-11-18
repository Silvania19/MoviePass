<?php include(VIEWS_PATH."header.php"); ?> 
    <div class="col" style="border:1px solid gray;">
        <table class="  table-borderer table-hover table-primary">
            <tr>
                <td><h3><?php echo "Carrito de compras";?></h3></td>
            </tr>

            <?php foreach($listPurchase as $purchases)
                  {?>
            <tr>
                <td><h3><?php echo $purchases->getAmount();?></h3></td>
            </tr>

            <tr>
                <td><h3><?php echo $purchases->getQuantityTickets();?></h3></td>
            </tr>
            
            <tr>
                <td><h3><?php echo $purchases->getTime();?></h3></td>
            </tr>
                <?php } ?>
        </table>
    </div>
<?php include(VIEWS_PATH."footer.php");?>