<?php
	$db_name = 'seminarverwaltung';
	$optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	
	require 'connect.inc.php';
	$statement = $db->query('SELECT titel, preis FROM seminare');

?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

<title>Seminare</title>
<style>
	table { border-collapse: collapse; }
	th, td { border: 1px solid gray; padding: 3px 5px; }
</style>
</head>
<body>
<h1>Seminare</h1>
<table>
<tr>
<th>Titel</th>
<th>Preis</th>
</tr>
<?php 
$daten = $statement->fetchAll();
foreach ($daten as $seminar):
?>
<tr>
<td><?php echo $seminar['titel'] ?></td>
<td><?php echo $seminar['preis'] ?> €</td>
</tr>
<?php endforeach; ?>
</table>
<br />
<table>
<?php
$statement2 = $db->query('SELECT titel, preis FROM seminare');
// echo '<pre>';
// var_dump($statement2->fetch());
// var_dump($statement2->fetch()); 
// var_dump($statement2->fetch()); 
// echo '</pre>';
while($daten2 = $statement2->fetch(PDO::FETCH_NUM)):
	?>
		<tr><td><?php echo $daten2[0] ?></td>
		<td><?php echo $daten2[1] ?> €</td></tr>
	<?php endwhile;?>
</table>


</body>
</html>