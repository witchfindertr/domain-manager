<?php

		/* Veri Tabanı Bağlantısı */
		require_once "inc/db.php";
		
		function Days_Remaining($value){
				
				global $db;

				$$value 	=	strip_tags($value);
				$row		=	$db->get_row("SELECT * FROM domain_list Where domain_status = '1' and domain_id = '$value' LIMIT 1");

				$domain_expiration_date		=	 	$row->domain_expiration_date;
				$today_date					=		time();
				
				$fark 	      	=	abs($domain_expiration_date-$today_date);
				$toplantiSure	=	round($fark/60/60/24);

				return $toplantiSure ;

							}


?>