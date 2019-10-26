<?php include(VIEWS_PATH."header.php");?>
<link rel="stylesheet" href="front/styles/style2.css">
<nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
      <a href=""class="navbar-brand"><img src="front/img/dog.jpeg" style="width: 70px;"></a>
        <li class="nav-item"><a href="" class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cine">
                      Add cine 
           </button> 
        </li>

        <li class="nav-item"><a href=""class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#remove-cine">
                     Remove cine 
           </button> 
        </li>

        <li class="nav-item"><a href="<?php echo FRONT_ROOT;?>/cine/alter"class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cine">
                     Alter cine 
           </button> 
        </li>
        <li class="nav-item"><a href="<?php echo FRONT_ROOT;?>/views/cinemaview" class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#-cine">
                     Salas 
           </button> 
        </li>

      </ul>
</nav>


<a href="<?php echo FRONT_ROOT;?>/views/cinemaview">sala</a>
 
<div class="modal fade" id="add-cine">  

    <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cine/add" method="POST"> 
    
            
        <div class="modal-header"> 
            <h2 class="modal-title">Add cine</h2>
                        
                <button type="button"class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                   <label for="name" >Name</label><input type="text" name="name" class="form-control">
                   <label for="adm">idAdministrator</label><input type="text" name="adm"class= "form-control " >   
                     <br>
                     <br>
                  <!-- <select class="" id="">
                      <option value="1" name="location">Mar del plata</option> 
                      <option value="2"n name="location">Tu vieja</option>
                      <option value="3" name="location">Tu viejo</option>
                      <option value="4" name="location">Tu vieja y tu viejo en tanga</option>
                   </select><br>-->
                   <label for="location"> <input type="text" name="location" id="">Localidad</label>
                   <br>
                   <label for="email" >Email</label><input type="email" name="email"class= "form-control " >
                   <button type="submit" class="btn btn-dark" data dismiss="modal" > Sign up </button>
        </div>

 
    </form>
</div>

<div class="modal fade" id="remove-cine">
    <div class="modal-header">
        <h2 class="modal-title">Remove cine</h2>
                        
         <button type="button"class="close" data-dismiss="modal">&times;</button>
     </div>
            <form action="<?php echo FRONT_ROOT;?>/cine/remove" method="POST" >
                     <div class="modal-body">
                            <label for="email" >Email</label><input type="email" name="email"class= "form-control " >
                            <button type="submit" class="btn btn-dark" data dismiss="modal" > Remove cine</button>

                      </div>
              </form>
    
</div>

<div class="col" style="border:1px solid gray;">
       
                   <table class="table-striped">
                            <tr><h2>Cines disponibles</h2></tr>
                            <tr class="table-primary">
                                    <td>Nombre</td>
                                    <td>Administrator</td>
                                    <td>Location</td>
                                    <td>Email</td>
                            </tr>

                            <tr class="table-dark ">
                            <?php
                                  foreach($listCines as $cines)
                                 { 
                             ?>     <tr>
                                         <td><?php echo $cines->getName();?></td>
                                         <td><?php echo $cines->getIdUserAdministrator();?></td>
                                         <td><?php echo $cines->getIdLocation();?></td>
                                        <td><?php echo $cines->getEmail();?></td>
                                    </tr>
                            <?php 
                                 }
                       
                             ?>
                          
                  
                   </table>
</div>

<?php include(VIEWS_PATH."footer.php");?>