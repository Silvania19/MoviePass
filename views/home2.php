<?php include(VIEWS_PATH."header.php"); ?>

   <nav class="navbar navbar-expand-sm bg-danger">
          <a href=""class="navbar-brand siForm"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
      <ul class="navbar-nav ml-auto">

 
           
                <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT;?>/movie/seeListMovie" class="nav-link " >PELICULAS</a>
                </li>
                <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT;?>/views/cine" class="nav-link " >CINES</a>
                </li>
               
                <a href="<?php echo FRONT_ROOT;?>/views/cartelera" class="nav-link">CARTELERA</a>
                </li>

                <li class ="nav-item dropdown float-right">
               <button type="button" class="btn btn-primary" data-toggle="dropdown">USUARIO</button>
               <div class="dropdown-menu">
               <a href="" class="dropdown-item"><?php echo $_SESSION['user']->getName();?></a>
               <a href="<?php echo FRONT_ROOT;?>/views/user" class="dropdown-item">Ver Perfil</a>
               <a href="<?php echo FRONT_ROOT;?>/views/deleteSession" class="dropdown-item">Salir</a>
               </div>
                </li>
               
            </ul>
         
        </div>
    </li>
    </nav>
    
  
    <?php include(VIEWS_PATH."footer.php");?>