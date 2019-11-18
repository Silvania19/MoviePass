<?php include(VIEWS_PATH."header.php");?>

    <table class="  table-borderer table-hover ">
        <tr><?php echo $movie->getTitle();?></tr>
        <tr<img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>">></tr>
        <tr><?php echo $cine->getName();?></tr>
        <tr>Funcion</tr>
        <tr><?php echo $projection->getDate()?></tr>
        <tr><?php echo $projection->getHour()?></tr>
        <tr> Precio</tr>
        <tr><?php
        var_dump($price);
        echo $price?></tr>
    </table>
        <tr>
            <form action="" method="POST">
                    <label >Cantidad de entradas</label>
                    <input type="text" name="quantityTickets" class="form-control">
            </form>
       </tr>



<?php include(VIEWS_PATH."footer.php");?>
