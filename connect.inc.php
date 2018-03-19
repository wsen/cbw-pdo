<?php
if(!empty($db_name)){
    $db = new PDO("mysql:dbname=".$db_name.";host=localhost","root","");
    $db->query('SET NAMES utf8'); 
} else {
    die('Dabenbandverbindung geht net!');
}
?>