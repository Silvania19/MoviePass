<?php include(VIEWS_PATH.'header.php');?>
<table>
    
    <tr>numero ticket: <?php echo $newTicket->getNumberTicket(); ?></tr>
    
    <td class="text-center"><img src="<?php echo FRONT_ROOT.'/'.$newTicket->getQr();?>" width='150' height='100'></td><!-- modificar models y agregar img-->
</table>
<?php include(VIEWS_PATH.'footer.php');?>