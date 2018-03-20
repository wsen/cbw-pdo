CREATE TABLE filme (id INTEGER PRIMARY KEY AUTO_INCREMENT, titel VARCHAR(150), spieldauer INTEGER, erscheinungsjahr YEAR, kurzbeschreibung TEXT, genre VARCHAR(20), UNIQUE KEY(titel, erscheinungsjahr));
CREATE TABLE regisseure (id INTEGER PRIMARY KEY AUTO_INCREMENT, name VARCHAR(40) UNIQUE KEY, vorname VARCHAR(40), geburtsdatum DATE);
ALTER TABLE filme CHANGE erscheinungsjahr erscheinungsjahr YEAR NOT NULL;
ALTER TABLE regisseure CHANGE vorname vorname VARCHAR(40) NOT NULL;
ALTER TABLE regisseure CHANGE name name VARCHAR(40) NOT NULL;
ALTER TABLE filme ADD COLUMN regisseur_id INTEGER;
ALTER TABLE filme ADD COLUMN preiskategorie_id INTEGER;
CREATE TABLE preiskategorien (name VARCHAR(15), preis DECIMAL(2, 2));
CREATE TABLE spielt (film_id INTEGER, schauspieler_id INTEGER, PRIMARY KEY(film_id, schauspieler_id));
ALTER TABLE regisseure RENAME TO personen;

INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (1, 'Cube', 1997, 90, '7 völlig Fremde mit sehr unterschiedlichen Charakterzügen werden unfreiwillig in ein endloses kafkaartiges Labyrinth voller Fallen gesteckt.', 'scifi', 1);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (2, 'Herr der Ringe - Die Gefährten', 2001, 178, 'In einem kleinen Dorf wird einem junger Hobbit namens Frodo mit ein uralter, magischer Ring anvertraut. Er muss sich auf eine epische Reise zum Schicksaalsberg begeben um ihn zu zerstören.', 'fantasy', 2);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (3, 'Mononoke-hime', 1997, 134, 'Das Schicksaal der Welt liegt in den Händen eines einzigen Kriegers.', 'anime', 3);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (4, 'Donnie Darko', 2001, 113, 'Das Leben ist eine lange verrückte Reise. Einige Leute haben einfach einen besseren Orientierungssinn', 'fantasy', 4);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (5, 'The Dark Knight', 2008, 180, 'Batman, Gordon und Harvey Dent müssen den Joker stoppen, ein Anarchistengenie, der einen Ring der Gewalt über die Stadt legt.', 'action', 5);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (6, 'The Prestige', 2006, 130, 'Robert und Alfred sind Magierrivalen. Als Alfred den ultimativen Trick zeigt, versucht Robert verzweifelt das Geheimnis herauszufinden.', 'fantasy', 5);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (7, 'The Ring', 2002, 115, 'Bevor Du stirbst siehst Du den Ring.', 'horror', 6);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (8, 'The Ring 2', 2005, 110, 'Fear comes full circle.', 'horror', 8);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (9, 'Inglourious Basterds', 2009, 153, 'Es war einmal in einem von Nazis besetzen Frankreich...', 'drama', 7);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (10, 'Star Trek', 2009, 127, 'Die Zukunft beginnt', 'scifi', 9);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (11, 'District 9', 2009, 153, 'Eine auserirdische Rasse ist gezwungen auf der Erde in Slums zu leben...', 'scifi', 10);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (12, 'Fluch der Karibik', 2003, 143, 'Der Schied "Will Turner" verbündet sich mit dem Piraten "Captain" Jack Sparrow" um seine Geliebte zu retten', 'abenteuer', 6);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (13, 'Herr der Ringe - Die Zwei Türme', 2002, 179, 'Frodo & Sam begeben sich nach Mordor um den Ring zu zerstören.', 'fantasy', 2);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (14, 'Braindead', 1992, 104, 'Die Mutter eines Jungen Mannes wird im Zoo gebissen...', 'horror', 2);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (15, 'Pulp Fiction', 1994, 154, 'Die Leben von 2 Auftragsmördern, Einem Boxer und der Frau eines Gangsters vermischen sich..', 'drama', 7);
INSERT INTO filme (id, titel, erscheinungsjahr, spieldauer, kurzbeschreibung, genre, regisseur_id) VALUES (16, 'Public Enemies', 2009, 140, 'Americas Meistgesuchter..', 'drama', 14);


INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (1,  'Vincent',     'Natali',    '1969-01-06');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (2,  'Peter',       'Jackson',   '1961-10-31');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (3,  'Miyazaki',    'Hayao',     '1951-01-05');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (4,  'Kelly',       'Richard',   '1975-03-28');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (5,  'Christopher', 'Nolan',     '1970-07-30');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (6,  'Gore',        'Verbinski', '1964-03-16');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (7,  'Quentin',     'Tarantino', '1963-03-27');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (8,  'Hideo',       'Nakata',    '1963-03-27');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (9,  'Jeffrey',     'Abrams',    '1966-06-27');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (10, 'Neill',       'Blomkamp',  '1979-09-17');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (11, 'Christian',   'Bale',      '1974-01-30');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (12, 'Johnny',      'Depp',      '1963-06-09');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (13, 'Brad',        'Pit',       '1963-12-18');
INSERT INTO personen (id, vorname, name, geburtsdatum) VALUES (14, 'Michael',     'Mann',      '1963-12-18');


INSERT INTO spielt (film_id, schauspieler_id) VALUES (5,  11);
INSERT INTO spielt (film_id, schauspieler_id) VALUES (6,  11);
INSERT INTO spielt (film_id, schauspieler_id) VALUES (9,  13);
INSERT INTO spielt (film_id, schauspieler_id) VALUES (12, 12);
INSERT INTO spielt (film_id, schauspieler_id) VALUES (14,  2);
INSERT INTO spielt (film_id, schauspieler_id) VALUES (16, 11);
INSERT INTO spielt (film_id, schauspieler_id) VALUES (16, 12);

