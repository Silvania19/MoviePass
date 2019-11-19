<?php include(VIEWS_PATH."header.php"); 
if(isset($controlScript))
{
  if($controlScript==1)
  {
?>
    <script>alert('<?php echo $message?>')</script>
<?php  
   }
}
   if($user->getIdRol()==2)  
   {
?>


      <nav class="navbar navbar-expand-sm bg-danger"> 
        <a href=""class="navbar-brand "><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>

        <ul class="navbar-nav ml-auto">
              
              
          <li class ="nav-item">
            <a href="<?php echo FRONT_ROOT;?>/movie/seeListMovie" class="nav-link " >PELICULAS</a>
          </li>
          <li class ="nav-item">
            <a href="<?php echo FRONT_ROOT;?>/views/cine" class="nav-link " >CINES</a>
          </li>
          <li>
            <a href="<?php echo FRONT_ROOT;?>/views/cartelera" class="nav-link">CARTELERA</a>
          </li>
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
    <?php 
     } 
     
     if($user->getIdRol()==1)
     {
    ?>
       <nav class="navbar navbar-expand-sm bg-danger"> 
        <a href=""class="navbar-brand "><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>

        <ul class="navbar-nav ml-auto">
              
              
          <li class ="nav-item">
              <a href="<?php echo FRONT_ROOT;?>/movie/seeListMovie" class="nav-link " >PELICULAS</a>
          </li>
          <li class ="nav-item">
              <a href="<?php echo FRONT_ROOT;?>/views/cine" class="nav-link " >CINES</a>
          </li>
          <li>
              <a href="<?php echo FRONT_ROOT;?>/views/cartelerauser" class="nav-link">CARTELERA</a>
          </li>
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

          <form action="<?php echo FRONT_ROOT;?>/projectionuser/filterGenre" method="POST">
            Filtar por genero
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
          <form action="<?php echo FRONT_ROOT;?>/projectionuser/filterDateProjection" method="POST">
            Filtar por fecha
            <input type="date" name="date"  id="" required="">
            <button type="submit" class="btn btn-dark"> buscar </button>
          </form> <br>

      <?php 
       if(!empty($movies))
        {   
          foreach($movies as $movie)
          {
      ?>
            <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded"><br>
            
            <form action="<?php echo FRONT_ROOT; ?>/projectionuser/carteleraxMovie" method="post">
                 <h3>Title: <input type="submit" value=" <?php echo $movie->getTitle(); ?> ">
                 <input type="checkbox" name="datos" id="" value="<?php  echo $movie->getIdMovie();?>" required="" >
                 </h3>
            </form>
            <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
            <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
            <p>Overview: <?php echo $movie->getOverview(); ?> </p>
          
            <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
            <p>Genres : 
                   <?php
                            
                      $arrayIdG= $movie->getGenre_ids();
                      foreach ($arrayIdG as $genre)
                      {
                        foreach($listGenres2 as $valor)
                        {
                         if($valor->getIdGenres() == $genre)
                         {
                             echo $valor->getNameGenres();
                         }
                         
                        }
                      
          
                    
                       } 
                   ?>
             </p>
            <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
            <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
            
            <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded">
           <?php
          }
        }
        else 
        {
          ?>
             <img src="<?php echo FRONT_ROOT?>/front/img/perro2.jpg" class="rounded center",  style="width: 600px; higth: 500px;"><br>
             <p> <strong> No sabes cuanto lo siento bro, <br> pero no hay projecciones de pelicuals cargadas, la vida es injusta</strong></p>
          <?php
        }
        if(!empty($filter))
        {
           if(is_array($filter))
           {
             foreach($filter as $movie)
             {
        ?>
                 <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded"><br>
            
            <form action="<?php echo FRONT_ROOT; ?>/projectionuser/moviesxCines" method="post"><!--esta direccion esta mal ahi que mandarlo a un metodo de la cartelera que le muestre, solo
            las funciones de la pelicula que se esta leyendo-->
                 <h3>Title: <input type="submit" value=" <?php echo $movie->getTitle(); ?> ">
                 <input type="checkbox" name="datos" id="" value="<?php echo $movie->getIdMovie()?>" required=""><!-- creo que esta bien porque con el idDe la pelicula podriamos mostrar todas las funciones
                 de esa pelicula en el futuro-->
                 </h3>
            </form>
            <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
            <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
            <p>Overview: <?php echo $movie->getOverview(); ?> </p>
          
            <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
            <p>Genres : 
                   <?php
                            
                      $arrayIdG= $movie->getGenre_ids();
                      foreach ($arrayIdG as $genre)
                      {
                        foreach($listGenres2 as $valor)
                        {
                         if($valor->getIdGenres() == $genre)
                         {
                             echo $valor->getNameGenres();
                         }
                         
                        }
                      
          
                    
                       } 
                   ?>
             </p>
            <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
            <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
            
            <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded">
           
        <?php
             }
           }

        }
     }
           ?>
  
<?php include(VIEWS_PATH."footer.php");?>