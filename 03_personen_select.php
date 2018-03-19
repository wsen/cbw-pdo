<?php
    $db_name = 'test';
    require 'connect.inc.php';
    $stm = $db->query("SELECT * FROM personen_1 WHERE nachname LIKE 'k%' LIMIT 30");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>03_personen_select</title>
		<meta charset="utf-8" />
		<!-- <link href="./styles/global_php_style.css" type="text/css" rel="stylesheet" media="screen" /> -->
        <script src="../../script/jquery-3.3.1.min.js"></script>
		<!-- <script src="http://10.10.56.134/script/jquery-3.3.1.min.js"></script> -->
		<style>
			table { border-collapse: collapse; }
			th, td { border: 1px solid gray; 
					padding 3px 5px; 
					
					}
		
		</style>

		<script>
		
		</script>
	</head>
	
	<body>
	<table>
	<thead><th>UID</th><th>Nachname</th><th>Vorname</th><th>Email</th></thead>
	<tbody>
    <?php
		$daten = $stm->fetchAll();
		//var_dump($daten);
		foreach($daten as $person) {
			//echo $person['nachname'].' - '.$person['vorname'].'<br />';
			echo '<tr><td>'.$person[0].'</td><td>'.$person[1].'</td><td>'.$person['vorname'].'</td><td>'.$person[3].'</td></tr>';
		}
     ?>
	 </tbody>
	</table>	
	</body>
</html>
