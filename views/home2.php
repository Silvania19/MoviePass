<?php include(VIEWS_PATH."header.php"); 
      include(VIEWS_PATH."nav.php");
?>


   <nav class="navbar navbar-expand-sm bg-danger">
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

                <li class ="nav-item dropdown float-right">
               <button type="button" class="btn btn-primary" data-toggle="dropdown">USUARIO</button>
              </li>
               
     </ul>
         
       
    
  </nav>
    
  
    <?php include(VIEWS_PATH."footer.php");?>