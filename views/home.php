<?php include(VIEWS_PATH."header.php");
?>

 

<main class="login">
<link rel="stylesheet" href="front/styles/style2.css">
<div class="container-fluid">
        <div class="row">
            <div class="col">
           <header class="text-center">
<h1>   <p class="bg-primary display-1 ">MOVIE PASS</p> </h1>
</header>   
  <img src="front/img/dog.jpeg" class=" float-right rounded-circle"> 
  </div>
    </div>
</div>
    
<?php  include(VIEWS_PATH."login.php");
 use controllers\MovieControllers as movieC;
 $list=new movieC();
 $list->seeListMovie
 ?>
</main>
<?php include(VIEWS_PATH."footer.php");?>




