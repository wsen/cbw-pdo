<?php
SELECT DISTINCT abtlg FROM personen_2 

loop() {
    --erg_abtlg

    SELECT uid FROM personen_2 GROUP BY abtlg='erg_abtlg' ORDER BY RAND() LIMIT 1
     --erg_chef

    UPDATE personen_2 SET chef='erg_chef' WHERE abtlg='erg_abtlg'
}
?>
