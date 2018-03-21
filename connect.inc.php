<?php
//$optionen = "";
if(!empty($db_name)){
    //$optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
    $db = new PDO("mysql:dbname=".$db_name.";host=localhost","root","");
    $db->query('SET NAMES utf8'); 
} else {
    die('Dabenbandverbindung geht net!');
}
?>