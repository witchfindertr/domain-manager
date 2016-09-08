<?php
		require_once "_conf.php";

		

		if (isset ($_GET['id']) and !empty($_GET['id'])){

			$domain_id 	=	strip_tags($_GET['id']);
			$row		=	$db->get_row("SELECT * FROM domain_list Where domain_status = '1' and domain_id = '$domain_id' LIMIT 1");
            
			if ( $db->num_rows == '1'){
				
				$uzanti = $row->domain_ext;
		
		if ( $uzanti == '.com' or $uzanti == '.net' ){
					
				/* Name Server Bulmak İçin*/
				$link		=	trim ( 'http://whois.hosting.info.tr/'.$row->domain_link);
				$baglan 	=	Baglan ($link);
				$regex		=	"/Name Server: ([a-zA-ZÇŞĞÜÖİçşğüöı.0-9]+)/";
				preg_match_all($regex, $baglan, $new);
				
				$domain_ns1 = strip_tags($new[1][0]);
				$domain_ns2 = strip_tags($new[1][1]);
				
				if (isset ($new[1][2])){ $domain_ns3 = strip_tags($new[1][2]); }else{ $domain_ns3 = ""; }
				/* Name Server Bulmak İçin*/
				
				/* Domain Bitiş Süresini Bulmak İçin */
				$regex		= "/(Expiration Date:)( )((?<G>[0-9][0-9]|[0][0-9])-(?<A>[a-z]*))-(?<Y>[0-9][0-9][0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Expiration_Date			=	$value[4][0].'-'.$value[5][0].'-'.$value[6][0];
				$domain_expiration_date		=	strtotime($Expiration_Date);

				/* Domain Bitiş Süresini Bulmak İçin */

				/* Domain Başlangıç Süresini Bulmak İçin */
				$regex		= "/(Creation Date:)( )((?<G>[0-9][0-9]|[0][0-9])-(?<A>[a-z]*))-(?<Y>[0-9][0-9][0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Creation_Date				=	$value[4][0].'-'.$value[5][0].'-'.$value[6][0];
				$domain_creation_date		=	strtotime($Creation_Date);
				

				/* Domain Başlangıç Süresini Bulmak İçin */
				
				/* Name Serverların IP Bulmak İçin */
				$domain_ip1		=	Name_Server_IP($domain_ns1);
				$domain_ip2		=	Name_Server_IP($domain_ns2);
				
				if ($domain_ns3 != ""){
										$domain_ip3		=	Name_Server_IP($domain_ns3);
				}else{
					$domain_ip3	= '';
				}
				/* Name Serverların IP Bulmak İçin */
				
				$domain_update_date		=	time();
				$result					=	$db->query("UPDATE domain_list SET

																			domain_ns1				=		'$domain_ns1',
																			domain_ns2				=		'$domain_ns2',
																			domain_ns3				=		'$domain_ns3',
																			domain_ip1				=		'$domain_ip1',
																			domain_ip2				=		'$domain_ip2',
																			domain_ip3				=		'$domain_ip3',
																			domain_update_date 		= 		'$domain_update_date',
																			domain_expiration_date	=		'$domain_expiration_date',
																			domain_creation_date	=		'$domain_creation_date'

																		 WHERE domain_id = '$domain_id' ");
				
		}

		

		if ( $uzanti == '.org' ){
					
				/* Name Server Bulmak İçin*/
				$link		=	trim ( 'http://whois.hosting.info.tr/'.$row->domain_link);
				$baglan 	=	Baglan ($link);
				$regex		=	"/Name Server: ([a-zA-ZÇŞĞÜÖİçşğüöı.0-9]+)/";
				preg_match_all($regex, $baglan, $new);
				
				$domain_ns1 = strip_tags($new[1][0]);
				$domain_ns2 = strip_tags($new[1][1]);
				
				
				if (isset ($new[1][2])){ $domain_ns3 = strip_tags($new[1][2]); }else{ $domain_ns3 = ""; }
				/* Name Server Bulmak İçin*/
				
				
				/* Domain Bitiş Süresini Bulmak İçin */
				$regex						=	"/(Registry Expiry Date:)( )(?<Y>[0-9][0-9][0-9][0-9])-(?<A>[0-9][0-9])-(?<G>[0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Expiration_Date			=	$value[5][0].'.'.$value[4][0].'.'.$value[3][0];
				$domain_expiration_date		=	strtotime($Expiration_Date);
				/* Domain Bitiş Süresini Bulmak İçin */

				/* Domain Başlangıç Süresini Bulmak İçin */
				$regex						=	"/(Creation Date:)( )(?<Y>[0-9][0-9][0-9][0-9])-(?<A>[0-9][0-9])-(?<G>[0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Creation_Date				=	$value[5][0].'.'.$value[4][0].'.'.$value[3][0];
				$domain_creation_date		=	strtotime($Creation_Date);
				/* Domain Başlangıç Süresini Bulmak İçin */
				
				/* Name Serverların IP Bulmak İçin */
				$domain_ip1		=	Name_Server_IP($domain_ns1);
				$domain_ip2		=	Name_Server_IP($domain_ns2);
				
				if ($domain_ns3 != ""){
										$domain_ip3		=	Name_Server_IP($domain_ns3);
				}else{
					$domain_ip3	= '';
				}
				/* Name Serverların IP Bulmak İçin */
				
				$domain_update_date		=	time();
				$result					=	$db->query("UPDATE domain_list SET

																			domain_ns1				=		'$domain_ns1',
																			domain_ns2				=		'$domain_ns2',
																			domain_ns3				=		'$domain_ns3',
																			domain_ip1				=		'$domain_ip1',
																			domain_ip2				=		'$domain_ip2',
																			domain_ip3				=		'$domain_ip3',
																			domain_update_date 		= 		'$domain_update_date',
																			domain_expiration_date	=		'$domain_expiration_date',
																			domain_creation_date	=		'$domain_creation_date'

																		 WHERE domain_id = '$domain_id' ");
				
		}

		

		if ( $uzanti == '.biz' ){
					
				/* Name Server Bulmak İçin*/
				$link		=	trim ( 'http://whois.hosting.info.tr/'.$row->domain_link);
				$baglan 	=	Baglan ($link);
				$regex		=	"/Name Server:(.*?)([a-zA-ZÇŞĞÜÖİçşğüöı.0-9]+)/";
				preg_match_all($regex, $baglan, $new);
				
				$domain_ns1 = strip_tags($new[2][0]);
				$domain_ns2 = strip_tags($new[2][1]);
				
				
				if (isset ($new[2][2])){ $domain_ns3 = strip_tags($new[2][2]); }else{ $domain_ns3 = ""; }
				/* Name Server Bulmak İçin*/
				
				
				/* Domain Bitiş Süresini Bulmak İçin */
				$regex						=	"/(Domain Expiration Date:)(.*?)([A-Za-z]*)( )([A-Za-z]*) ([0-9][0-9])(.*?)([0-9][0-9][0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Expiration_Date			=	$value[6][0].'.'.$value[5][0].'.'.$value[8][0];
				$domain_expiration_date		=	strtotime($Expiration_Date);
				/* Domain Bitiş Süresini Bulmak İçin */

				

				/* Domain Başlangıç Süresini Bulmak İçin */
				$regex						=	"/(Domain Registration Date:)(.*?)([A-Za-z]*)( )([A-Za-z]*) ([0-9][0-9])(.*?)([0-9][0-9][0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Creation_Date				=	$value[6][0].'.'.$value[5][0].'.'.$value[8][0];
				$domain_creation_date		=	strtotime($Creation_Date);

				/* Domain Başlangıç Süresini Bulmak İçin */
				
				/* Name Serverların IP Bulmak İçin */
				$domain_ip1		=	Name_Server_IP($domain_ns1);
				$domain_ip2		=	Name_Server_IP($domain_ns2);
				
				if ($domain_ns3 != ""){
										$domain_ip3		=	Name_Server_IP($domain_ns3);
				}else{
					$domain_ip3	= '';
				}
				/* Name Serverların IP Bulmak İçin */
				
				$domain_update_date		=	time();
				$result					=	$db->query("UPDATE domain_list SET

																			domain_ns1				=		'$domain_ns1',
																			domain_ns2				=		'$domain_ns2',
																			domain_ns3				=		'$domain_ns3',
																			domain_ip1				=		'$domain_ip1',
																			domain_ip2				=		'$domain_ip2',
																			domain_ip3				=		'$domain_ip3',
																			domain_update_date 		= 		'$domain_update_date',
																			domain_expiration_date	=		'$domain_expiration_date',
																			domain_creation_date	=		'$domain_creation_date'

																		 WHERE domain_id = '$domain_id' ");
				
		}


		if ( $uzanti == '.info' ){
					
				/* Name Server Bulmak İçin*/
				$link		=	trim ( 'http://whois.hosting.info.tr/'.$row->domain_link);
				$baglan 	=	Baglan ($link);
				$regex		=	"/Name Server: ([a-zA-ZÇŞĞÜÖİçşğüöı.0-9]+)/";
				preg_match_all($regex, $baglan, $new);
				
				$domain_ns1 = strip_tags($new[1][0]);
				$domain_ns2 = strip_tags($new[1][1]);
				
				if (isset ($new[1][2])){ $domain_ns3 = strip_tags($new[1][2]); }else{ $domain_ns3 = ""; }
				/* Name Server Bulmak İçin*/
				
				/* Domain Bitiş Süresini Bulmak İçin */
				$regex		= "/(Registry Expiry Date:)(.*?)([0-9][0-9][0-9][0-9])-([0-9][0-9])-([0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Expiration_Date			=	$value[5][0].'.'.$value[4][0].'.'.$value[3][0];
				$domain_expiration_date		=	strtotime($Expiration_Date);
				/* Domain Bitiş Süresini Bulmak İçin */
				

				/* Domain Başlangıç Süresini Bulmak İçin */
				$regex		= "/(Creation Date:)(.*?)([0-9][0-9][0-9][0-9])-([0-9][0-9])-([0-9][0-9])/";
				preg_match_all($regex, $baglan, $value);

				$Creation_Date				=	$value[5][0].'.'.$value[4][0].'.'.$value[3][0];
				$domain_creation_date		=	strtotime($Creation_Date);
				
				
				/* Domain Başlangıç Süresini Bulmak İçin */
				
				/* Name Serverların IP Bulmak İçin */
				$domain_ip1		=	Name_Server_IP($domain_ns1);
				$domain_ip2		=	Name_Server_IP($domain_ns2);
				
				if ($domain_ns3 != ""){
										$domain_ip3		=	Name_Server_IP($domain_ns3);
				}else{
					$domain_ip3	= '';
				}
				/* Name Serverların IP Bulmak İçin */
				
				$domain_update_date		=	time();
				$result					=	$db->query("UPDATE domain_list SET

																			domain_ns1				=		'$domain_ns1',
																			domain_ns2				=		'$domain_ns2',
																			domain_ns3				=		'$domain_ns3',
																			domain_ip1				=		'$domain_ip1',
																			domain_ip2				=		'$domain_ip2',
																			domain_ip3				=		'$domain_ip3',
																			domain_update_date 		= 		'$domain_update_date',
																			domain_expiration_date	=		'$domain_expiration_date',
																			domain_creation_date	=		'$domain_creation_date'

																		 WHERE domain_id = '$domain_id' ");
				
		}
	
				$value	=	"Location:view.php?id=".$domain_id;
				header($value);
				die;	
						
				
			}


		}

		



?>