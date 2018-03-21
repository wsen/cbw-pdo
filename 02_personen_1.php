<?php
    $db_name = 'test';
    require 'connect.inc.php';

    $vnamen = file('../data/vornamen.csv');
    $vornamen = array_slice($vnamen, 0, 100);
    $vornamen = array_unique($vornamen);   
    $vornamen = array_values($vornamen); //array neue indiziert
    $vornamen = array_map('trim', $vornamen);
    

    $nnamen = file('../data/nachnamen.csv');
    $nachnamen = array_slice($nnamen, 0, 100);
    $nachnamen = array_unique($nachnamen);    
    $nachnamen = array_values($nachnamen); //array neue indiziert
    $nachnamen = array_map('trim', $nachnamen);
    shuffle($nachnamen);

    foreach($nachnamen as $name) {
        foreach($vornamen as $vorname) {
            $stm = $db->query("INSERT IGNORE INTO personen_1 (nachname, vorname) VALUES ('".$name."', '".$vorname."')");
            echo $name.' - '.$vorname.'<br />';

        }
    }

    //UPDATE personen_1 SET email = CONCAT(SUBSTR(vorname,1,1),'.',nachname, '@', lower(SUBSTR(vorname,1,2)),lower(SUBSTR(nachname,1,2)),'.de');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>02 personen_1</title>
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
		
	</body>
</html>
