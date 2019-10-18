<?php include(VIEWS_PATH."header.php")?>

<h5>Iniciar Sesion</h5>
<body>
<form action="<?php echo BASE;?>user/login" method ="POST">

<input type="text" name="name" id=""> UserName
<input type="password" name="" id=""> Password
<button type ="submit">Sing in</button>

<!--<button type="submit">Register</button>-->

</form>
<!--</body>


<form action="" method ="POST">
<input type="text" name="" id="">Name
<input type="text" name="" id="">Lastname
<input type="email" name="" id="">Email
<input type="text" name="name" id=""> UserName
<input type="password" name="" id=""> Password
<button type="submit">sign up</button>

</form>-->
<?php include(VIEWS_PATH."footer.php")?>