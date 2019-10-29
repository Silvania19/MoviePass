 <?php
include(VIEWS_PATH."header.php");?>
 <div id="demo" class="carousel slide" data-ride="carousel">
 <!--INDICADORES-->
  <ul class="carousel-indicators">
    <li data-target="demo" data-slide-tp=0 class="active"></li>
    <li data-target="demo" data-slide-tp=1></li>
    <li data-target="demo" data-slide-tp=2></li>
    <li data-target="demo" data-slide-tp=3 ></li>
    <li data-target="demo" data-slide-tp=4></li>
  </ul>

 <!--IMAGENES-- esto es para cada imagen hacer dentro del foreach-->
<div class="carousel-inner">
    <div class="carousel-item">
        <img src="" alt="" class="img-fluid">
            <div  class="carouse-caption">
            <h3>Tituo</h3>
            <p>todo lo q sigue</p>
           </div>
    </div>
</div>
 <!--CONTROLES DE IZ  DER-->
 
 <a href="#demo" class="carousel-control-prev" data-slide="prev"></a><span class="carousel-control-prev-icon"></span>
 <a href="#demo" class="carousel-control-next" data-slide="next"></a><span class="carousel-control-next-icon"></span>
 </div>


<?php
include(VIEWS_PATH."footer.php");?>