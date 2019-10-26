<?php include(VIEWS_PATH."header.php"); ?>

<link rel="stylesheet" href="front/styles/style2.css">
   <nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
        <a href=""class="navbar-brand siForm"><img src="front/img/dog.jpeg" style="width: 70px;"></a>
 
            <ul class="nav-item dropdown">
              
                <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT;?>/movie/seeListMovie" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardrop">MOVIES</a>
                </li>
                <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT;?>/views/cine" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardrop">CINES</a>
                </li>
                <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT;?>/movie/seeListMovie" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbardrop">USER</a>
                </li>
            </ul>
         
        </div>
    </li>
    </nav>
  
    <?php include(VIEWS_PATH."footer.php");?>