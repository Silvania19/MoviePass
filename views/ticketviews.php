<?php include(VIEWS_PATH.'header.php');
      include(VIEWS_PATH.'nav.php');
?>
<table>
    <?php
    
        if(!empty( $listTickets2))
        {
            if( is_array($listTickets2))
            {
                foreach ($listTickets2 as $ticket)
                { 
                ?>
                     <tr>
                            <td>numero ticket: <?php echo $ticket->getNumberTicket(); ?></td>
                            
                            <td class="text-center"><img src="<?php echo FRONT_ROOT.'/'.$ticket->getQr();?>" width='150' height='100'></td><!-- modificar models y agregar img-->
                    </tr>
                <?php
                }
            }
            if(is_object($listTickets2))
            {?>
                <tr>numero ticket: <?php echo $listTickets2->getNumberTicket(); ?></tr>
    
                <td class="text-center"><img src="<?php echo FRONT_ROOT.'/'.$listTickets2->getQr();?>" width='150' height='100'></td><!-- modificar models y agregar img-->

          <?php
            }
        }
    ?>
    
    </table>

    <?php
       if(isset($cantTicket) && !isset($cantTicketNotSale))
       {
    ?>
            <center>
            <div class="col"  >
            
                    <table style="border-collapse:collapse; border:10px solid gray;"  width="520"; height="200" class=" table-borderer table-primary ">
                     
                            <tr >
                                <td><strong>Cantidad de entradas vendidas</strong></td>
                            </tr>
                            <tr style="border-collapse:collapse; border:5px solid gray;"> 
                                <td> <?php  echo $cantTicket;?></td>
                            </tr>
                       
                    </table>
                </div> 
            </center>
    <?php
       }
       if(isset($cantTicketNotSale))
       {
    ?>
        <center>
            <div class="col"  >
            
                    <table class=" table-borderer table-primary " style="border-collapse:collapse; border:10px solid gray;"  width="520"; height="200" class=" table-borderer table-primary ">
                     
                        <tr style="border-collapse:collapse; border:5px solid gray;">
                            <td><strong>Remanentes</strong></td>
                        </tr>
                        <tr> 
                            <td> <?php  echo $cantTicketNotSale;?></td>
                        </tr>
                    </table>
                </div> 
            </center>
    <?php

       }
    ?>
<?php include(VIEWS_PATH.'footer.php');?>