<?php

		/* Veri Tabanı Bağlantısı */
		require_once "inc/db.php";
		
		function Baglan($url){
												$curl = curl_init();
												curl_setopt($curl, CURLOPT_URL, $url);
												curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
												curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
												$cikti = curl_exec($curl);
												curl_close($curl);
												return str_replace(array("\n","\t","\r"), null, $cikti);
		}

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
		function Name_Server_IP($value){

				/* Name Serverların IP Bulmak İçin */
				$nsv1			= 	"http://www.ipsorgu.com/site_ip_adresi_sorgulama.php?site=".$value."#sorgu";
				$ns1baglanti	=	Baglan ($nsv1);
				preg_match_all('#<span style="(.*?)">(.*?)</span>#', $ns1baglanti, $kontrol);
				$Domain_IP		=	$kontrol[2][2];

				return $Domain_IP;



		}


?>