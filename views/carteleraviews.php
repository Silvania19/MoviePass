<?php



include(VIEWS_PATH."header.php");

?>

<?php
  if(isset($controlScript))
  {
    if($controlScript==1)
    {
?>
      <script>alert('<?php echo $message?>')</script>
<?php  
    }
  }
   include(VIEWS_PATH."nav.php"); 
if(!isset($control)&& !isset($control2)&& !isset($control3))
{
 
?>


   <div class="col" style="border:1px solid gray;">
       
      <table class="table-striped tables">
         <tr class="table-dark ">
            <tr class="table-primary">
              <?php
                 foreach($cines as $cine)
                  { 
               ?>     
                     <td> Cine:    </td>
                     <td><?php echo $cine->getName();?></td>
                     <td>  
                          <form action="<?php echo FRONT_ROOT;?>/projection/addparte1" method="post">
                            <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>" required="">
                            <input type="submit" value="Agregar pelicula a cartelera">
                          </form>
                      </td>
              </tr>
              <tr>
                <?php 
                 if(is_array($cartelera))
                 {
                  
                   foreach($cartelera as $projection)
                     {
                       if($projection->getIdCine()==$cine->getIdCine()) 
                        {
                          foreach($movies as $movie)
                          {
                            if($projection->getIdMovie()==$movie->getIdMovie() )
                             { 
                ?>
                                <td><?php echo $movie->getTitle(); ?></td>
                                <td> <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded"></td>
                                 <td>
                                    <form action="<?php echo FRONT_ROOT;?>/projection/addparte2" method="post">
                                      <input type="checkbox" name="datos" id="" value="<?php echo   $movie->getIdMovie()."+".$cine->getIdCine();?>" required="">
                                      <input type="submit" value="Agregar funcion">
                                    </form>
                                   </td>
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
                            <tr>
                                <td>  
                                  <form action="<?php echo FRONT_ROOT;?>/projection/delete" method="post">
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $projection->getIdProjection(); ?>" required="">
                                      <input type="submit" value="eliminar">
                                  </form>
                                </td>   
                                <td>  
                                  <form action="<?php echo FRONT_ROOT;?>/ticket/quantityTicketSales" method="post">
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $projection->getIdProjection(); ?>" required="">
                                      <input type="submit" value="Ver cantidad de entradas vendidas">
                                  </form>
                                </td>
                                <td>  
                                  <form action="<?php echo FRONT_ROOT;?>/ticket/remanentes" method="post">
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $projection->getIdProjection(); ?>" required="">
                                      <input type="submit" value="Remanentes">
                                  </form>
                                </td>  
                              </tr>
             <?php
                          }
                         } 
                        }
                        if(is_object($cartelera))
                        {
                          if($cartelera->getIdCine()==$cine->getIdCine())
                          {
                            foreach($movies as $movie)
                            {
                              if($cartelera->getIdMovie()==$movie->getIdMovie())
                              {
                             
              ?>              
                                 <td><?php echo $movie->getTitle(); ?></td>
                                <td> <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded"></td>
                                 <td>
                                    <form action="<?php echo FRONT_ROOT;?>/ticket/quantityTicketSales" method="post">
                                      <input type="checkbox" name="datos" id="" value="<?php echo   $movie->getIdMovie()."+".$cine->getIdCine();?>" required="">
                                      <input type="submit" value="Agregar funcion">
                                    </form>
                                   </td>
                                <?php
                              } 
                          }
                                ?>
                          </tr>
                          <tr>
                              <td>Fecha: </td>
                                <td><?php echo $cartelera->getDate();?> </td>
                            </tr>
                            <tr>
                              <td>Horario: </td>
                              <td><?php echo $cartelera->getHour();?> </td>
                            </tr>
                            <tr>
                                <td>  
                                  <form action="<?php echo FRONT_ROOT;?>/projection/delete" method="post">
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $cartelera->getIdProjection(); ?>" required="">
                                      <input type="submit" value="eliminar">
                                  </form>
                                </td>   
                                <td>  
                                  <form action="<?php echo FRONT_ROOT;?>/ticket/quantityTicketSales" method="post">
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $cartelera->getIdProjection(); ?>" required="">
                                      <input type="submit" value="Ver cantidad de entradas vendidas">
                                  </form>
                                </td>
                                <td>  
                                  <form action="<?php echo FRONT_ROOT;?>/ticket/remanentes" method="post">
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $cartelera->getIdProjection(); ?>" required="">
                                      <input type="submit" value="Remanetes">
                                  </form>
                                </td>        
                              </tr> 
                 <?php    
                              }
                            }
                          }
                        
              
                      
                            ?>
                              </tr>  
                   </table>
</div>
<?php
}
  if(isset($control)&& !isset($control2) && !isset($control3))
  {
    

?>
    <form action="<?php echo FRONT_ROOT;?>/projection/filterGenre" method="POST">
      Filtar por genero
      <input type="checkbox" name="idCine" value= "<?php echo $idCine;?>"id=""required="">
      <select name="idGenre" >
        <?php
          foreach($listGenres2 as $valor)
          {
        ?>
            <option value=<?php echo $valor->getIdGenres();?>><?php echo $valor->getNameGenres(); ?></option>
        <?php    
          } 
        ?>
      </select>
      <button type="submit" class="btn btn-dark"  > Buscar </button>
     </form>
     <form action="<?php echo FRONT_ROOT;?>/projection/filterDate" method="POST">
         Filtar por fecha
        <input type="checkbox" name="idCine" value="<?php echo $idCine; ?>" id="" required="">
        <input type="date" name="date"  id="">

        <button type="submit" class="btn btn-dark"> Buscar </button>
      </form> <br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
<?php
 if(!empty($listMovies2))
{
    foreach ($listMovies2 as $movie){
     
    
     
 ?>
   <div class="item active">
      <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded">
      </div> <br>
      <form action="<?php echo FRONT_ROOT; ?>/projection/addparte2" method="post">
        <h3>Title: <input type="submit" value=" <?php echo $movie->getTitle(); ?> ">
        <input type="checkbox" name="datos" id="" value="<?php echo $movie->getIdMovie()."+".$idCine;?>"  required="">
         </h3>
      </form>
      <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
      <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
      <p>Overview: <?php echo $movie->getOverview(); ?> </p>

      <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
      <p>Genres : <?php
                  
            $arrayIdG= $movie->getGenre_ids();
            foreach ($arrayIdG as $genre) {
              foreach($listGenres2 as $valor)
              {
               if($valor->getIdGenres() == $genre)
               {
                   echo $valor->getNameGenres();
               }
               
              }
            

          
  }  ?> </p>
  <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
  <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
  
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

    
</div>


     <?php }
    }?>
  <?php   
     if(!empty($filter))
     {
   
        foreach ($filter as $movie) {

    
?>

  <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded">
  <br>
  <form action="<?php echo FRONT_ROOT; ?>/projection/addparte2" method="post">
    <h3>Title: <input type="submit" value=" <?php echo $movie->getTitle(); ?> ">
      <input type="checkbox" name="datos" id="" value="<?php echo $movie->getIdMovie()."+".$idCine;?>" required="">
    </h3>
  </form>
  <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
  <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
  <p>Overview: <?php echo $movie->getOverview(); ?> </p>

  <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
  <p>Genres : <?php
                  
            $arrayIdG= $movie->getGenre_ids();
            foreach ($arrayIdG as $genre) {
              foreach($listGenres2 as $valor)
              {
               if($valor->getIdGenres() == $genre)
               {
                   echo $valor->getNameGenres();
               }
               
              }
            

          
  }  ?> </p>
  <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
  <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
  <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded">
    



     <?php }}?>
     
 
<?php
}
if(!isset($control)&& isset($control2) && !isset($control3))
{
?>
    <form class="form-control"action="<?php echo FRONT_ROOT;?>/projection/addparte3" method="post">
        <h3> COMPLETAR</h3>
        <label for="datos">confirmar</label>
        <input type="checkbox" name="datos" value="<?php echo $datos; ?>" id=""  required=""><br>
        <label for="date">Fecha</label>
        <input type="date" name="date"  required="">
        <input type="submit" value="enviar">
    </form>
<?php
}
?>
<?php 
  if(!isset($control1)&& !isset($control2) && isset($control3))
  {
  

?>
    <form class="form-control"action="<?php echo FRONT_ROOT;?>/projection/addProjection" method="post">
        <h3> COMPLETAR</h3>
        <label for="datos">confirmar</label>
        <input type="checkbox" name="datos" value="<?php echo $datos; ?>" id=""  required=""><br>
        <label for="cinemahour">Sala y hora</label>
        <select name="cinemahour" id="" required="">
          
            <?php 
                       if(!empty($cinema))
                       {
                        
                        ?>
                            <option value="<?php echo $cinema->getIdCinema();?>+13:00:00"><?php echo $cinema->getnameCinema()?> hora  13:00:00</option>
                            <option value="<?php echo $cinema->getIdCinema();?>+15:30:00"><?php echo $cinema->getnameCinema()?> hora  15:30:00</option>
                            <option value="<?php echo $cinema->getIdCinema();?>+17:00:00"><?php echo $cinema->getnameCinema()?> hora  17:00:00</option>
                            <option value="<?php echo $cinema->getIdCinema();?>+19:30:00"><?php echo $cinema->getnameCinema()?> hora  19:30:00</option>
                            <option value="<?php echo $cinema->getIdCinema();?>+22:00:00"><?php echo $cinema->getnameCinema()?> hora  20:00:00</option>    
                        <?php
                         
                       } 
                       if(empty($cinema))
                        {
                           if(is_array($listCinemas2))
                           {
                             foreach ($listCinemas2 as $cinema)
                             {
                              ?>
                              <option value="<?php echo $cinema->getIdCinema();?>+13:00:00"><?php echo $cinema->getnameCinema()?> hora  13:00:00</option>
                              <option value="<?php echo $cinema->getIdCinema();?>+15:30:00"><?php echo $cinema->getnameCinema()?> hora  15:30:00</option>
                              <option value="<?php echo $cinema->getIdCinema();?>+17:00:00"><?php echo $cinema->getnameCinema()?> hora  17:00:00</option>
                              <option value="<?php echo $cinema->getIdCinema();?>+19:30:00"><?php echo $cinema->getnameCinema()?> hora  19:30:00</option>
                              <option value="<?php echo $cinema->getIdCinema();?>+22:00:00"><?php echo $cinema->getnameCinema()?> hora  20:00:00</option>    
                             <?php
                             }
                           }
                           if(is_object($listCinemas2))
                           {
                            ?>
                            <option value="<?php echo $listCinemas2->getIdCinema();?>+13:00:00"><?php echo $listCinemas2->getnameCinema()?> hora  13:00:00</option>
                            <option value="<?php echo $listCinemas2->getIdCinema();?>+15:30:00"><?php echo $listCinemas2->getnameCinema()?> hora  15:30:00</option>
                            <option value="<?php echo $listCinemas2->getIdCinema();?>+17:00:00"><?php echo $listCinemas2->getnameCinema()?> hora  17:00:00</option>
                            <option value="<?php echo $listCinemas2->getIdCinema();?>+19:30:00"><?php echo $listCinemas2->getnameCinema()?> hora  19:30:00</option>
                            <option value="<?php echo $listCinemas2->getIdCinema();?>+22:00:00"><?php echo $listCinemas2->getnameCinema()?> hora  20:00:00</option>    
                           <?php
                           }
                          }
                  ?>
        </select><br>
    <input type="submit" value="enviar">
    </form>
    
<?php
}
?>
<?php include(VIEWS_PATH."footer.php");?>