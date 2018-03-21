<?php
    $db_name = 'test';
    //$optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require './connect.inc.php';
    // tabelle: personen_2

    $abtlg = array('Einkauf','Verkauf','Versand','Personal','Kantine','Buchhaltung');

    $vnamen = file('../data/vornamen.csv');
    $vornamen = array_slice($vnamen, 0, 20);
    $vornamen = array_unique($vornamen);   
    $vornamen = array_values($vornamen); //array neue indiziert
    $vornamen = array_map('trim', $vornamen);
    

    $nnamen = file('../data/nachnamen.csv');
    $nachnamen = array_slice($nnamen, 0, 50);
    $nachnamen = array_unique($nachnamen);    
    $nachnamen = array_values($nachnamen); //array neue indiziert
    $nachnamen = array_map('trim', $nachnamen);

    //UPDATE personen_1 SET 
        // email = CONCAT(SUBSTR(vorname,1,1),'.',nachname, '@', 
        //     lower(SUBSTR(vorname,1,2)),
        //     lower(SUBSTR(nachname,1,2)),'.de');


    $stm = $db->prepare("INSERT IGNORE INTO personen_2 (nachname, vorname, email, abtlg)
     VALUES (?,?,?,?)");
    $exec_arr = array();

    // mt_rand()
    // array_rand(array,1) //Anzahl der zufälligen ausgwählten 

    $ins_nachname = $nachnamen[array_rand($nachnamen, 1)];
    $ins_vorname = $vornamen[array_rand($vornamen, 1)];
    $ins_abtlg = $abtlg[array_rand($abtlg, 1)];
    
    $email = strtolower(substr($ins_vorname,0,1).'.'.$ins_nachname. '@'. 
                (substr($ins_vorname,0,2)).
                (substr($ins_nachname,0,2)).'.de');

    $exec_arr = array($ins_nachname,$ins_vorname,$email,$ins_abtlg);            
    $stm->execute($exec_arr);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>05 prepared</title>
		<meta charset="utf-8" />
		<link href="./styles/global_php_style.css" type="text/css" rel="stylesheet" media="screen" />
        <script src="../../script/jquery-3.3.1.min.js"></script>
		<!-- <script src="http://10.10.56.134/script/jquery-3.3.1.min.js"></script> -->
		<style>
			
		
		</style>

		<script>
		
		</script>
	</head>
	
	<body>
	    <h2>zweite &Uuml;berschrift der Seite</h2>
		
	</body>
</html>
