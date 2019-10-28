
<?php include(VIEWS_PATH."header.php");?>

<link rel="stylesheet" href="front/styles/style2.css">
<nav class="navbar navbar-expand-sm bg-danger">
      <ul class="navbar-nav">
      <a href=""class="navbar-brand"><img src="front/img/dog.jpeg" style="width: 70px;"></a>
        <li class="nav-item"><a href="" class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add-cine">
                      Update your perfil
           </button> 
        </li>

        <li class="nav-item"><a href="<?php echo FRONT_ROOT; ?>/user/deleteUser"class="nav-link"></a>
           <button type="button" class="btn btn-link" data-toggle="modal" data-target="#remove-cine">
                     Remove account 
           </button> 
        </li>
      </ul>
</nav>

<?php include(VIEWS_PATH."footer.php");?>