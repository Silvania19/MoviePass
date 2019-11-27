<?php
include(VIEWS_PATH ."header.php");
include(VIEWS_PATH ."nav.php");

?>

<div class="modal fade" id="remove-user" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">

  <form class="group-form" action="<?php echo FRONT_ROOT; ?>/user/deleteUser" method="POST">
    <h5>¿Esta seguro de eliminar tu cuenta?</h5>

    <label> SI</label> <input type="radio" name="verificacion" class="form-control" value="si" required="">

    <label>NO</label> <input type="radio" name="verificacion" class="form-control" value="no" required="">
    <button type="submit" class="btn btn-dark" data dismiss="modal"> Enviar </button>

  </form>

</div>



<div class="modal fade" id="update">

  <form class="modal-content " action="<?php echo FRONT_ROOT;?>/user/update" method="POST">
    <div class="modal-header">
      <h2 class="modal-title">Actualizar datos</h2>

      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">
      <label>Nombre</label><input type="text" name="name" class="form-control" value="<?php echo $user->getName(); ?>" required="">
      <label>Apellido</label><input type="text" name="lastName" class="form-control " value="<?php echo $user->getLastName(); ?>" required="">
      <label>Dni</label><input type="text" name="dni" class="form-control " value="<?php echo $user->getDni(); ?>" required="">
      <label>Email</label><input type="email" name="email" class="form-control " value="<?php echo $user->getEmail(); ?>" required="">
      <label>Contraseña</label><input type="password" name="password" class="form-control " value="<?php echo $user->getName(); ?>" required="">

      <button type="submit" class="btn btn-dark" data dismiss="modal"> Actualizar datos</button>
    </div>
  </form>
</div>
<center>
  <div class="coteiner w-50">
    <div class="card w-50 " width="40" alt="40">

      <img src="<?php echo FRONT_ROOT; ?>/front/img/usuario.png" alt="500" width="300">
      <div class="card-body w-40 ">
        <h3 class="card-title"><?php echo $user->getName(); ?></h3>

        <p class="card-text">Apellido:<?php echo $user->getLastName(); ?></p>
        <p class="card-text">Dni:<?php echo $user->getDni(); ?></p>
        <p class="card-text">Email:<?php echo $user->getEmail(); ?></p>

        <div class="class-footer">
          <a href="" class="btn btn-primary" type="button" class="btn btn-link" data-toggle="modal" data-target="#update">Actualizar perfil</a>
          <a href="" class="btn btn-primary" type="button" class="btn btn-link" data-toggle="modal" data-target="#remove-user">Eliminar Cuenta</a>

        </div>

      </div>
    </div>

</center>



<?php include(VIEWS_PATH ."footer.php"); ?>