
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
  <p>Adult: <?php echo $movie->getAdult(); ?> </p>
  <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
  <p>Genres : <?php echo $movie->getGenres_ids(); ?> </p>
  <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
  <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
  <p>Video: <?php echo $movie->getVideo(); ?> </p>
  
 

     <?php }}?>

<?php include(VIEWS_PATH."footer.php");?>