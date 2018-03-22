<?php
$db_name ='seminarverwaltung';
require_once 'connect.inc.php';
// require 'inc.connect.php'; // schlechter -> Security
$input = '';

if ($_POST) {
    $input = addslashes($_POST['suche']);

    $sql = 'SELECT * FROM seminare WHERE titel LIKE "%' . $input . '%"';
    $statement = $db->query($sql);
    $daten = $statement->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>010 sql injection</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Suche: <input type="text" name="suche" />
        <input type="submit" value="suchen" />
    </form>
    <?php if (isset($daten)): ?>
    <p>Suchergebnis: </p>
    <ul>
    <?php foreach($daten as $seminar): ?>
        <li>
            <?php echo $seminar['titel'] ?> :
            <?php echo $seminar['preis'] ?> €
        </li>
    <?php endforeach; ?>
        </ul>
    <?php endif; 
    echo $input;
    ?>
    
</body>
</html>