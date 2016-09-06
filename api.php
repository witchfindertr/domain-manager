<?php
		require_once "_conf.php";

		function Baglan($url){
												$curl = curl_init();
												curl_setopt($curl, CURLOPT_URL, $url);
												curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
												curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
												$cikti = curl_exec($curl);
												curl_close($curl);
												return str_replace(array("\n","\t","\r"), null, $cikti);
		}

		if (isset ($_GET['id']) and !empty($_GET['id'])){

			$domain_id 	=	strip_tags($_GET['id']);
			$row		=	$db->get_row("SELECT * FROM domain_list Where domain_status = '1' and domain_id = '$domain_id' LIMIT 1");
            
			if ( $db->num_rows == '1'){
				
				$uzanti = $row->domain_ext;
				
				if ( $uzanti = '.com' or $uzanti = '.net' ){
					
				$link		=	trim ( 'http://whois.hosting.info.tr/'.$row->domain_link.$row->domain_ext);
				$baglan 	=	Baglan ($link);
				$regex		=	"/Name Server: ([a-zA-ZÇŞĞÜÖİçşğüöı.0-9]+)/";

				preg_match_all($regex, $baglan, $new);
				
				$domain_ns1 = strip_tags($new[1][0]);
				$domain_ns2 = strip_tags($new[1][1]);
				
				if (isset ($new[1][2])){ $domain_ns3 = strip_tags($new[1][2]); }else{ $domain_ns3 = ""; }
				
				
				$nsv1			= 	"http://www.ipsorgu.com/site_ip_adresi_sorgulama.php?site=".$domain_ns1."#sorgu";
				$ns1baglanti	=	Baglan ($nsv1);
				preg_match_all('#<span style="(.*?)">(.*?)</span>#', $ns1baglanti, $kontrol);
				$domain_ip1		=	$kontrol[2][2];
				
				$nsv2			=	"http://www.ipsorgu.com/site_ip_adresi_sorgulama.php?site=".$domain_ns2."#sorgu";
				$ns2baglanti	=	Baglan ($nsv2);
				preg_match_all('#<span style="(.*?)">(.*?)</span>#', $ns2baglanti, $kontrol);
				$domain_ip2		=	$kontrol[2][2];

				
				if ($domain_ns3 != ""){
					
					$nsv3				=	"http://www.ipsorgu.com/site_ip_adresi_sorgulama.php?site=".$domain_ns3."#sorgu";
					$ns3baglanti		=	Baglan ($nsv3);
					preg_match_all('#<span style="(.*?)">(.*?)</span>#', $ns3baglanti, $kontrol);
					$domain_ip3			=	$kontrol[2][2];

				}else{
					
					$domain_ip3	= '';
				}
				

				$result			=		$db->query("UPDATE domain_list SET 
																			domain_ns1		=		'$domain_ns1',
																			domain_ns2		=		'$domain_ns2',
																			domain_ns3		=		'$domain_ns3',
																			domain_ip1		=		'$domain_ip1',
																			domain_ip2		=		'$domain_ip2',
																			domain_ip3		=		'$domain_ip3'

																		 WHERE domain_id = '$domain_id' ");
				
				}
				
				$value	=	"Location:view.php?id=".$domain_id;
				header($value);
				die;
				
				
						
				
			}


		}

		



?>