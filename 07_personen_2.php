<?php
    $db_name = 'test';
    //$optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require './connect.inc.php';


?>

<!DOCTYPE html>
<html>
	<head>
		<title>07 personen_2</title>
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
	    <h3>Übung 2</h3>
        <table>
            <tr>
                <th>Abteilung</th><th>Vorgesetzter</th><th>Anzahl</th><th>Mitarbeiter</th>
            </tr>
        <?php
            // $stm = $db->query("SELECT p1.abtlg, 
            // CONCAT(p2.nachname,', ',p2.vorname) AS name,
            // COUNT(p1.uid) AS anzahl 
            // FROM personen_2 AS p1
            // LEFT JOIN personen_2 AS p2 ON p1.uid=p2.chef
            // WHERE p1.uid=p2.chef
            // GROUP BY p1.abtlg");

            $stm = $db->query("SELECT p1.abtlg, 
            CONCAT(p2.nachname,', ',p2.vorname) AS name,
            COUNT(p1.abtlg) AS anzahl,
            p2.uid AS pers_nr
            FROM 
            personen_2 AS p1,
            personen_2 AS p2
            -- LEFT JOIN personen_2 AS p2 ON p1.uid=p2.chef
            WHERE p2.uid = p1.chef
            GROUP BY p1.abtlg");
            //$daten = $stm->fetch();

            while($erg = $stm->fetch(PDO::FETCH_ASSOC)):
        ?>
            <tr>
                <td><?php echo $erg['abtlg']; ?></td>
                <td><?php echo $erg['name']; ?></td>
                <td><?php echo $erg['anzahl']; ?></td>
            </tr>
        <?php
            endwhile;
        ?>
        </table>

        	    <h3>Übung 2b ohne join</h3>
        <table>
            <tr>
                <th>Abteilung</th><th>Vorgesetzter</th><th>Anzahl</th><th>Mitarbeiter</th>
            </tr>
        <?php
            $stm = $db->query("SELECT abtlg, 
            CONCAT(nachname,', ',vorname) AS name,
            COUNT(uid) AS anzahl 
            FROM personen_2
            GROUP BY abtlg  ORDER BY anzahl DESC");
            //$daten = $stm->fetch();

            while($erg = $stm->fetch(PDO::FETCH_ASSOC)):
        ?>
            <tr>
                <td><?php echo $erg['abtlg']; ?></td>
                <td><?php echo $erg['name']; ?></td>
                <td><?php echo $erg['anzahl']; ?></td>
            </tr>
        <?php
            endwhile;
        ?>
        </table>
		
	</body>
</html>
