<?php include(VIEWS_PATH . "header.php"); ?>
<main class="login">
    <form class="loginForm" action="<?php echo FRONT_ROOT; ?>/user/login" method="POST">
        <header class="text-center">
            <h3 class="bg-light display-5 ">Iniciar sesion</h3>
        </header>
        <div class="form-group mark">
            <label for="name"> Email </label>
            <input type="email" name="email" class="form-control " required="">
        </div>
        <div class="form-group mark">
            <label for="password"> Contraseña</label>
            <input type="password" name="password" class="form-control form-control-lg" required="">
        </div>
        <div class="actions form-group mark">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#sign-up"> Registrarse</a>
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#facebook">Inicie con Facebook</a>

               <button type="submit" class="btn btn-primary">Iniciar sesion </button> 

         </div>
          
    
         
        </div>

    </form>


    <div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content " action="<?php echo FRONT_ROOT; ?>/user/signUp" method="POST">
                <div class="modal-header">
                    <h2 class="modal-title">Registrarse</h2>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" required="">
                    <label>Apellido</label>
                    <input type="text" name="lastName" class="form-control " required="">
                    <label>Dni</label>
                    <input type="text" name="dni" class="form-control " required="">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control " required="">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control " required="">

                    <button type="submit" class="btn btn-dark" data dismiss="modal"> Registrarse </button>
                </div>
            </form>
        </div>
    </div>

        <div class="modal fade" id="facebook" tabindex="-1" role="dialog" aria-labelledby="facebook" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content " action="<?php echo FRONT_ROOT; ?>/user/facebook" method="POST">
                    <div class="modal-header">
                        <h2 class="modal-title">Facebook</h2>

                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label>Correo electronico</label>
                        <input type="email" name="email" class="form-control" required="">
                        <label>Contraseña</label>
                        <input type="password" name="password"  class="form-control" required="">

                        <button type="submit" class="btn btn-dark" data dismiss="modal"> Iniciar con Facebook</button>
                    </div>
                 </div>
                </form>
           
        </div>
</main>

<?php include(VIEWS_PATH . "footer.php") ?>