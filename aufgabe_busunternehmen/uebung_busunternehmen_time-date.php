<?php
    $db_name = 'busunternehmen';
    $optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require '../connect.inc.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Übung busunternehmen</title>
		<meta charset="utf-8" />
		<link href="../styles/global_style.css" type="text/css" rel="stylesheet" media="screen" />
		
		<style>
            table {border-collapse: collapse;}
            th, td {border: 1px solid gray; padding: 3px 5px;}
		</style>
		
	</head>
	
	<body>
        <h2>Übungen mit DB : busunternehmen</h2>
        
        <h3>Übung 1</h3>
        <table>
            <thead>
               <tr><th>fartNr</th><th>busNr</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th><th>fahrtdatum</th><th>geb. Plätze</th></tr> 
            </thead>
        <?php
            $stm = $db->query("SELECT * FROM fahrt" );
            $daten = $stm->fetchAll();
            //var_damp($daten);
        foreach($daten as $drive){
            //echo $person['nachname'].' - ';
            echo '<tr><td>'.$drive[0].'</td>';
            echo '<td>'.$drive[1].'</td>';
            echo '<td>'.$drive[2].'</td>';
            echo '<td>'.$drive[3].'</td>';
            echo '<td>'.$drive[4].'</td>';
            echo '<td>'.$drive[5].'</td>';
            echo '<td>'.$drive[6].'</td></tr>';
            }
        ?>
	   </table>
        
       <h3>Übung 2</h3>
        <table>
            <thead>
               <tr><th>fartNr</th><th>busNr</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th><th>fahrtdatum</th></tr> 
            </thead>
        <?php
            //$stm1 = $db->query("SELECT fahrt.fahrtNr, fahrt.busNr,CONCAT(fahrer.vorname, ' ',fahrer.name), fahrt.abfahrtzeit, fahrt.fahrtzielNr, fahrt.fahrtdatum FROM fahrt JOIN fahrer ON fahrt.fahrerNr = fahrer.fahrerNr" );
            $stm1 = $db->query("SELECT fahrt.fahrtNr, fahrt.busNr,CONCAT(fahrer.vorname, ' ',fahrer.name), fahrt.abfahrtzeit, fahrtziele.fahrtziel, fahrt.fahrtdatum FROM fahrt , fahrer, fahrtziele WHERE fahrt.fahrerNr = fahrer.fahrerNr && fahrt.fahrtzielNr = fahrtziele.fahrtzielNr" );
            $daten1 = $stm1->fetchAll();
            foreach($daten1 as $drive1){
            echo '<tr><td>'.$drive[0].'</td>';
            echo '<td>'.$drive1[1].'</td>';
            echo '<td>'.$drive1[2].'</td>';
            echo '<td>'.$drive1[3].'</td>';
            echo '<td>'.$drive1[4].'</td>';
            echo '<td>'.$drive1[5].'</td></tr>';
            }
        ?>
	   </table>
        
        <h3>Übung 3</h3>
        <table>
            <thead>
               <tr><th>fartNr</th><th>bus</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th><th>fahrtdatum</th><th>ankunftzeit</th></tr> 
            </thead>
        <?php
            $stm2 = $db->query("SELECT fahrt.fahrtNr, CONCAT(bus.polKz, ' (',bus.hersteller,')'),fahrer.name, fahrt.abfahrtzeit, fahrtziele.fahrtziel, fahrt.fahrtdatum, fahrtziele.fahrtzeit FROM fahrt , fahrer, fahrtziele, bus WHERE fahrt.fahrerNr = fahrer.fahrerNr && fahrt.fahrtzielNr = fahrtziele.fahrtzielNr && fahrt.busNr = bus.busNr" );
            $daten2 = $stm2->fetchAll();
            
            foreach($daten2 as $drive2){
                $ankunftzeit = new DateTime($drive2[5].' '.$drive2[3]);
                $zeit_dauert = explode(':',$drive2[6]);
                    $stunde = $zeit_dauert[0];
                    $minuten = $zeit_dauert[1];
                $ankunftzeit->add(new DateInterval('PT'.$stunde.'H'));
                $ankunftzeit->add(new DateInterval('PT'.$minuten.'M'));
                echo '<tr><td>'.$drive2[0].'</td>';
                echo '<td>'.$drive2[1].'</td>';
                echo '<td>'.$drive2[2].'</td>';
                echo '<td>'.$drive2[3].'</td>';
                echo '<td>'.$drive2[4].'</td>';
                echo '<td>'.$drive2[5].'</td>';
                echo '<td>'.$ankunftzeit->format('Y-m-d H:i:s').'</td></tr>';
            }
        ?>
	   </table>
        
        <h3>Übung 4</h3>
        <table>
            <thead>
               <tr><th>fartNr</th><th>bus</th><th>fahrerName</th><th>abfahrtzeit</th><th>fahrtziel</th><th>fahrtdatum</th><th>ankunftzeit</th><th>unsatz</th></tr> 
            </thead>
        <?php
            $stm3 = $db->query("SELECT fahrt.fahrtNr, CONCAT(bus.polKz, ' (',bus.hersteller,')'),fahrer.name, fahrt.abfahrtzeit, fahrtziele.fahrtziel, fahrt.fahrtdatum, fahrtziele.fahrtzeit, fahrtziele.fahrpreis, fahrt.gebuchtePlaetze FROM fahrt , fahrer, fahrtziele, bus WHERE fahrt.fahrerNr = fahrer.fahrerNr && fahrt.fahrtzielNr = fahrtziele.fahrtzielNr && fahrt.busNr = bus.busNr" );
            $daten3 = $stm3->fetchAll();
            
            foreach($daten3 as $drive3){
                $umsatz = ((float)$drive3[7]) * ((float)$drive3[8]) ;
                
                $ankunftzeit = new DateTime($drive3[5].' '.$drive3[3]);
                $zeit_dauert = explode(':',$drive3[6]);
                    $stunde = $zeit_dauert[0];
                    $minuten = $zeit_dauert[1];
                $ankunftzeit->add(new DateInterval('PT'.$stunde.'H'));
                $ankunftzeit->add(new DateInterval('PT'.$minuten.'M'));
                echo '<tr><td>'.$drive3[0].'</td>';
                echo '<td>'.$drive3[1].'</td>';
                echo '<td>'.$drive3[2].'</td>';
                echo '<td>'.$drive3[3].'</td>';
                echo '<td>'.$drive3[4].'</td>';
                echo '<td>'.$drive3[5].'</td>';
                echo '<td>'.$ankunftzeit->format('Y-m-d H:i:s').'</td>';
                echo '<td>'.number_format($umsatz, 2, '.', '').'</td></tr>';
            }
        ?>
	   </table>
        
        
        
        
        
		<script src="../script/jquery-3.3.1.min.js"></script>
		<script src="../script/js_functions.js"></script>
		<script>
			
		</script>
	</body>
</html>