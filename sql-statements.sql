INSERT INTO `personen_1` 
(`nachname`, `vorname`, `email`) 
VALUES ('Lottermann', 'Erwin', 'lotti@gmx.de');

ALTER TABLE `test`.`personen_1` ADD UNIQUE (`nachname`, `vorname`);


UPDATE personen_1 SET email = '';

SUBSTR(vorname,0,1),'.',nachname,'@',SUBSTR(vorname,0,1),SUBSTR(nachname,0,2), '.de'
FORM personen_1;

SELECT CONCAT (SUBSTR(vorname,0,1),'.',nachname,'@',SUBSTR(vorname,0,1),SUBSTR(nachname,0,2),'.de')
FROM personen_1;

UPDATE personen_1 SET email = CONCAT(SUBSTR(vorname,1,1),'.',nachname, '@', lower(SUBSTR(vorname,1,2)),lower(SUBSTR(nachname,1,2)),'.de');