<?php include(VIEWS_PATH."header.php");?>
<?php
  if(isset($controlScript))
  {
    if($controlScript==1)
    {
?>
      <script>alert('<?php echo $message?>')</script>
<?php     
   }
  } 
?>
      <main class="login">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <header class="text-center">
                <h1 class="bg-primary display-1 ">MOVIE PASS</h1>
              </header>   
      
            </div>
          </div>
        </div>
        <?php  include(VIEWS_PATH."login.php");?>
      </main>

<?php include(VIEWS_PATH."footer.php");?>