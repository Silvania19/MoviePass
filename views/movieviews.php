
<?php
include(VIEWS_PATH."header.php");
 if(!empty($listMovie2))
{
  
   /* $jsonContent= file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=8c491ec0ca4ed58cbf814b5ee1618a44&language=en-US&page=1', true);
    $arrayTodecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
    var_dump($arrayTodecode);*/
     foreach ($listMovie2 as $movie) {
    
?>
   
  <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path();?>" alt= "<?php $movie->getTitle();?> " class="rounded">
  <br>
  <p>Title: <?php echo $movie->getTitle(); ?> </p>
  <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
  <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
  <p>Overview: <?php echo $movie->getOverview(); ?> </p>
  <!-- despues ver si va o no <p>Apto:<?php  /* var_dump($movie->getAdult());
               if($movie->getAdult()==true)
                 {
                  var_dump($movie->getAdult());
                 }
               else
                 {
                  echo "false";
                 }*/

             ?>
    </p>-->
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
            

          
  } ; ?> </p>
  <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
  <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
  <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path();?>" class="rounded">
 

     <?php }}?>

<?php include(VIEWS_PATH."footer.php");?>