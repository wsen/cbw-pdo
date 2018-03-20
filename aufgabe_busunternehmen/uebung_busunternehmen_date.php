<?php
    $db_name = 'busunternehmen';
    $optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require '../connect.inc.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Übung Busunternehmen</title>
		<meta charset="utf-8" />
		<!-- <link href="./styles/global_php_style.css" type="text/css" rel="stylesheet" media="screen" /> -->
        <script src="../../script/jquery-3.3.1.min.js"></script>
		<!-- <script src="http://10.10.56.134/script/jquery-3.3.1.min.js"></script> -->
		<style>
            table { border-collapse: collapse;}
			th, td { border: 1px solid gray; 
                    padding: 5px 10px;		
					}
		</style>

	</head>
	
	<body>
	    <h2>Übung mit DB: Busunternehmen</h2>
	    <h2>Übung 2</h3>
        <table cellpadding="10">
        <thead><th>fahrtNr</th><th>busNr</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th><th>fahrtdatum</th></thead>
        <tbody>
        <?php
            $stm = $db->query("SELECT 
            fahrtNr,
            busNr,
            CONCAT(fahrer.name,' ',fahrer.vorname),
            abfahrtzeit,
            fahrtziele.fahrtziel,
            fahrtdatum 
            FROM fahrt INNER JOIN fahrer ON (fahrt.fahrerNr=fahrer.fahrerNr)
            JOIN fahrtziele ON (fahrt.fahrtzielNr=fahrtziele.fahrtzielNr)"
            );

            $erg = $stm->fetchAll();
            
            foreach($erg as $data) {
                echo '<tr><td>'
                .$data[0].'</td><td>'
                .$data[1].'</td><td><b>'
                .$data[2].'</b></td><td>'
                .$data[3].'</td><td>'
                .$data[4].'</td><td>'
                .$data[5].'</td></tr>';
            }
        ?>
        </tbody>
        </table>

    <h2>Übung 2b</h3>
        Annahme: Nicht existente Fahrer ID auf ID 4 geändert.<br />
        bei LEFT JOIN Anneige mit leeren Fahrerfeld bei anderen JOINs fallen die Felder (rows) komplett weg
        <table>
        <thead><th>fahrtNr</th><th>busNr</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th><th>fahrtdatum</th></thead>
        <tbody>
        <?php
            $stm = $db->query("SELECT 
            fahrtNr,
            busNr,
            CONCAT(fahrer.name,' ',fahrer.vorname),
            abfahrtzeit,
            fahrtziele.fahrtziel,
            fahrtdatum 
            FROM fahrt LEFT JOIN fahrer ON (fahrt.fahrerNr=fahrer.fahrerNr)
            INNER JOIN fahrtziele ON (fahrt.fahrtzielNr=fahrtziele.fahrtzielNr)"
            );
            //Nur zum Testen ob DB reagiert
            //$stm = $db->query("SELECT * FROM fahrt");
            //$data = $stm->fetchAll();
            //var_dump($data);
            $erg = $stm->fetchAll();
            
            foreach($erg as $data) {
                echo '<tr><td>'
                .$data[0].'</td><td>'
                .$data[1].'</td><td><b>'
                .$data[2].'</b></td><td>'
                .$data[3].'</td><td>'
                .$data[4].'</td><td>'
                .$data[5].'</td></tr>';
            }
        ?>
        </tbody>
        </table>

        <h2>Übung 3</h3>
        <table>
        <thead><th>fahrtNr</th><th>bus</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th>
        <th>fahrtdatum</th><th>fahrtzeit</th><th>php ankunftzeit</th></thead>
        <tbody>
        <?php
            $stm3 = $db->query("SELECT
            fahrtNr,
            CONCAT(bus.polKz,' (',bus.hersteller,')'),
            fahrer.name,
            abfahrtzeit,
            fahrtziele.fahrtziel,
            fahrtdatum,
            fahrtziele.fahrtzeit,
            CONCAT(fahrt.fahrtdatum,' ',fahrt.abfahrtzeit),
            fahrtziele.fahrtzeit
            FROM fahrt JOIN fahrer ON (fahrt.fahrerNr=fahrer.fahrerNr)
            JOIN fahrtziele ON (fahrt.fahrtzielNr=fahrtziele.fahrtzielNr)
            JOIN bus ON (fahrt.busNr=bus.busNr)
            ");
            //fahrtziele.fahrtzeit 
            //'ADDTIME('fahrtdatum abfahrtzeit', 'ankunftzeit')
            //DATE_ADD('2017-03-15 07:00:00', INTERVAL '14:51:00' HOUR)
            //https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html#function_date-add
            /*
            ADDTIME(
                CONCAT(fahrt.fahrtdatum,' ',fahrt.abfahrzeit),
                CONCAT(fahrtziele.fahrtzeit,':00')
            )

            DATE_ADD(CONCAT(fahrtdatum,' ',abfahrtzeit), INTERVAL fahrtziele.fahrtzeit HOUR_MINUTE)
            */

            function nicetime($date,$timeroom)
            {
                if(empty($date)) {
                    return "No date provided";
                }
                
                $unix_date         = strtotime($date);
                $timeroom_arr  = explode(':',$timeroom);
                $timeroom_h = $timeroom_arr[0] * 3600;
                $timeroom_m = $timeroom_arr[1] * 60;
                
                $unix_date_final = $unix_date + $timeroom_h + $timeroom_m; 

                return date("d.m H:i",$unix_date_final);
            }


            $erg3 = $stm3->fetchAll();
            
            foreach($erg3 as $data) {
                echo '<tr><td>'
                .$data[0].'</td><td>'
                .$data[1].'</td><td>'
                .$data[2].'</td><td>'
                .$data[3].'</td><td>'
                .$data[4].'</td><td>'
                .$data[5].'</td><td>'
                .$data[6].'</td><td>'
                .nicetime($data[7],$data[8]).'</td><tr>';
                
                //.(date('H',$data[8])+date('i',$data[8])).'</td></tr>';
                //.date('Y.m.d',strtotime($data[7])).' <b>'.date('h:m',strtotime($data[7])).'</b></td></tr>';
            } //$ankunftzeit->format('h:m')
        ?>
        </tbody>
        </table>		
		
        <h2>Übung 4</h3>
        <table>
        <thead><th>fahrtNr</th><th>bus</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th>
        <th>fahrtdatum</th><th>ankunftzeit</th><th>umsatz</th></thead>
        <tbody>
        <?php
            $stm4 = $db->query("SELECT
            fahrtNr,
            CONCAT(bus.polKz,' (',bus.hersteller,')'),
            fahrer.name,
            abfahrtzeit,
            fahrtziele.fahrtziel,
            fahrtdatum,
            ADDTIME(
                CONCAT(fahrt.fahrtdatum,' ',fahrt.abfahrtzeit),
                CONCAT(fahrtziele.fahrtzeit,':00')
            ),
            (gebuchtePlaetze * fahrtziele.fahrpreis)
            FROM fahrt 
            JOIN fahrer ON (fahrt.fahrerNr=fahrer.fahrerNr)
            JOIN fahrtziele ON (fahrt.fahrtzielNr=fahrtziele.fahrtzielNr)
            JOIN bus ON (fahrt.busNr=bus.busNr)
            ");
            //fahrtziele.fahrtzeit 
            //'ADDTIME('fahrtdatum abfahrtzeit', 'ankunftzeit')
            //DATE_ADD('2017-03-15 07:00:00', INTERVAL '14:51:00' HOUR)
            //DATE_ADD(CONCAT(fahrtdatum,' ',abfahrtzeit), INTERVAL fahrtziele.fahrtzeit HOUR_MINUTE),
            //https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html#function_date-add


            $erg4 = $stm4->fetchAll();
            
            foreach($erg4 as $data) {
                echo '<tr><td>'
                .$data[0].'</td><td>'
                .$data[1].'</td><td>'
                .$data[2].'</td><td>'
                .$data[3].'</td><td>'
                .$data[4].'</td><td>'
                .$data[5].'</td><td>'
                .date('Y.m.d',strtotime($data[6])).' <b>'.date('h:m',strtotime($data[6])).'</b></td><td>'
                .$data[7].' €</td></tr>';
            } //$ankunftzeit->format('h:m')
        ?>
        </tbody>
        </table>	
	</body>
</html>
