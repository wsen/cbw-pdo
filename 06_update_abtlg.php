<?php
	$db_name = 'test';
	require 'connect.inc.php';
	
	$stm1 = $db->query("SELECT DISTINCT abtlg FROM personen_2");
	$erg1 = $stm1->fetchAll();
	
	 foreach($erg1 as $erg_abtlg) {
		$stm = $db->query("SELECT uid FROM personen_2 WHERE abtlg='".$erg_abtlg['abtlg']."' ORDER BY RAND() LIMIT 1");
		$erg = $stm->fetch(PDO::FETCH_ASSOC);
		 
		$stm2 = $db->query("UPDATE personen_2 SET chef='".$erg['uid']."' WHERE abtlg='".$erg_abtlg['abtlg']."'");
		}
?>