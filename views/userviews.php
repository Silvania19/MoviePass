
<?php include(VIEWS_PATH."header.php");?>

<link rel="stylesheet" href="<?php echo FRONT_ROOT;?>/front/styles/style2.css">
<nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
      <a href=""class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
        <li class="nav-item"><a href="" class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#update">
                      Update your perfil
           </button> 
        </li>

           
                    
            
           <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT; ?>/user/deleteUser" class="nav-link"> Remove account </a>
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
 
<div class="modal fade" id="update">  

<form class="modal-content " action="<?php echo FRONT_ROOT;?>/user/update" method="POST">
            <div class="modal-header">
                <h2 class="modal-title">update</h2>
           
                 <button type="button"class="close" data-dismiss="modal"><span>&times;</span></button> 
            </div>
             <div class="modal-body">
                <label >Name</label><input type="text" name="name" class="form-control">
                <label >Lastname</label><input type="text" name="lastName"class= "form-control " >
                <label >Dni</label><input type="text" name="dni"class= "form-control " >
                <label >Email</label><input type="email" name="email"class= "form-control " >
                <label >Password</label><input type="password" name="password"class= "form-control " >
                
                <button type="submit" class="btn btn-dark" data dismiss="modal" > update </button>
            </div>
        </form>
</div>

<?php include(VIEWS_PATH."footer.php");?>