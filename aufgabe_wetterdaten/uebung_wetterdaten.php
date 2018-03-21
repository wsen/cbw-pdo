<?php
    $db_name = 'uebung_wetterdaten';
    $optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require '../connect.inc.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Übung2 Wetterdaten</title>
		<meta charset="utf-8" />
		<link href="./styles/global_php_style.css" type="text/css" rel="stylesheet" media="screen" />
        <script src="../../script/jquery-3.3.1.min.js"></script>
		<!-- <script src="http://10.10.56.134/script/jquery-3.3.1.min.js"></script> -->
		<style>
            table { border-collapse: collapse; }
			th, td { border: 1px solid gray; 
                    padding: 5px 10px;
                    }        
		</style>

		<script>
		
		</script>
	</head>
	
	<body>
	    <h2>Übersicht über Wetterstationen</h2>
    <table>
	<?php
        $stm1 = $db->query("SELECT * FROM wetterstation WHERE Hoehe >= 100");
        $gefunden = $stm1->rowCount();
    ?>
            <tr><td colspan="6">Anzahl der Datensätze: <?php echo $gefunden; ?></td></tr>
    <?php
        while($erg = $stm1->fetch(PDO::FETCH_OBJ)): 
    ?>
            <tr>
                <td><?php echo $erg->S_ID; ?></td>
                <td><?php echo $erg->Standort; ?></td>
                <td><?php echo $erg->Geo_Breite; ?></td>
                <td><?php echo $erg->Geo_Laenge; ?></td>
                <td><?php echo $erg->Hoehe; ?></td>
                <td><?php echo $erg->Betreiber; ?></td>
            </tr>
        <?php endwhile; 
            unset($stm1);
        ?>        
    </table>           
    </table>

    	    <h2>Maximale Windgeschwindigkeiten und Dichte der Wolkendecke bei allen Stationen am 1.1.2015</h2>
    <table>
	<?php
        $stm2 = $db->query("SELECT 
                ws.Standort, 
                wm.Max_Windgeschwindigkeit, 
                wm.Mittel_Bedeckungsgrad, 
                wm.Datum 
            FROM wettermessung AS wm
            JOIN wetterstation AS ws 
            ON ws.S_ID=wm.Stations_ID 
            WHERE wm.Datum = '2015-01-01'
            ");
        $gefunden = $stm2->rowCount();
    ?>
            <tr><th>Station</th><th>Wind</th><th>Wolken</th><th>Datum</th></tr>
            <tr><td colspan="6">Anzahl der Datensätze: <?php echo $gefunden; ?></td></tr>
    <?php
        while($erg = $stm2->fetch(PDO::FETCH_ASSOC)): 
    ?>
            <tr>
                <td><?php echo $erg['Standort']; ?></td>
                <td><?php echo $erg['Max_Windgeschwindigkeit']; ?></td>
                <td><?php echo $erg['Mittel_Bedeckungsgrad']; ?></td>
                <td><?php echo $erg['Datum']; ?></td>
            </tr>
        <?php endwhile;  
            unset($stm2);
        ?>        
    </table>        
    </table>

    <h2>Wetterstationen Betreiber (A5)</h2>
    <table>
	<?php
        $stm3 = $db->query("SELECT DISTINCT
                Standort, 
                Betreiber
            FROM wetterstation
            ");
        $gefunden = $stm3->rowCount();
    ?>
            <tr><th>Station</th><th>Betreiber</th></tr>
            <tr><td colspan="6">Anzahl der Datensätze: <?php echo $gefunden; ?></td></tr>
    <?php
        while($erg = $stm3->fetch(PDO::FETCH_NUM)): 
    ?>
            <tr>
                <td><?php echo $erg[0]; ?></td>
                <td><?php echo $erg[1]; ?></td>
            </tr>
        <?php endwhile; 
            unset($stm3);
        ?>              
    </table>

     <h2>Wieviel Wetterstationen pro Betreiber (A5b)</h2>
    <table>
	<?php
        $stm3b = $db->query("SELECT DISTINCT Betreiber, 
            COUNT(S_ID)
            FROM wetterstation
            GROUP BY Betreiber;
            ");
        $gefunden = $stm3b->rowCount();
    ?>
            <tr><th>Betreiber</th><th>Stationen</th></tr>
            <tr><td colspan="6">Anzahl der Datensätze: <?php echo $gefunden; ?></td></tr>
    <?php
        while($erg = $stm3b->fetch(PDO::FETCH_NUM)): 
    ?>
            <tr>
                <td><?php echo $erg[0]; ?></td>
                <td><?php echo $erg[1]; ?></td>
            </tr>
        <?php endwhile; 
            unset($stm3stm3b);
        ?>        
    </table>

    <h2>Anzahl der Wettermessungen  (A6 modifiziert)</h2>
	<?php
        $stm6 = $db->query("SELECT DISTINCT Stations_ID FROM wettermessung");
        $erg1 = $stm6->fetchAll();

        $erg2 = $stm6->fetch();
        $anzahl = $stm6->rowCount();
    ?>
    <p>Es liegen fetchAll() Wettermessungen von: <?php echo count($erg1)." ($anzahl - avec seulement fetch())"; ?> vor</p>

	</body>
</html>
