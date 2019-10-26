<?include (VIEWS_PATH."header.php"); ?>
<main>
    <nav class="navbar navbar-expand-sm bg-danger">
        <ul class="navbar-nav">
            <a href=""class="navbar-brand"><img src="front/img/dog.jpeg" style="width: 70px;"></a>
            <li class="nav-item"><a href="" class="nav-link"></a>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cine">
                      Add new cinema
                </button> 
            </li>

            <li class="nav-item"><a href=""class="nav-link"></a>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#remove-cine">
                     Remove cinema 
                </button> 
             </li>

            <li class="nav-item"><a href="" class="nav-link"></a>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cinema">
                     Alter cinema
                </button> 
             </li>

        </ul>
    </nav>

    <form class="modal-content " action="<?php echo FRONT_ROOT;?>/cinema/add" method="POST"> 
        <div class="modal-header"> 
             <h2 class="modal-title">Add cine</h2>
            <button type="button"class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <label for="idCine">elija al cine que quiere agregar</label><br>
            <select name="idCine" id="">
                <?php
                    foreach($listCine2 as $cine)
                    { 
                ?>
                      <option value="<?php echo $cine->getIdCine();?>"><?php echo $cine->getName();?></option>

                 <?php 
                   }
                       
                ?>
            </select><br>
            
            <label for="numberCinema">Number of cinema</label><input type="text" name="numberCinema"class= "form-control " > <br>
            <label for="capacity"> Capacity <input type="text" name="capacity" id=""></label> <br><!--podria ser un arreglo que en cada posicion tenga un numero que le corresponde asiento-->
            <button type="submit" class="btn btn-dark" data dismiss="modal" > Add new cinema </button>
        </div>
    </form>


</main>