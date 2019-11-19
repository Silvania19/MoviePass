<?php include(VIEWS_PATH."header.php");?>
<?php
  if(isset($controScript))
  {
    if($controScript==1)
    {
?>
      <script>alert('<?php echo $message?>')</script>
<?php  
    }
  }   
if(!isset($control)&& !isset($control2)&& !isset($control3))
{
  include (VIEWS_PATH."nav.php");

?>


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
                          <form action="<?php echo FRONT_ROOT;?>/projection/addparte1" method="post">
                            <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>">
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
                            if($projection->getIdMovie()==$movie->getIdMovie())
                             { 
                ?>
                                <td><?php echo $movie->getTitle(); ?></td>
                                <td> <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded"></td>
                                 <td>
                                    <form action="<?php echo FRONT_ROOT;?>/projection/addparte2" method="post">
                                      <input type="checkbox" name="datos" id="" value="<?php echo   $movie->getIdMovie()."+".$cine->getIdCine();?>">
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
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $projection->getIdProjection(); ?>">
                                      <input type="submit" value="eliminar">
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
                                    <form action="<?php echo FRONT_ROOT;?>/projection/addparte2" method="post">
                                      <input type="checkbox" name="datos" id="" value="<?php echo   $movie->getIdMovie()."+".$cine->getIdCine();?>">
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
                                    <input type="checkbox" name="idProjection" id="" value="<?php echo $cartelera->getIdProjection(); ?>">
                                      <input type="submit" value="eliminar">
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
    include (VIEWS_PATH."nav.php");

?>
    <form action="<?php echo FRONT_ROOT;?>/projection/filterGenre" method="POST">
      Filtar por genero
      <input type="checkbox" name="idCine" value= "<?php echo $idCine;?>"id="">
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
      <button type="submit" class="btn btn-dark"  > buscar </button>
     </form>
     <form action="<?php echo FRONT_ROOT;?>/projection/filterDate" method="POST">
         Filtar por fecha
        <input type="checkbox" name="idCine" value="<?php echo $idCine; ?>" id="">
        <input type="date" name="date"  id="">

        <button type="submit" class="btn btn-dark"> buscar </button>
      </form> <br>
<?php
 if(!empty($listMovies2))
{
    foreach ($listMovies2 as $movie){
     
    
     
 ?>
      <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded">
      <br>
      <form action="<?php echo FRONT_ROOT; ?>/projection/addparte2" method="post">
        <h3>Title: <input type="submit" value=" <?php echo $movie->getTitle(); ?> ">
        <input type="checkbox" name="datos" id="" value="<?php echo $movie->getIdMovie()."+".$idCine;?>">
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
      <input type="checkbox" name="datos" id="" value="<?php echo $movie->getIdMovie()."+".$idCine;?>">
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
        <h3> COMPLE</h3>
        <label for="datos">confirmar</label>
        <input type="checkbox" name="datos" value="<?php echo $datos; ?>" id=""><br>
        <label for="date">Fecha</label>
        <input type="date" name="date">
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
        <h3> COMPLE</h3>
        <label for="datos">confirmar</label>
        <input type="checkbox" name="datos" value="<?php echo $datos; ?>" id=""><br>
        <label for="hour">Hora</label>
        <input type="time" name="hour" id="">
        <label for="hour">Sala</label>
        <select name="idCinema" id="">
      

            <?php 
              if(is_array($listCinemas2))
              {
                  foreach($listCinemas2 as $cinema)
                  {
            ?>
                      <option value="<?php echo $cinema->getIdCinema();?>"><?php echo $cinema->getnameCinema();?></option>
                  <?php
                  }
              }
                    if(is_object($listCinemas2))
                    {
                  ?>
                      <option value="<?php echo $listCinemas2->getIdCinema();?>">"<?php echo $listCinemas2->getnameCinema();?></option>
                  <?php  
                  }
                  ?>
        </select><br>
    <input type="submit" value="enviar">
    </form>
    
<?php
}
?>
<?php include(VIEWS_PATH."footer.php");?>