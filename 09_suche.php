<?php
    $db_name = 'test';
    //$optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require './connect.inc.php';
    $input = trim($_POST['postStr']);
    $ausgabe = '';

    if(!empty($input)) {
        $stm = $db->query("SELECT Name,Capital,Domain,Currency,Phone FROM cr_country WHERE Name LIKE '".$input."%'");
        //while($erg = $stm->fetch(PDO::FETCH_ASSOC)):
        $erg = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach($erg as $data) {
            $ausgabe .= '<tr>';
            $ausgabe .= '<td>'.$data['Name'].'</td>';
            $ausgabe .= '<td>'.$data['Capital'].'</td>';
            $ausgabe .= '<td>'.$data['Domain'].'</td>';
            $ausgabe .= '<td>'.$data['Currency'].'</td>';
            $ausgabe .= '<td>'.$data['Phone'].'</td>';
            $ausgabe .= '<tr>';
        }

        if(count($erg)==0) {
            $ausgabe = '<tr><th colspan="5">Nix gefunden</th></tr>';
        }

    } else {
        $ausgabe = '<tr><th colspan="5">Keine Eingabe</th></tr>';
    }
    echo $ausgabe;
 ?>
        <!-- <tr>
            <td><?php //echo $erg['Continent']; ?></td>
            <td><?php //echo $erg['Name']; ?></td>
            <td><?php //echo $erg['IntName']; ?></td>
        </tr> -->
<?php
    // endwhile;
?>
