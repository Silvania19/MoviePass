<?php include(VIEWS_PATH."header.php"); 
      include(VIEWS_PATH."nav.php");
?>


   <nav class="navbar navbar-expand-sm bg-danger">
          <a href=""class="navbar-brand siForm"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
      <ul class="navbar-nav ml-auto">


<ion-header>
    <ion-toolbar>
          <ion-buttons slot="start">
                 <ion-back-button > </ion-back-button> 
           </ion-buttons>
            <ion-title>Volver </ion-title>
     </ion-toolbar>
</ion-header>


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