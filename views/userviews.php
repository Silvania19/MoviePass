
<?php include(VIEWS_PATH."header.php");?>

<link rel="stylesheet" href="<?php echo FRONT_ROOT;?>/front/styles/style2.css">
<nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
      <a href=""class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
        <li class="nav-item"><a href="" class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cine">
                      Update your perfil
           </button> 
        </li>

<<<<<<< HEAD
           
                    
            
           <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT; ?>/user/deleteUser" class="nav-link"> Remove account </a>
=======
        <li class="nav-item"><a href="<?php echo FRONT_ROOT; ?>/user/deleteUser"class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#remove-user">
                     Remove account 
           </button> 
>>>>>>> f81a6c67683518865d914a269580d65218b51c64
        </li>
      </ul>
</nav>

<div class="modal fade" id="remove-user">
    <div class="modal-header">
        <h2 class="modal-title">Remove user</h2>
                        
         <button type="button"class="close" data-dismiss="modal"><span>&times;</span></button>
     </div>
            <form action="<?php echo FRONT_ROOT;?>/user/remove" method="POST" >
                     <div class="modal-body">
                            <label for="email" >Email</label><input type="text" name="email"class= "form-control " >
                            <button type="submit" class="btn btn-dark" data dismiss="modal" > Remove user</button>

                      </div>
              </form>
    
</div>
<?php include(VIEWS_PATH."footer.php");?>