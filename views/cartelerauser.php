<?php include(VIEWS_PATH."header.php");?>

<nav class="navbar navbar-expand-sm bg-danger">
    <a href=""class="navbar-brand "><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
        <ul class="navbar-nav ml-auto">
           
             <li class ="nav-item  ">
                <div class="dropdown">
                   <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown">USUARIO</button>
                    <div class="dropdown-menu">
                     <a href="" class="dropdown-item"><?php echo $_SESSION['user']->getName();?></a>
                     <a href="<?php echo FRONT_ROOT;?>/views/user" class="dropdown-item">Ver Perfil</a>
                     <a href="<?php echo FRONT_ROOT;?>/views/deleteSession" class="dropdown-item">Salir</a>
               </div>
               </div>
             </li>

        </ul>
    </nav>

<form action="<?php echo FRONT_ROOT;?>/movie/filterGenre" method="POST">
   Filtar por genero <br>
   <select name="idGenre" >
        <?php
        foreach($listGenres2 as $valor)
        {?>
        <option value=<?php echo $valor->getIdGenres();?>><?php echo $valor->getNameGenres(); ?></option>
      <?php    
        } 
        ?>
   </select>
   <button type="submit" class="btn btn-dark"  > Buscar </button>
 
 </form>
 <form action="<?php echo FRONT_ROOT;?>/movie/filterDate" method="POST">
   Filtar por fecha <br>
  <input type="date" name="date" id="">
   <button type="submit" class="btn btn-dark"  > Buscar </button>
 
 </form> <br>
<?php
 if(!empty($listMovie2))
{
    foreach ($listMovie2 as $movie){
     
    
     if($this->exist($movie->getIdMovie(), $idCine)==false){
 ?>
     

  <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded">
  <br>
  <form action="<?php echo FRONT_ROOT; ?>/projection/addparte2" method="post">
  <h3>Title: <input type="submit" value=" <?php echo $movie->getTitle(); ?> ">
  <input type="checkbox" name="datos" id="" value="<?php echo $movie->getIdMovie()."-".$idCine;?>">
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
    



     <?php }}}?>
  <?php   
     if(!empty($filter))
{
  
  
     foreach ($filter as $movie) {

    
?>

  <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded">
  <br>
  
  <h3>Title: <?php echo $movie->getTitle(); ?> </h3>
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
     
 


/////////////////////////////

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
                      
                  
                   </tr>
                  
                    <tr>
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
                                           <td> <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded"></td>
                                        
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
                          <?php }
                        
                        } ?>
                
                <?php 
                     }
                ?>
                  </tr>  
       </table>
</div>
<?php
}

<?php include(VIEWS_PATH."header.php");?>