<?php include(VIEWS_PATH."header.php");?>
    <div class="col" style="border:1px solid gray;">
       
        <table class="  table-borderer table-hover ">
            <tr>
                <td><?php echo $movie->getTitle();?></td>
            </tr>
            <tr>
                <td><img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>"></td>
            </tr>
            
            <tr>
                <td><?php echo $cine->getName();?></td>
            </tr>
            <tr>
                <td> Funcion</td>
            </tr>
            <tr>
                <td><?php echo $projection->getDate()?></td>
            </tr>
            <tr>
                <td><?php echo $projection->getHour()?></td>
            </tr>
           
            <tr> 
                <td>Precio:</td> 
                <td><?php echo $price?></td>
            </tr>
            
            <tr>
                <td>
                    <form action="" method="POST">
                            <label >Cantidad de entradas</label>
                            <input type="text" name="quantityTickets" class="form-control">
                    </form>
                </td>
                
             </tr>
        </table>
    </div>

<?php include(VIEWS_PATH."footer.php");?>
