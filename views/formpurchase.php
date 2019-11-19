<?php 
    include(VIEWS_PATH."header.php");
    include(VIEWS_PATH."nav.php");
    
?>
    <div class="col" style="border:1px solid gray loginForm;">
       
        <table class="  table-borderer table-hover table-primary">
            <tr>
                <td><h3><?php echo $movie->getTitle();?></h3></td>
            </tr>
            <tr>
                <td><img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>"></td>
            </tr>
            
            <tr>
                <td><h5><?php echo 'Cine '.$cine->getName();?></h5></td>
            </tr>
            <tr>
                <td> <h5>Funcion</h5></td>
            </tr>
            <tr>
                <td><?php echo $projection->getDate()?></td>
            </tr>
            <tr>
                <td><?php echo $projection->getHour()?></td>
            </tr>
           
            <tr> 
                <td><h5>Precio:</h5></td> 
                <td><?php echo $price?></td>
            </tr>
            
            <tr>
                <td>
                    <form action="<?php echo FRONT_ROOT;?>/purchase/add" method="POST">
                            <label ><h5>Cantidad de entradas</h5></label>
                            <input type="number" name="quantityTickets" class="form-control">
                            <input type="checkbox" name="idProjection" id="" value="<?php echo   $projection->getIdProjection();?>">
                            <input type="submit" value="Confirmar">
                    </form>
                </td>
                
             </tr>
        </table>
    </div>

<?php include(VIEWS_PATH."footer.php");?>
