<?php
$lfiles = array();

			$cnts = "
			+1+WIRE+CONTRACT+AB1234567+ICRR+110113+084500+MK7 8LE+SENDERS REF+1 ITEMS+++\r\n
			+1+WIRE+CONTRACT+AB1234567+I139+110113+125000+MANCHESTER+SENDERS REF+1 ITEMS+++\r\n
			+1+WIRE+CONTRACT+AB1234567+I155+110113+125100+COVENTRY NAT HU+SENDERS REF+1 ITEMS+++\r\n
			+1+WIRE+CONTRACT+AB1234567+ISCN+110113+125100+MK7 8LE+SENDERS REF+1 ITEMS+++\r\n
			+1+WIRE+CONTRACT+AB1234567+I101+110114+034000+MILTON KEYNES+SENDERS REF+1 ITEMS+++\r\n
			+1+WIRE+CONTRACT+AB1234567+I156+110113+034500+MILTON KEYNES+SENDERS REF+1 ITEMS+++\r\n
			+1+WIRE+CONTRACT+AB1234567+IPDF+110113+094500+MILTON KEYNES+SENDERS REF+1 ITEMS+++\r\n
			";

			$tmp = tmpfile();
			fwrite($tmp,$cnts);
			$lfiles[] = $tmp;


			
			$parcelforce_decode = "/\+(?<recordTypeIndicator>.*)\+(?<wireNumber>.*)\+(?<contractNumber>.*)\+(?<consignmentNumber>.*)\+(?<incidentTypeCode>.*)\+(?<eventDate>.*)\+(?<eventTime>.*)\+(?<eventLocationSignatory>.*)\+(?<sendersReference>.*)\+(?<additionalText1>.*)\+(?<additionalText2>.*)\+(?<filler>.*)\+/";
			foreach($lfiles as $lfile){
				fseek($lfile,0);
				while (($line = fgets($lfile)) !== false) {
					$line = preg_replace( "/\r|\n/", "", $line );
					if(strlen($line)){
						echo "---------------------------------------------<br>";
						echo "|".json_encode($line)."|";
						preg_match($parcelforce_decode,$line,$matches);
						echo("<pre>".var_export($matches,true)."</pre>");
					}
				}
				fclose($lfile);
			}