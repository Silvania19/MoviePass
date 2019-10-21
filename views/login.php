<?php include(VIEWS_PATH."header.php");?>

<body>
<h5>Iniciar Sesion</h5>


<!--<form action="<?php echo FRONT_ROOT;?>/user/login" method ="post" >

<input type="email" name="email" id=""> Email
<input type="password" name="password" id=""> Password
<button type ="submit"->Sing in</button> 




</form>



<button type="submit">Register</button>--> 


</body>


<form action="<?php echo FRONT_ROOT;?>/user/signUp" method ="POST">
<input type="text" name="name" id="">Name
<input type="text" name="lastName" id="">Lastname
<input type="text" name="dni" id="">Dni
<input type="email" name="email" id="">Email
<input type="text" name="userName" id=""> UserName
<input type="password" name="password" id=""> Password
<button type="submit">sign up</button>

</form></div>
<?php include(VIEWS_PATH."footer.php")?>