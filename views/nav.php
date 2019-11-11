<?php include(VIEWS_PATH."header.php"); ?>
    <nav class="navbar navbar-expand-sm bg-danger">
        <ul class="navbar-nav ml-auto">
           
             <li class ="nav-item dropdown ">
               <button type="button" class="btn btn-primary" data-toggle="dropdown">USUARIO</button>
               <div class="dropdown-menu">
                     <a href="" class="dropdown-item"><?php echo $_SESSION['user']->getName();?></a>
                     <a href="<?php echo FRONT_ROOT;?>/views/user" class="dropdown-item">Ver Perfil</a>
                     <a href="<?php echo FRONT_ROOT;?>/views/deleteSession" class="dropdown-item">Salir</a>
               </div>
             </li>

        </ul>
    </nav>
<?php include(VIEWS_PATH."footer.php"); 