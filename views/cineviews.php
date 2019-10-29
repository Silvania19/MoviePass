<?php include(VIEWS_PATH."header.php");?>
<link rel="stylesheet" href="<?php echo FRONT_ROOT;?>front/styles/style2.css">
<nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
      <a class="navbar-brand"><img src="<?php echo FRONT_ROOT;?>/front/img/dog.jpeg" style="width: 70px;"></a>
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

        <li class="nav-item"><a href=""class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#update-cine" >
                    Update cine 
           </button> 
        </li>
        <li class ="nav-item">
                  <a href="<?php echo FRONT_ROOT;?>/views/cinemaview" >Salas</a>
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
                   <label for="adm">idAdministrator</label><input type="text" name="adm"class= "form-control " >  
                   <label for="address">Address<input type="text" name="address" id=""></label>
                   <br>
                   <label for="email" >Email</label><input type="email" name="email"class= "form-control " >
                   <button type="submit" class="btn btn-dark" data dismiss="modal" > add cine </button>
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
                                    <td>Address</td>
                                    <td>Email</td>
                            </tr>

                            <tr class="table-dark ">
                           
                           <?php
                            
                                 foreach($listCines as $cine)
                                 { 
                            ?>     <tr>
                                         <td><?php echo $cine->getName();?></td>
                                         <td><?php echo $cine->getIdUserAdministrator();?></td>
                                         <td><?php echo $cine->getAddress();?></td>
                                        <td><?php echo $cine->getEmail();?></td>
                                    </tr>
                            <?php 
                                 }
                            ?>
                             
                   </table>
</div>
<div class="modal fade" id="update-cine">  

    <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cine/update" method="POST"> 
    
            
        <div class="modal-header"> 
            <h2 class="modal-title">Update cine</h2>
                        
                <button type="button"class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
                    <label for="email" >Email actual</label><input type="email" name="emailUpdate"class= "form-control " >
                   <label for="name" >Name</label><input type="text" name="name" class="form-control">
                   <label for="adm">idAdministrator</label><input type="text" name="adm"class= "form-control " >  
                   <label for="address">Address<input type="text" name="address" id=""></label>
                   <br>
                   <label for="email" >Email</label><input type="email" name="email"class= "form-control " >
                   <button type="submit" class="btn btn-dark" data dismiss="modal" > add cine </button>
        </div>

 
    </form>
</div>
<?php include(VIEWS_PATH."footer.php");?>