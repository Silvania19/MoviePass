<?php include(VIEWS_PATH."header.php");?>

<!--<link rel="stylesheet" href="<?php echo FRONT_ROOT;?>/front/styles/style2.css">-->
<nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
      <a href=""class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
      
       

    
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


 <div class="modal fade" id="add-adm">  

<form class="modal-content " action="<?php echo FRONT_ROOT;?>/adminstrator/addAdministrator" method="POST">
            <div class="modal-header">
                <h2 class="modal-title">Information of new administrator</h2>
           
                 <button type="button"class="close" data-dismiss="modal"><span>&times;</span></button> 
            </div>
             <div class="modal-body">
                <label >Name</label><input type="text" name="name" class="form-control">
                <label >Lastname</label><input type="text" name="lastName"class= "form-control " >
                <label >Dni</label><input type="text" name="dni"class= "form-control " >
                <label >Email</label><input type="email" name="email"class= "form-control " >
                <label >Password</label><input type="password" name="password"class= "form-control " >
                
                <button type="submit" class="btn btn-dark" data dismiss="modal" > add new adminstrator </button>
            </div>
        </form>
</div>

<center>
<div class="coteiner w-50">
    <div class="card w-50 " width="40" alt="40">
 
      <img src="<?php echo FRONT_ROOT;?>/front/img/usuario.png" alt="500" width="300">
        <div class="card-body w-40 ">
          <h3 class="card-title"><?php echo $user->getName();?></h3>
          
          <p  class="card-text">Apellido:<?php echo $user->getLastName();?></p>
          <p class="card-text">Dni:<?php echo $user->getDni();?></p>
          <p class="card-text">Email:<?php echo $user->getEmail();?></p>
         
         <div class="class-footer">
            <a href="" class="btn btn-primary"type="button" class="btn btn-link" data-toggle="modal" data-target="#update">Modificar perfil</a>


            <a href="" class="btn btn-primary"type="button" class="btn btn-link" data-toggle="modal" data-target="#eliminar">Eliminar usuario</a>
        
            <a href="" class="btn btn-primary"type="button" class="btn btn-link" data-toggle="modal" data-target="#add-adm">Agregar administrador</a>
          
          </div>
      
      </div>
</div>

</center>
<div class="modal fade" id="eliminar"tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true" >

<form action="<?php echo FRONT_ROOT;?>/user/deleteUser" method="POST">
<h5>¿Esta seguro de eliminar usuario?</h5>

<label > SI</label> <input type="checkbox" name="verificacion" class="form-control" value="si">
           
  <label>NO</label>  <input type="checkbox" name="verificacion" class="form-control" value="no">
  <button type="submit" class="btn btn-dark" data dismiss="modal" > Enviar </button>
           
     


</form>

</div>
<?php include(VIEWS_PATH."footer.php");?>