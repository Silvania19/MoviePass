<nav class="navbar navbar-expand-sm bg-dark"> 
        <a href=""class="navbar-brand "><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>

        <ul class="navbar-nav ml-auto">
              
              
            <li class ="nav-item">
              <a href="<?php echo FRONT_ROOT;?>/views/seeShopping" class="nav-link " >CARRITO DE COMPRAS</a>
            </li>
            <li class ="nav-item  ">
                
                <button type="button" class="btn btn-primary">
                    <a href="<?php echo FRONT_ROOT?>/views/home2" style="color:white">Home</a>
                </button>    
                
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


  