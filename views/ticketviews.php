<?php include(VIEWS_PATH.'header.php');?>
<table>
    <?php
    var_dump($listTickets2);
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
<?php include(VIEWS_PATH.'footer.php');?>