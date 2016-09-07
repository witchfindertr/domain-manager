<?php
 		require_once "_conf.php";
 		if ( isset($_GET['id']) and !empty($_GET['id']) ){ 

			$domain_id	=	$_GET['id'];
 			$row        =   $db->get_row("DELETE FROM domain_list WHERE domain_id = '$domain_id' LIMIT 1");
 			
 			header("Location:tables.php?alert=6");
            die; 			

 		}
?>