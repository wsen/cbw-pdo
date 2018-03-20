<?php
//$optionen = "";
if(!empty($db_name)){
    $db = new PDO("mysql:dbname=".$db_name.";host=localhost","root","",$optionen);
    $db->query('SET NAMES utf8'); 
} else {
    die('Dabenbandverbindung geht net!');
}
?>