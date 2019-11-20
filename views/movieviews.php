<?php
include(VIEWS_PATH . "header.php");
?>
<form action="<?php echo FRONT_ROOT; ?>/movie/filterGenre" method="POST">
  Filtar por genero <br>
  <select name="idGenre">
    <?php
    foreach ($listGenres2 as $valor) { ?>
      <option value=<?php echo $valor->getIdGenres(); ?>><?php echo $valor->getNameGenres(); ?></option>
    <?php
    }
    ?>
  </select>
  <button type="submit" class="btn btn-dark"> search </button>

</form>
<form action="<?php echo FRONT_ROOT; ?>/movie/filterDate" method="POST">
  Filtar por fecha <br>
  <input type="date" name="date" id="">
  <button type="submit" class="btn btn-dark"> search </button>

</form> <br>

<?php

if (!empty($listMovie2)) {

  /* $jsonContent= file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=8c491ec0ca4ed58cbf814b5ee1618a44&language=en-US&page=1', true);
    $arrayTodecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
    var_dump($arrayTodecode);*/

  foreach ($listMovie2 as $movie) {
    ?>



    <img class="img-fluid" src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path(); ?>" alt="<?php $movie->getTitle(); ?> " class="rounded">

    <br>

    <h3>Title: <?php echo $movie->getTitle(); ?> </h3>
    <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
    <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
    <p>Overview: <?php echo $movie->getOverview(); ?> </p>

    <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
    <p>Genres : <?php

                    $arrayIdG = $movie->getGenre_ids();
                    foreach ($arrayIdG as $genre) {
                      foreach ($listGenres2 as $valor) {
                        if ($valor->getIdGenres() == $genre) {
                          echo $valor->getNameGenres();
                        }
                      }
                    }  ?> </p>
    <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
    <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>

    <a href="#demo" class="carousel-control-prev" data-slide="prev"></a><span class="carousel-control-prev-icon"></span>
    <a href="#demo" class="carousel-control-next" data-slide="next"></a><span class="carousel-control-next-icon"></span>

    <!---<img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path(); ?>" class="rounded">
    --->



<?php }
} ?>

<?php
if (!empty($filter)) {


  foreach ($filter as $movie) {


    ?>

    <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getPoster_path(); ?>" alt="<?php $movie->getTitle(); ?> " class="rounded">
    <br>

    <h3>Title: <?php echo $movie->getTitle(); ?> </h3>
    <p>Original Title: <?php echo $movie->getOriginal_title(); ?> </p>
    <p>Original lenguage: <?php echo $movie->getOriginal_lenguage(); ?> </p>
    <p>Overview: <?php echo $movie->getOverview(); ?> </p>

    <p>Release date: <?php echo $movie->getRelease_date(); ?> </p>
    <p>Genres : <?php

                    $arrayIdG = $movie->getGenre_ids();
                    foreach ($arrayIdG as $genre) {
                      foreach ($listGenres2 as $valor) {
                        if ($valor->getIdGenres() == $genre) {
                          echo $valor->getNameGenres();
                        }
                      }
                    }  ?> </p>
    <p>Popularity: <?php echo $movie->getPopularity(); ?> </p>
    <p>Vote Count: <?php echo $movie->getVote_count(); ?> </p>
    <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie->getBackdrop_path(); ?>" class="rounded">




<?php }
} ?>


<?php include(VIEWS_PATH . "footer.php"); ?>