<?php include(VIEWS_PATH."header.php");?>
<?php
    
    if($user->getIdRol()==2)
     {
?>

<nav class="navbar navbar-expand-sm bg-danger"> 
     <a class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item"><a href="" class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cine">
                      Add cine 
           </button> 
        </li>


      </ul>
</nav>



 
<div class="modal fade" id="add-cine">  

    <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cine/add" method="POST"> 
    
            
        <div class="modal-header"> 
            <h2 class="modal-title">Add cine</h2>
                        
                <button type="button"class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                   <label for="name" >Name</label><input type="text" name="name" class="form-control">
                    
                   <label for="address">Address<input type="text" name="address" id=""></label>
                   <br>
                  
                   <button type="submit" class="btn btn-dark" data dismiss="modal" > add cine </button>
        </div>

 
    </form>
</div>



<div class="col" style="border:1px solid gray;">
       
  <table class="table table-borderer table-hover ">
    <tr><h2>Cines disponibles</h2></tr>
    <tr class="table-primary">
        <td>Nombre</td>
        <td>Administrator</td>
        <td>Address</td>
                                   
    </tr>

     <tr class="table-dark ">
                           
      <?php
                            
        foreach($listCines as $cine)
          { 
      ?>     
      <tr>
        <td><?php echo $cine->getName();?></td>
        <td><?php echo $cine->getIdUserAdministrator();?></td>
        <td><?php echo $cine->getAddress();?></td>
        <td>
            <form action="<?php echo FRONT_ROOT;?>/views/cine2" method="post">
               <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>">
               <input type="submit" value="Ver cine">
            </form>
        </td>
       </tr>
        <?php 
          }
        ?>
                             
   </table>
</div>
 

<?php 
  

?>



 <?php 
 } 
 if($user->getIdRol()==1)
 {
?>

<nav class="navbar navbar-expand-sm bg-danger"> 
<a class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item"><a href="" class="nav-link"></a>

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
<div class="col" style="border:1px solid gray;">
       
       <table class="  table-borderer table-hover ">
                <tr><h2>Cines disponibles</h2></tr>
                <tr class="table-primary">
                        <td>Nombre</td>
                        <td>Administrator</td>
                        <td>Address</td>
                        
                </tr>

                <tr class="table-dark ">
               
               <?php
                
                     foreach($listCines as $cine)
                     { 
                ?>     <tr>
                             <td><?php echo $cine->getName();?></td>
                             <td><?php echo $cine->getIdUserAdministrator();?></td>
                             <td><?php echo $cine->getAddress();?></td>
                         
                            <td>
                            <form action="<?php echo FRONT_ROOT;?>/cine/remove" method="post">
                              <input type="checkbox" name="idCine" id="" value="<?php echo $cine->getIdCine(); ?>">
                              <input type="submit" value="verCartera">
                            </form>
                            </td>
                        </tr>
                <?php 
                     }
                ?>
                 
       </table>
</div>
<?php 
}?>
<?php include(VIEWS_PATH."footer.php");?>